<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use App\Models\WaterReading;
use App\Services\SensorApiClient;
use App\Services\SensorApiException;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserDashboardController extends Controller
{
    private const SENSOR_PARAMETERS = [
        'ph',
        'tds',
        'turbidity',
        'orp',
        'cod',
        'bod',
        'discharge_flow',
        'temperature',
    ];

    private const DEFAULT_THRESHOLDS = [
        'ph_min' => 6.5,
        'ph_max' => 8.5,
        'tds_max' => 500,
        'turbidity_max' => 10,
        'orp_min' => null,
        'orp_max' => null,
        'cod_max' => null,
        'bod_max' => null,
        'discharge_flow_max' => null,
    ];

    public function dashboard(Request $request): View
    {
        $user = $request->user();
        $hasWaterMonitoringAccess = $user->hasWaterMonitoringAccess();
        $reading = $hasWaterMonitoringAccess
            ? $user->waterReadings()->with('site')->latest('recorded_at')->first()
            : null;
        $thresholds = $this->thresholds($user->settings ?? []);
        $issues = $reading?->complianceIssues($thresholds) ?? [];

        return view('user.index', [
            'latestReading' => $reading,
            'hasWaterMonitoringAccess' => $hasWaterMonitoringAccess,
            'siteCount' => $user->sites()->count(),
            'readingCount' => $hasWaterMonitoringAccess ? $user->waterReadings()->count() : 0,
            'chemicalUsageCount' => $user->chemicalUsages()->whereBetween('usage_date', [now()->startOfMonth(), now()->endOfMonth()])->count(),
            'upcomingReminderCount' => $user->reminders()->where('status', 'scheduled')->where('due_at', '>=', now())->count(),
            'alertCount' => $user->dashboardNotifications()->where('type', 'alert')->whereNull('dismissed_at')->count(),
            'unreadCount' => $user->dashboardNotifications()->whereNull('read_at')->whereNull('dismissed_at')->count(),
            'complianceStatus' => $reading?->complianceStatus($thresholds) ?? 'No data',
            'complianceIssues' => $issues,
            'thresholds' => $thresholds,
            'recentReadings' => $hasWaterMonitoringAccess
                ? $user->waterReadings()->with('site')->latest('recorded_at')->limit(5)->get()
                : collect(),
            'upcomingReminders' => $user->reminders()->with('site')->where('status', 'scheduled')->orderBy('due_at')->limit(5)->get(),
        ]);
    }

    public function waterMonitoring(Request $request): View
    {
        $user = $request->user();
        $filters = $request->validate([
            'site_id' => ['nullable', 'integer'],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);
        $readings = $user->waterReadings()
            ->with('site')
            ->when(isset($filters['site_id']), fn (Builder $query) => $query->where('site_id', $filters['site_id']))
            ->when(isset($filters['from']), fn (Builder $query) => $query->whereDate('recorded_at', '>=', $filters['from']))
            ->when(isset($filters['to']), fn (Builder $query) => $query->whereDate('recorded_at', '<=', $filters['to']))
            ->latest('recorded_at')
            ->paginate(15)
            ->withQueryString();

        return view('user.water-monitoring.index', [
            'sites' => $user->sites()->orderBy('name')->get(),
            'apiConnections' => $user->sensorApiConnections()->with('site')->latest()->get(),
            'readings' => $readings,
            'latestReading' => $user->waterReadings()->with('site')->latest('recorded_at')->first(),
            'thresholds' => $this->thresholds($user->settings ?? []),
        ]);
    }

    public function createSensorApiConnection(Request $request): View
    {
        return view('user.water-monitoring.api-create', [
            'sites' => $request->user()->sites()->orderBy('name')->get(),
            'hasSites' => $request->user()->sites()->exists(),
        ]);
    }

    public function storeSensorApiConnection(Request $request): RedirectResponse
    {
        $validated = $this->validateSensorApiConfiguration($request, true);
        $site = $request->user()->sites()->findOrFail($validated['site_id']);

        $connection = $request->user()->sensorApiConnections()->create([
            'site_id' => $site->id,
            'endpoint_url' => $validated['endpoint_url'],
            'bearer_token' => filled($validated['bearer_token'] ?? null) ? trim($validated['bearer_token']) : null,
            'parameter_map' => $this->sensorParameterMap($validated),
            'timestamp_path' => $validated['timestamp_path'] ?? null,
        ]);

        return redirect()->route('user.water-monitoring')->with('status', 'Sensor API connected. Fetch the latest data to verify the mapping.');
    }

    public function editSensorApiConnection(Request $request, int $connection): View
    {
        $connection = $request->user()->sensorApiConnections()->with('site')->findOrFail($connection);

        return view('user.water-monitoring.api-edit', compact('connection'));
    }

    public function updateSensorApiConnection(Request $request, int $connection): RedirectResponse
    {
        $connection = $request->user()->sensorApiConnections()->findOrFail($connection);
        $validated = $this->validateSensorApiConfiguration($request, false);

        $attributes = [
            'endpoint_url' => $validated['endpoint_url'],
            'parameter_map' => $this->sensorParameterMap($validated),
            'timestamp_path' => $validated['timestamp_path'] ?? null,
            'last_sample_hash' => null,
            'last_sync_error' => null,
        ];

        if (filled($validated['bearer_token'] ?? null)) {
            $attributes['bearer_token'] = trim($validated['bearer_token']);
        } elseif (filter_var($validated['clear_bearer_token'] ?? false, FILTER_VALIDATE_BOOLEAN)) {
            $attributes['bearer_token'] = null;
        }

        $connection->update($attributes);

        return redirect()->route('user.water-monitoring')->with('status', 'Sensor API configuration updated.');
    }

    public function deleteSensorApiConnection(Request $request, int $connection): RedirectResponse
    {
        $request->user()->sensorApiConnections()->findOrFail($connection)->delete();

        return redirect()->route('user.water-monitoring')->with('status', 'Sensor API disconnected. Previously imported readings were kept.');
    }

    public function syncSensorApiConnection(Request $request, int $connection, SensorApiClient $client): RedirectResponse
    {
        $connection = $request->user()->sensorApiConnections()->findOrFail($connection);

        try {
            $sample = $client->fetch($connection);
        } catch (SensorApiException $exception) {
            $connection->update(['last_sync_error' => $exception->getMessage()]);

            return back()->withErrors(['sensor_api' => $exception->getMessage()]);
        }

        $sampleHash = hash('sha256', json_encode([
            $sample['recorded_at']->toIso8601String(),
            $sample['values'],
        ], JSON_THROW_ON_ERROR));

        $isDuplicate = DB::transaction(function () use ($connection, $sample, $sampleHash, $request): bool {
            $lockedConnection = $request->user()->sensorApiConnections()
                ->lockForUpdate()
                ->findOrFail($connection->id);
            $isDuplicate = $lockedConnection->last_sample_hash === $sampleHash;

            $lockedConnection->update([
                'last_sample_hash' => $sampleHash,
                'last_synced_at' => now(),
                'last_sync_error' => null,
            ]);

            if ($isDuplicate) {
                return true;
            }

            $reading = $request->user()->waterReadings()->create([
                ...$sample['values'],
                'site_id' => $lockedConnection->site_id,
                'sensor_api_connection_id' => $lockedConnection->id,
                'recorded_at' => $sample['recorded_at'],
            ]);

            $this->recordReadingAlert($request, $reading);

            return false;
        });

        return redirect()->route('user.water-monitoring')->with(
            'status',
            $isDuplicate ? 'The API returned the same reading; no duplicate was saved.' : 'Latest sensor reading imported.',
        );
    }

    public function viewWaterReading(Request $request, int $reading): View
    {
        $record = $request->user()->waterReadings()->with('site')->findOrFail($reading);

        return view('user.water-monitoring.view', [
            'reading' => $record,
            'thresholds' => $this->thresholds($request->user()->settings ?? []),
        ]);
    }

    public function deleteWaterReading(Request $request, int $reading): RedirectResponse
    {
        $request->user()->waterReadings()->findOrFail($reading)->delete();

        return redirect()->route('user.water-monitoring')->with('status', 'Water reading deleted.');
    }

    public function exportWaterReadings(Request $request): Response
    {
        $filters = $request->validate([
            'site_id' => ['nullable', 'integer'],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);
        $readings = $request->user()->waterReadings()
            ->with('site')
            ->when(isset($filters['site_id']), fn (Builder $query) => $query->where('site_id', $filters['site_id']))
            ->when(isset($filters['from']), fn (Builder $query) => $query->whereDate('recorded_at', '>=', $filters['from']))
            ->when(isset($filters['to']), fn (Builder $query) => $query->whereDate('recorded_at', '<=', $filters['to']))
            ->latest('recorded_at')
            ->get();

        return $this->csvResponse('water-readings.csv', [
            'Recorded at', 'Site', 'pH', 'TDS (ppm)', 'Turbidity (NTU)',
            'ORP (mV)', 'COD (mg/L)', 'BOD (mg/L)', 'Discharge flow (m3/day)', 'Temperature (C)', 'Notes',
        ], $readings->map(fn (WaterReading $reading): array => [
            $reading->recorded_at->toDateTimeString(),
            $reading->site->name,
            $reading->ph,
            $reading->tds,
            $reading->turbidity,
            $reading->orp,
            $reading->cod,
            $reading->bod,
            $reading->discharge_flow,
            $reading->temperature,
            $reading->notes,
        ])->all());
    }

    public function chemicalKits(Request $request): View
    {
        $usages = $request->user()->chemicalUsages()
            ->with('site')
            ->latest('usage_date')
            ->paginate(15)
            ->withQueryString();

        return view('user.chemical-kits.index', [
            'usages' => $usages,
            'chemicalCount' => $request->user()->chemicalUsages()->distinct('chemical_name')->count('chemical_name'),
            'monthUsageCount' => $request->user()->chemicalUsages()->whereBetween('usage_date', [now()->startOfMonth(), now()->endOfMonth()])->count(),
        ]);
    }

    public function viewChemicalUsage(Request $request, int $usage): View
    {
        return view('user.chemical-kits.view', [
            'usage' => $request->user()->chemicalUsages()->with('site')->findOrFail($usage),
        ]);
    }

    public function editChemicalUsage(Request $request, int $usage): View
    {
        return view('user.chemical-kits.edit', [
            'usage' => $request->user()->chemicalUsages()->with('site')->findOrFail($usage),
            'sites' => $request->user()->sites()->orderBy('name')->get(),
        ]);
    }

    public function createChemicalKitUsage(Request $request): View
    {
        return view('user.chemical-kits.create', [
            'sites' => $request->user()->sites()->orderBy('name')->get(),
            'usage' => null,
        ]);
    }

    public function storeChemicalUsage(Request $request): RedirectResponse
    {
        $validated = $this->validateChemicalUsage($request);
        $site = $request->user()->sites()->findOrFail($validated['site_id']);

        $request->user()->chemicalUsages()->create([
            ...$validated,
            'site_id' => $site->id,
        ]);

        return redirect()->route('user.chemical-kits.index')->with('status', 'Chemical usage recorded.');
    }

    public function updateChemicalUsage(Request $request, int $usage): RedirectResponse
    {
        $record = $request->user()->chemicalUsages()->findOrFail($usage);
        $validated = $this->validateChemicalUsage($request);
        $request->user()->sites()->findOrFail($validated['site_id']);
        $record->update($validated);

        return redirect()->route('user.chemical-kits.index')->with('status', 'Chemical usage updated.');
    }

    public function deleteChemicalUsage(Request $request, int $usage): RedirectResponse
    {
        $request->user()->chemicalUsages()->findOrFail($usage)->delete();

        return redirect()->route('user.chemical-kits.index')->with('status', 'Chemical usage deleted.');
    }

    public function siteLocations(Request $request): View
    {
        $user = $request->user();
        $hasWaterMonitoringAccess = $user->hasWaterMonitoringAccess();
        $sites = $user->sites()
            ->withCount(['chemicalUsages', 'reminders'])
            ->when($hasWaterMonitoringAccess, fn (Builder $query) => $query->withCount('waterReadings'))
            ->orderBy('name')
            ->paginate(15);

        return view('user.site-locations.index', compact('sites', 'hasWaterMonitoringAccess'));
    }

    public function createSite(Request $request): View
    {
        return view('user.site-locations.create', [
            'addresses' => $request->user()->sites()
                ->select('address', 'city', 'province', 'country')
                ->distinct()
                ->limit(50)
                ->get(),
        ]);
    }

    public function viewSite(Request $request, int $site): View
    {
        $user = $request->user();
        $hasWaterMonitoringAccess = $user->hasWaterMonitoringAccess();
        $siteQuery = $user->sites()
            ->withCount(['chemicalUsages', 'reminders'])
            ->when($hasWaterMonitoringAccess, fn (Builder $query) => $query->withCount('waterReadings'))
            ->with([
                'chemicalUsages' => fn (HasMany $query) => $query->latest('usage_date')->limit(5),
                'reminders' => fn (HasMany $query) => $query->latest('due_at')->limit(5),
            ]);
        if ($hasWaterMonitoringAccess) {
            $siteQuery->with([
                'waterReadings' => fn (HasMany $query) => $query->latest('recorded_at')->limit(5),
            ]);
        }
        $site = $siteQuery
            ->findOrFail($site);

        if (! $hasWaterMonitoringAccess) {
            $site->setAttribute('water_readings_count', 0);
            $site->setRelation('waterReadings', collect());
        }

        return view('user.site-locations.view', compact('site', 'hasWaterMonitoringAccess'));
    }

    public function editSite(Request $request, int $site): View
    {
        $site = $request->user()->sites()->findOrFail($site);
        $addresses = $request->user()->sites()
            ->select('address', 'city', 'province', 'country')
            ->distinct()
            ->limit(50)
            ->get();

        return view('user.site-locations.edit', compact('site', 'addresses'));
    }

    public function storeSite(Request $request): RedirectResponse
    {
        $site = $request->user()->sites()->create($this->validateSite($request));
        $site->update([
            'site_code' => 'WZ-'.now()->format('Ymd').'-'.str_pad((string) $site->id, 5, '0', STR_PAD_LEFT),
        ]);

        return redirect()->route('user.site-locations')->with('status', 'Site created.');
    }

    public function updateSite(Request $request, int $site): RedirectResponse
    {
        $request->user()->sites()->findOrFail($site)->update($this->validateSite($request));

        return redirect()->route('user.site-locations')->with('status', 'Site updated.');
    }

    public function deleteSite(Request $request, int $site): RedirectResponse
    {
        $request->user()->sites()->findOrFail($site)->delete();

        return redirect()->route('user.site-locations')->with('status', 'Site and its linked readings and chemical records deleted.');
    }

    public function compliance(Request $request): View
    {
        $user = $request->user();
        $thresholds = $this->thresholds($user->settings ?? []);
        $sites = $user->sites()
            ->with(['waterReadings' => fn (Builder $query) => $query->latest('recorded_at')->limit(1)])
            ->orderBy('name')
            ->get();

        $siteChecks = $sites->map(function (Site $site) use ($thresholds): array {
            $reading = $site->waterReadings->first();
            $checks = $reading?->complianceChecks($thresholds) ?? [];
            $configuredChecks = array_values(array_filter($checks, fn (array $check): bool => $check['configured'] && $check['value'] !== null));

            return [
                'site' => $site,
                'reading' => $reading,
                'checks' => $checks,
                'score' => $configuredChecks === []
                    ? null
                    : (int) round(100 * count(array_filter($configuredChecks, fn (array $check): bool => $check['in_range'])) / count($configuredChecks)),
                'issues' => $reading?->complianceIssues($thresholds) ?? [],
            ];
        });
        $scores = $siteChecks->pluck('score')->filter(fn ($score) => $score !== null);

        return view('user.compliance', [
            'siteChecks' => $siteChecks,
            'thresholds' => $thresholds,
            'averageScore' => $scores->isEmpty() ? null : (int) round($scores->avg()),
            'alertCount' => $siteChecks->sum(fn (array $item): int => count($item['issues'])),
        ]);
    }

    public function auditReport(Request $request): View
    {
        $user = $request->user();
        $thresholds = $this->thresholds($user->settings ?? []);
        $readings = $user->waterReadings()->with('site')->latest('recorded_at')->paginate(20);

        return view('user.view-audit-report', [
            'readings' => $readings,
            'thresholds' => $thresholds,
            'auditScore' => $this->averageComplianceScore($user),
        ]);
    }

    public function exportAuditReport(Request $request): Response
    {
        $user = $request->user();
        $thresholds = $this->thresholds($user->settings ?? []);
        $readings = $user->waterReadings()->with('site')->latest('recorded_at')->get();

        return $this->csvResponse('wateryze-compliance-audit.csv', [
            'Recorded at', 'Site', 'Status', 'pH', 'TDS (ppm)', 'Turbidity (NTU)',
            'ORP (mV)', 'COD (mg/L)', 'BOD (mg/L)', 'Discharge flow (m3/day)',
        ], $readings->map(fn (WaterReading $reading): array => [
            $reading->recorded_at->toDateTimeString(),
            $reading->site->name,
            $reading->complianceStatus($thresholds),
            $reading->ph,
            $reading->tds,
            $reading->turbidity,
            $reading->orp,
            $reading->cod,
            $reading->bod,
            $reading->discharge_flow,
        ])->all());
    }

    public function schedule(Request $request): View
    {
        $reminders = $request->user()->reminders()
            ->with('site')
            ->when($request->filled('status'), fn (Builder $query) => $query->where('status', $request->input('status')))
            ->orderByRaw("CASE WHEN status = 'scheduled' THEN 0 ELSE 1 END")
            ->orderBy('due_at')
            ->paginate(20)
            ->withQueryString();

        return view('user.reminders.index', [
            'reminders' => $reminders,
            'upcomingCount' => $request->user()->reminders()->where('status', 'scheduled')->where('due_at', '>=', now())->count(),
            'overdueCount' => $request->user()->reminders()->where('status', 'scheduled')->where('due_at', '<', now())->count(),
            'completedCount' => $request->user()->reminders()->where('status', 'completed')->count(),
        ]);
    }

    public function createReminder(Request $request): View
    {
        return view('user.reminders.create', [
            'sites' => $request->user()->sites()->orderBy('name')->get(),
        ]);
    }

    public function viewReminder(Request $request, int $reminder): View
    {
        $reminder = $request->user()->reminders()->with('site')->findOrFail($reminder);

        return view('user.reminders.view', compact('reminder'));
    }

    public function editReminder(Request $request, int $reminder): View
    {
        $reminder = $request->user()->reminders()->with('site')->findOrFail($reminder);

        return view('user.reminders.edit', [
            'reminder' => $reminder,
            'sites' => $request->user()->sites()->orderBy('name')->get(),
        ]);
    }

    public function storeReminder(Request $request): RedirectResponse
    {
        $validated = $this->validateReminder($request);
        $this->validateOwnedSite($request, $validated['site_id'] ?? null);
        $reminder = $request->user()->reminders()->create([
            ...$validated,
            'due_at' => Carbon::parse($validated['due_at']),
        ]);

        if ($request->user()->settings['notifications']['reminders'] ?? true) {
            $request->user()->dashboardNotifications()->create([
                'title' => 'Reminder scheduled',
                'message' => $reminder->title.' is scheduled for '.$reminder->due_at->format('M j, Y g:i A').'.',
                'type' => 'reminder',
            ]);
        }

        return redirect()->route('user.schedule')->with('status', 'Reminder scheduled.');
    }

    public function updateReminder(Request $request, int $reminder): RedirectResponse
    {
        $record = $request->user()->reminders()->findOrFail($reminder);
        $validated = $this->validateReminder($request);
        $this->validateOwnedSite($request, $validated['site_id'] ?? null);
        $record->update([
            ...$validated,
            'due_at' => Carbon::parse($validated['due_at']),
            'completed_at' => ($validated['status'] ?? $record->status) === 'completed' ? now() : null,
        ]);

        return redirect()->route('user.schedule')->with('status', 'Reminder updated.');
    }

    public function deleteReminder(Request $request, int $reminder): RedirectResponse
    {
        $request->user()->reminders()->findOrFail($reminder)->delete();

        return redirect()->route('user.schedule')->with('status', 'Reminder deleted.');
    }

    public function reports(Request $request): View
    {
        $reports = $request->user()->waterReadings()
            ->with('site')
            ->latest('recorded_at')
            ->paginate(20)
            ->withQueryString();

        return view('user.report.index', [
            'reports' => $reports,
            'thresholds' => $this->thresholds($request->user()->settings ?? []),
        ]);
    }

    public function viewReport(Request $request, ?int $reading = null): View
    {
        $report = $reading === null
            ? $request->user()->waterReadings()->with('site')->latest('recorded_at')->first()
            : $request->user()->waterReadings()->with('site')->findOrFail($reading);

        return view('user.report.view', [
            'report' => $report,
            'thresholds' => $this->thresholds($request->user()->settings ?? []),
        ]);
    }

    public function notifications(Request $request): View
    {
        $notifications = $request->user()->dashboardNotifications()
            ->whereNull('dismissed_at')
            ->when($request->filled('type'), fn (Builder $query) => $query->where('type', $request->input('type')))
            ->when($request->input('read') === 'yes', fn (Builder $query) => $query->whereNotNull('read_at'))
            ->when($request->input('read') === 'no', fn (Builder $query) => $query->whereNull('read_at'))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('user.notifications', [
            'notifications' => $notifications,
            'unreadCount' => $request->user()->dashboardNotifications()->whereNull('read_at')->whereNull('dismissed_at')->count(),
            'alertCount' => $request->user()->dashboardNotifications()->where('type', 'alert')->whereNull('dismissed_at')->count(),
        ]);
    }

    public function markNotificationRead(Request $request, int $notification): RedirectResponse
    {
        $request->user()->dashboardNotifications()->findOrFail($notification)->update(['read_at' => now()]);

        return back()->with('status', 'Notification marked as read.');
    }

    public function markAllNotificationsRead(Request $request): RedirectResponse
    {
        $request->user()->dashboardNotifications()
            ->whereNull('read_at')
            ->whereNull('dismissed_at')
            ->update(['read_at' => now()]);

        return back()->with('status', 'All notifications marked as read.');
    }

    public function dismissNotification(Request $request, int $notification): RedirectResponse
    {
        $request->user()->dashboardNotifications()->findOrFail($notification)->update([
            'dismissed_at' => now(),
        ]);

        return back()->with('status', 'Notification dismissed.');
    }

    public function profile(Request $request): View
    {
        return view('user.profile', ['profile' => $request->user()]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        if (is_string($request->input('email'))) {
            $request->merge(['email' => mb_strtolower(trim($request->input('email')))]);
        }

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($request->user()->id)],
            'country_code' => ['nullable', 'string', 'regex:/^\+[1-9][0-9]{0,2}$/'],
            'phone_country' => ['nullable', 'string', 'regex:/^[a-z]{2}$/'],
            'phone' => ['nullable', 'string', 'max:30', 'regex:/^(?=(?:\D*\d){4,15}$)[0-9().\-\s]+$/'],
            'company' => ['nullable', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:120'],
            'province' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:100'],
        ]);

        $request->user()->update($validated);

        return redirect()->route('user.profile')->with('status', 'Profile updated.');
    }

    public function settings(Request $request): View
    {
        return view('user.settings', [
            'settings' => array_replace_recursive(
                ['notifications' => ['reminders' => true, 'quality_alerts' => true], 'thresholds' => self::DEFAULT_THRESHOLDS],
                $request->user()->settings ?? [],
            ),
        ]);
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'notifications.quality_alerts' => ['required', 'boolean'],
            'notifications.reminders' => ['required', 'boolean'],
            'thresholds.ph_min' => ['nullable', 'numeric', 'between:0,14'],
            'thresholds.ph_max' => ['nullable', 'numeric', 'between:0,14'],
            'thresholds.tds_max' => ['nullable', 'numeric', 'min:0'],
            'thresholds.turbidity_max' => ['nullable', 'numeric', 'min:0'],
            'thresholds.orp_min' => ['nullable', 'numeric'],
            'thresholds.orp_max' => ['nullable', 'numeric'],
            'thresholds.cod_max' => ['nullable', 'numeric', 'min:0'],
            'thresholds.bod_max' => ['nullable', 'numeric', 'min:0'],
            'thresholds.discharge_flow_max' => ['nullable', 'numeric', 'min:0'],
        ]);

        foreach (['ph', 'orp'] as $parameter) {
            $minimum = $validated['thresholds'][$parameter.'_min'] ?? null;
            $maximum = $validated['thresholds'][$parameter.'_max'] ?? null;

            if (is_numeric($minimum) && is_numeric($maximum) && $minimum > $maximum) {
                throw ValidationException::withMessages([
                    'thresholds.'.$parameter.'_max' => 'The maximum '.$parameter.' value must be greater than or equal to its minimum.',
                ]);
            }
        }

        $validated['notifications'] = array_map(
            fn ($value): bool => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            $validated['notifications'],
        );
        $validated['thresholds'] = array_map(
            fn ($value): ?float => is_numeric($value) ? (float) $value : null,
            $validated['thresholds'] ?? [],
        );

        $request->user()->update(['settings' => $validated]);

        return redirect()->route('user.settings')->with('status', 'Dashboard settings updated.');
    }

    private function validateSensorApiConfiguration(Request $request, bool $creating): array
    {
        $allowedParameters = implode(',', self::SENSOR_PARAMETERS);
        $rules = [
            'endpoint_url' => [
                'required',
                'string',
                'max:2048',
                'url:https',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if (! is_string($value)) {
                        $fail('Use a valid public HTTPS API URL.');

                        return;
                    }

                    $parts = parse_url($value);
                    $host = strtolower(rtrim(trim($parts['host'] ?? '', '[]'), '.'));

                    if ($host === ''
                        || isset($parts['user'])
                        || isset($parts['pass'])
                        || (isset($parts['port']) && $parts['port'] !== 443)
                        || filter_var($host, FILTER_VALIDATE_IP)
                        || in_array($host, ['localhost'], true)
                        || preg_match('/\.(local|internal|test|invalid)$/', $host)) {
                        $fail('Use a public HTTPS API hostname without embedded credentials.');
                    }
                },
            ],
            'bearer_token' => ['nullable', 'string', 'max:4096'],
            'clear_bearer_token' => ['sometimes', 'boolean'],
            'parameters' => ['required', 'array:'.$allowedParameters, 'min:1'],
            'parameters.*' => ['accepted'],
            'paths' => ['nullable', 'array:'.$allowedParameters],
            'timestamp_path' => ['nullable', 'string', 'max:150', 'regex:/\A[A-Za-z0-9_.-]+\z/'],
        ];

        if ($creating) {
            $rules['site_id'] = ['required', 'integer'];
        }

        foreach (self::SENSOR_PARAMETERS as $parameter) {
            $rules['paths.'.$parameter] = [
                'exclude_unless:parameters.'.$parameter.',1',
                'required',
                'string',
                'max:150',
                'regex:/\A[A-Za-z0-9_.-]+\z/',
            ];
        }

        return $request->validate($rules);
    }

    private function sensorParameterMap(array $validated): array
    {
        $map = [];
        foreach (self::SENSOR_PARAMETERS as $parameter) {
            if (isset($validated['parameters'][$parameter])) {
                $map[$parameter] = $validated['paths'][$parameter];
            }
        }

        return $map;
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $request->user()->update(['password' => Hash::make($validated['password'])]);

        return redirect()->route('user.settings')->with('status', 'Password updated.');
    }

    private function validateChemicalUsage(Request $request): array
    {
        return $request->validate([
            'site_id' => ['required', 'integer'],
            'chemical_name' => ['required', 'string', 'max:120'],
            'usage_date' => ['required', 'date', 'before_or_equal:today'],
            'quantity' => ['required', 'numeric', 'gt:0'],
            'unit' => ['required', 'string', 'max:40'],
            'purpose' => ['required', 'string', 'max:120'],
            'notes' => ['nullable', 'string', 'max:5000'],
        ]);
    }

    private function validateSite(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'facility_type' => ['nullable', 'string', 'max:120'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:120'],
            'province' => ['required', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:100'],
            'capacity' => ['nullable', 'numeric', 'gt:0'],
            'treatment_type' => ['nullable', 'string', 'max:120'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);
    }

    private function validateReminder(Request $request): array
    {
        return $request->validate([
            'site_id' => ['nullable', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'due_at' => ['required', 'date'],
            'status' => ['required', Rule::in(['scheduled', 'completed', 'cancelled'])],
        ]);
    }

    private function validateOwnedSite(Request $request, int|string|null $siteId): void
    {
        if ($siteId !== null) {
            $request->user()->sites()->findOrFail($siteId);
        }
    }

    private function recordReadingAlert(Request $request, WaterReading $reading): void
    {
        $user = $request->user();

        if (! ($user->settings['notifications']['quality_alerts'] ?? true)) {
            return;
        }

        $issues = $reading->complianceIssues($this->thresholds($user->settings ?? []));

        if ($issues === []) {
            return;
        }

        $user->dashboardNotifications()->create([
            'title' => 'Water quality alert: '.$reading->site->name,
            'message' => implode(', ', $issues).' exceeded the limits configured for this account.',
            'type' => 'alert',
        ]);
    }

    private function thresholds(array $settings): array
    {
        return array_replace(self::DEFAULT_THRESHOLDS, $settings['thresholds'] ?? []);
    }

    private function averageComplianceScore(User $user): ?int
    {
        $thresholds = $this->thresholds($user->settings ?? []);
        $scores = $user->sites()
            ->with(['waterReadings' => fn (Builder $query) => $query->latest('recorded_at')->limit(1)])
            ->get()
            ->map(function (Site $site) use ($thresholds): ?int {
                $reading = $site->waterReadings->first();
                $checks = array_values(array_filter(
                    $reading?->complianceChecks($thresholds) ?? [],
                    fn (array $check): bool => $check['configured'] && $check['value'] !== null,
                ));

                return $checks === []
                    ? null
                    : (int) round(100 * count(array_filter($checks, fn (array $check): bool => $check['in_range'])) / count($checks));
            })
            ->filter(fn ($score): bool => $score !== null);

        return $scores->isEmpty() ? null : (int) round($scores->avg());
    }

    private function csvResponse(string $filename, array $headers, array $rows): Response
    {
        $csv = fopen('php://temp', 'r+');
        fputcsv($csv, $this->spreadsheetSafeRow($headers));

        foreach ($rows as $row) {
            fputcsv($csv, $this->spreadsheetSafeRow($row));
        }

        rewind($csv);
        $contents = stream_get_contents($csv);
        fclose($csv);

        return response($contents, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }

    private function spreadsheetSafeRow(array $row): array
    {
        return array_map(function ($value) {
            if (is_string($value) && preg_match('/^[\x00-\x20]*[=+\-@]/', $value)) {
                return "'".$value;
            }

            return $value;
        }, $row);
    }
}
