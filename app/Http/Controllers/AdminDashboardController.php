<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ChemicalUsage;
use App\Models\SensorApiConnection;
use App\Models\Site;
use App\Models\User;
use App\Models\WaterReading;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $today = now()->startOfDay();
        $weekStart = now()->subDays(6)->startOfDay();
        $monthStart = now()->startOfMonth();
        $dailyReadings = WaterReading::query()
            ->where('recorded_at', '>=', $weekStart)
            ->get(['recorded_at', 'discharge_flow']);
        $monthlyReadings = WaterReading::query()
            ->where('recorded_at', '>=', now()->startOfYear())
            ->get(['recorded_at', 'discharge_flow']);

        $dailyLabels = collect(range(0, 6))
            ->map(fn (int $daysAgo) => now()->subDays(6 - $daysAgo)->toDateString());
        $dailyUsage = $dailyLabels->map(fn (string $date) => $dailyReadings
            ->filter(fn (WaterReading $reading) => $reading->recorded_at->toDateString() === $date)
            ->whereNotNull('discharge_flow')
            ->avg(fn (WaterReading $reading) => (float) $reading->discharge_flow) ?? 0);
        $monthlyLabels = collect(range(1, (int) now()->format('n')))
            ->map(fn (int $month) => now()->startOfYear()->month($month)->format('M'));
        $monthlyUsage = collect(range(1, (int) now()->format('n')))
            ->map(fn (int $month) => $monthlyReadings
                ->filter(fn (WaterReading $reading) => (int) $reading->recorded_at->format('n') === $month)
                ->whereNotNull('discharge_flow')
                ->avg(fn (WaterReading $reading) => (float) $reading->discharge_flow) ?? 0);

        return view('admin.index', [
            'userCount' => User::whereNotIn('email', Admin::select('email'))->count(),
            'adminCount' => Admin::count(),
            'siteCount' => Site::count(),
            'readingCount' => WaterReading::count(),
            'activeConnectionCount' => SensorApiConnection::count(),
            'monthDischargeAverage' => (float) (WaterReading::query()
                ->where('recorded_at', '>=', $monthStart)
                ->avg('discharge_flow') ?? 0),
            'todayReadingCount' => WaterReading::query()
                ->where('recorded_at', '>=', $today)
                ->count(),
            'dailyLabels' => $dailyLabels,
            'dailyUsage' => $dailyUsage,
            'monthlyLabels' => $monthlyLabels,
            'monthlyUsage' => $monthlyUsage,
            'recentUsers' => User::whereNotIn('email', Admin::select('email'))
                ->latest()
                ->limit(8)
                ->get(),
            'recentReadings' => WaterReading::query()
                ->with(['site.user'])
                ->latest('recorded_at')
                ->limit(8)
                ->get(),
        ]);
    }

    public function dashboard(): RedirectResponse
    {
        return redirect()->route('admin.index');
    }

    public function waterUsage(Request $request): View
    {
        $readings = WaterReading::query()
            ->with(['site.user'])
            ->when($request->filled('search'), function ($query) use ($request): void {
                $search = $request->string('search')->trim()->toString();
                $query->whereHas('site', fn ($site) => $site
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhereHas('user', fn ($user) => $user->where('email', 'like', '%'.$search.'%')));
            })
            ->latest('recorded_at')
            ->paginate(25)
            ->withQueryString();

        return view('admin.records', [
            'title' => 'Water monitoring',
            'description' => 'Read-only sensor readings imported from customer-configured APIs.',
            'columns' => ['Site', 'Customer', 'Recorded at', 'pH', 'TDS', 'Turbidity', 'Discharge flow'],
            'rows' => $readings->through(fn (WaterReading $reading): array => [
                $reading->site?->name ?? 'Site removed',
                $reading->site?->user?->email ?? '—',
                $reading->recorded_at->format('M j, Y H:i'),
                $reading->ph ?? '—',
                $reading->tds ?? '—',
                $reading->turbidity ?? '—',
                $reading->discharge_flow ?? '—',
            ]),
            'records' => $readings,
        ]);
    }

    public function chemicalUsage(Request $request): View
    {
        $usages = ChemicalUsage::query()
            ->with(['site.user'])
            ->when($request->filled('search'), function ($query) use ($request): void {
                $search = $request->string('search')->trim()->toString();
                $query->where('chemical_name', 'like', '%'.$search.'%')
                    ->orWhereHas('site', fn ($site) => $site
                        ->where('name', 'like', '%'.$search.'%')
                        ->orWhereHas('user', fn ($user) => $user->where('email', 'like', '%'.$search.'%')));
            })
            ->latest('usage_date')
            ->paginate(25)
            ->withQueryString();

        return view('admin.records', [
            'title' => 'Chemical usage',
            'description' => 'Customer-entered chemical usage records across all sites.',
            'columns' => ['Chemical', 'Site', 'Customer', 'Date', 'Quantity', 'Purpose'],
            'rows' => $usages->through(fn (ChemicalUsage $usage): array => [
                $usage->chemical_name,
                $usage->site?->name ?? 'Site removed',
                $usage->site?->user?->email ?? '—',
                $usage->usage_date->format('M j, Y'),
                $usage->quantity.' '.$usage->unit,
                $usage->purpose,
            ]),
            'records' => $usages,
        ]);
    }

    public function compliance(Request $request): View
    {
        $readings = WaterReading::query()
            ->with(['site.user'])
            ->when($request->filled('search'), function ($query) use ($request): void {
                $search = $request->string('search')->trim()->toString();
                $query->whereHas('site', fn ($site) => $site
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhereHas('user', fn ($user) => $user->where('email', 'like', '%'.$search.'%')));
            })
            ->latest('recorded_at')
            ->paginate(25)
            ->withQueryString();

        return view('admin.records', [
            'title' => 'Compliance monitoring',
            'description' => 'Sensor readings with status calculated against each customer’s saved comparison thresholds.',
            'columns' => ['Site', 'Customer', 'Recorded at', 'pH', 'TDS', 'Turbidity', 'Status'],
            'rows' => $readings->through(function (WaterReading $reading): array {
                $limits = $reading->site?->user?->settings ?? [];

                return [
                    $reading->site?->name ?? 'Site removed',
                    $reading->site?->user?->email ?? '—',
                    $reading->recorded_at->format('M j, Y H:i'),
                    $reading->ph ?? '—',
                    $reading->tds ?? '—',
                    $reading->turbidity ?? '—',
                    $reading->complianceStatus($limits),
                ];
            }),
            'records' => $readings,
        ]);
    }

    public function reports(Request $request): View
    {
        $readings = WaterReading::query()
            ->with(['site.user'])
            ->when($request->filled('search'), function ($query) use ($request): void {
                $search = $request->string('search')->trim()->toString();
                $query->whereHas('site', fn ($site) => $site
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhereHas('user', fn ($user) => $user->where('email', 'like', '%'.$search.'%')));
            })
            ->latest('recorded_at')
            ->paginate(25)
            ->withQueryString();

        return view('admin.records', [
            'title' => 'Water quality reports',
            'description' => 'Current report data is generated from imported customer sensor readings.',
            'columns' => ['Site', 'Customer', 'Recorded at', 'pH', 'TDS', 'Turbidity', 'ORP', 'COD', 'BOD'],
            'rows' => $readings->through(fn (WaterReading $reading): array => [
                $reading->site?->name ?? 'Site removed',
                $reading->site?->user?->email ?? '—',
                $reading->recorded_at->format('M j, Y H:i'),
                $reading->ph ?? '—',
                $reading->tds ?? '—',
                $reading->turbidity ?? '—',
                $reading->orp ?? '—',
                $reading->cod ?? '—',
                $reading->bod ?? '—',
            ]),
            'records' => $readings,
        ]);
    }

}
