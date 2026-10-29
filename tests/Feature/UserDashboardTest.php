<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use App\Services\SensorApiClient;
use App\Services\SensorApiException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Tests\Feature\Concerns\CreatesPaidSubscription;
use Tests\TestCase;

class UserDashboardTest extends TestCase
{
    use CreatesPaidSubscription;
    use RefreshDatabase;

    public function test_report_pages_are_read_only_and_work_with_empty_and_saved_api_readings(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $this->createPaidSubscription($user);
        $this->actingAs($user);

        $this->get(route('user.reports.index'))
            ->assertOk()
            ->assertSee('Water-quality reports')
            ->assertSee('Reports are created from sensor readings.')
            ->assertSee('Connect a sensor API')
            ->assertDontSee('Edit</a>');
        $this->get(route('user.reports.view'))
            ->assertOk()
            ->assertSee('No readings have been recorded.')
            ->assertSee('Connect a sensor API');

        $site = $user->sites()->create($this->siteData());
        $reading = $user->waterReadings()->create([
            'site_id' => $site->id,
            'recorded_at' => now()->subHour(),
            'ph' => 7.2,
            'tds' => 320,
            'notes' => 'Initial reading note',
        ]);

        $this->get(route('user.reports.index'))
            ->assertOk()
            ->assertSee('North Treatment Plant')
            ->assertSee(route('user.reports.view', $reading), false)
            ->assertDontSee('Edit</a>');
        $this->get(route('user.reports.view', $reading))
            ->assertOk()
            ->assertSee('Initial reading note')
            ->assertSee('7.20')
            ->assertDontSee('Edit this reading');

        $otherSite = $otherUser->sites()->create($this->siteData(['name' => 'Private site']));
        $foreignReading = $otherUser->waterReadings()->create([
            'site_id' => $otherSite->id,
            'recorded_at' => now(),
            'ph' => 7,
        ]);
        $this->get('/user/reports/edit/'.$foreignReading->id)->assertNotFound();
    }

    public function test_sensor_api_setup_requires_safe_url_and_a_json_path_for_each_selected_parameter(): void
    {
        $user = User::factory()->create();
        $site = $user->sites()->create($this->siteData());
        $this->createPaidSubscription($user);
        $this->actingAs($user);

        $this->post(route('user.water-monitoring.apis.store'), [
            'site_id' => $site->id,
            'endpoint_url' => 'http://127.0.0.1/latest',
            'bearer_token' => 'private-token-that-must-not-be-flashed',
            'parameters' => ['ph' => '1'],
        ])->assertSessionHasErrors(['endpoint_url', 'paths.ph'])
            ->assertSessionMissing('_old_input.bearer_token')
            ->assertSessionMissing('_old_input.endpoint_url');
        $this->assertDatabaseCount('sensor_api_connections', 0);

        $this->post(route('user.water-monitoring.apis.store'), [
            'site_id' => $site->id,
            'endpoint_url' => 'https://sensor.example/latest',
            'parameters' => ['ph' => '1'],
        ])->assertSessionHasErrors('paths.ph');
        $this->assertDatabaseCount('sensor_api_connections', 0);

        $connection = $user->sensorApiConnections()->create([
            'site_id' => $site->id,
            'endpoint_url' => 'https://sensor.example/latest',
            'parameter_map' => ['ph' => 'data.ph'],
        ]);
        $client = new SensorApiClient(fn (string $host): array => ['127.0.0.1']);

        $this->expectException(SensorApiException::class);
        $client->fetch($connection);
    }

    public function test_user_can_manage_sites_readings_and_export_only_their_own_data(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $this->createPaidSubscription($user);
        $this->actingAs($user);

        $this->post(route('user.site-locations.store'), $this->siteData())
            ->assertRedirect(route('user.site-locations'))
            ->assertSessionHasNoErrors();

        $site = $user->sites()->firstOrFail();
        $this->assertNotEmpty($site->site_code);

        $this->put(route('user.site-locations.update', $site), $this->siteData([
            'name' => 'Updated treatment site',
        ]))->assertRedirect(route('user.site-locations'));
        $this->assertDatabaseHas('sites', ['id' => $site->id, 'name' => 'Updated treatment site']);

        $otherSite = $otherUser->sites()->create($this->siteData());
        $this->put(route('user.site-locations.update', $otherSite), $this->siteData([
            'name' => 'Unauthorized edit',
        ]))->assertNotFound();

        $this->post('/user/water-monitoring', [
            'site_id' => $site->id,
            'recorded_at' => now()->format('Y-m-d\TH:i'),
            'ph' => '6.2',
        ])->assertStatus(405);

        Http::fake([
            'https://sensor.example/api/latest' => Http::response([
                'data' => [
                    'measurement' => ['ph' => 6.2],
                    'timestamp' => now()->subMinute()->toIso8601String(),
                ],
            ]),
        ]);
        app()->instance(SensorApiClient::class, new SensorApiClient(
            fn (string $host): array => ['93.184.216.34'],
        ));

        $this->post(route('user.water-monitoring.apis.store'), [
            'site_id' => $site->id,
            'endpoint_url' => 'https://sensor.example/api/latest',
            'bearer_token' => 'private-test-token',
            'parameters' => ['ph' => '1'],
            'paths' => ['ph' => 'data.measurement.ph'],
            'timestamp_path' => 'data.timestamp',
        ])
            ->assertRedirect(route('user.water-monitoring'))
            ->assertSessionHasNoErrors();

        $connection = $user->sensorApiConnections()->firstOrFail();
        $this->assertSame('private-test-token', $connection->bearer_token);
        $this->assertNotSame('private-test-token', $connection->getRawOriginal('bearer_token'));
        $this->assertSame('https://sensor.example/api/latest', $connection->endpoint_url);

        $this->get(route('user.water-monitoring'))
            ->assertOk()
            ->assertSee('Sensor API connections')
            ->assertSee('Updated treatment site')
            ->assertSee('Fetch latest data')
            ->assertDontSee('name="ph"', false);
        $this->get(route('user.water-monitoring.apis.edit', $connection))
            ->assertOk()
            ->assertSee('data.measurement.ph')
            ->assertDontSee('private-test-token');

        $this->post(route('user.water-monitoring.apis.sync', $connection))
            ->assertRedirect(route('user.water-monitoring'))
            ->assertSessionHasNoErrors();

        $reading = $user->waterReadings()->firstOrFail();
        $this->assertSame((int) $user->id, (int) $reading->user_id);
        $this->assertSame($connection->id, $reading->sensor_api_connection_id);
        $this->assertSame(6.2, (float) $reading->ph);
        $this->assertNull($reading->tds);
        $this->assertDatabaseHas('dashboard_notifications', [
            'user_id' => $user->id,
            'type' => 'alert',
        ]);
        Http::assertSent(fn ($request) => $request->hasHeader('Authorization', 'Bearer private-test-token'));

        $this->post(route('user.water-monitoring.apis.sync', $connection))
            ->assertRedirect(route('user.water-monitoring'))
            ->assertSessionHas('status', 'The API returned the same reading; no duplicate was saved.');
        $this->assertSame(1, $user->waterReadings()->count());

        $this->post(route('user.water-monitoring.apis.store'), [
            'site_id' => $site->id,
            'endpoint_url' => 'https://tds.sensor.example/api/latest',
            'parameters' => ['tds' => '1'],
            'paths' => ['tds' => 'data.quality.tds'],
        ])->assertRedirect(route('user.water-monitoring'))
            ->assertSessionHasNoErrors();
        $this->assertSame(2, $user->sensorApiConnections()->count());

        $this->get(route('user.water-monitoring.view', $reading))
            ->assertOk()
            ->assertSee('6.20')
            ->assertDontSee('Edit reading');
        $this->put('/user/water-monitoring/'.$reading->id, [])
            ->assertStatus(405);

        $this->put(route('user.water-monitoring.apis.update', $connection), [
            'endpoint_url' => 'http://127.0.0.1/private',
            'parameters' => ['ph' => '1'],
            'paths' => ['ph' => 'data.ph'],
        ])->assertSessionHasErrors('endpoint_url');

        $this->assertDatabaseHas('dashboard_notifications', [
            'user_id' => $user->id,
            'type' => 'alert',
        ]);

        $foreignReading = $otherUser->waterReadings()->create([
            'site_id' => $otherSite->id,
            'ph' => 7,
            'recorded_at' => now(),
        ]);
        $this->get(route('user.reports.view', $foreignReading))->assertNotFound();
        $otherConnection = $otherUser->sensorApiConnections()->create([
            'site_id' => $otherSite->id,
            'endpoint_url' => 'https://sensor.example/private',
            'parameter_map' => ['ph' => 'data.ph'],
        ]);
        $this->get(route('user.water-monitoring.apis.edit', $otherConnection))->assertNotFound();
        $this->post(route('user.water-monitoring.apis.sync', $otherConnection))->assertNotFound();
        $this->delete(route('user.water-monitoring.apis.destroy', $otherConnection))->assertNotFound();
        $this->delete(route('user.water-monitoring.destroy', $foreignReading))->assertNotFound();

        $this->get(route('user.water-monitoring.export'))
            ->assertOk()
            ->assertHeader('Content-Type', 'text/csv; charset=UTF-8')
            ->assertSee('Updated treatment site')
            ->assertDontSee($otherSite->name);

        $this->delete(route('user.water-monitoring.destroy', $reading))->assertRedirect(route('user.water-monitoring'));
        $this->assertDatabaseMissing('water_readings', ['id' => $reading->id]);
    }

    public function test_site_and_reminder_crud_pages_are_separate_and_scoped_to_the_signed_in_user(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $this->createPaidSubscription($user);
        $this->actingAs($user);

        $this->get(route('user.site-locations'))
            ->assertOk()
            ->assertSee('No sites added yet');
        $this->get(route('user.site-locations.create'))
            ->assertOk()
            ->assertSee('Add a site')
            ->assertSee(route('user.site-locations.store'), false);

        $site = $user->sites()->create($this->siteData());
        $this->get(route('user.site-locations'))
            ->assertOk()
            ->assertSee('North Treatment Plant')
            ->assertSee(route('user.site-locations.view', $site), false)
            ->assertSee(route('user.site-locations.edit', $site), false);
        $this->get(route('user.site-locations.view', $site))
            ->assertOk()
            ->assertSee('Location and facility details')
            ->assertSee('Ottawa');
        $this->get(route('user.site-locations.edit', $site))
            ->assertOk()
            ->assertSee(route('user.site-locations.update', $site), false)
            ->assertSee('value="North Treatment Plant"', false);

        $otherSite = $otherUser->sites()->create($this->siteData(['name' => 'Private site']));
        $this->get(route('user.site-locations.view', $otherSite))->assertNotFound();
        $this->get(route('user.site-locations.edit', $otherSite))->assertNotFound();

        $this->get(route('user.schedule'))
            ->assertOk()
            ->assertSee('No reminders match this filter');
        $this->get(route('user.schedule.create'))
            ->assertOk()
            ->assertSee('Create reminder')
            ->assertSee('North Treatment Plant');

        $reminder = $user->reminders()->create([
            'site_id' => $site->id,
            'title' => 'Calibrate sensor',
            'description' => 'Check the pH sensor.',
            'due_at' => now()->addDay(),
            'status' => 'scheduled',
        ]);
        $this->get(route('user.schedule'))
            ->assertOk()
            ->assertSee('Calibrate sensor')
            ->assertSee(route('user.schedule.view', $reminder), false)
            ->assertSee(route('user.schedule.edit', $reminder), false);
        $this->get(route('user.schedule.view', $reminder))
            ->assertOk()
            ->assertSee('Check the pH sensor.')
            ->assertSee('Mark complete');
        $this->get(route('user.schedule.edit', $reminder))
            ->assertOk()
            ->assertSee(route('user.schedule.update', $reminder), false);

        $otherReminder = $otherUser->reminders()->create([
            'site_id' => $otherSite->id,
            'title' => 'Private reminder',
            'due_at' => now()->addDay(),
            'status' => 'scheduled',
        ]);
        $this->get(route('user.schedule.view', $otherReminder))->assertNotFound();
        $this->get(route('user.schedule.edit', $otherReminder))->assertNotFound();
    }

    public function test_sensor_api_readings_and_chemical_usage_have_separate_pages(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $this->createPaidSubscription($user);
        $this->actingAs($user);

        $site = $user->sites()->create($this->siteData());
        $otherSite = $otherUser->sites()->create($this->siteData(['name' => 'Private site']));

        $this->get(route('user.water-monitoring'))
            ->assertOk()
            ->assertSee('Reading history')
            ->assertSee('No readings found');
        $this->get(route('user.water-monitoring.apis.create'))
            ->assertOk()
            ->assertSee(route('user.water-monitoring.apis.store'), false)
            ->assertSee('Connect a sensor API')
            ->assertSee('parameters[ph]', false)
            ->assertSee('paths[ph]', false);

        $reading = $user->waterReadings()->create([
            'site_id' => $site->id,
            'recorded_at' => now()->subHour(),
            'ph' => 7.2,
            'tds' => 320,
            'sensor_api_connection_id' => null,
        ]);
        $this->get(route('user.water-monitoring'))
            ->assertOk()
            ->assertSee(route('user.water-monitoring.view', $reading), false)
            ->assertDontSee('/user/water-monitoring/'.$reading->id.'/edit')
            ->assertDontSee('name="ph"', false);
        $this->get(route('user.water-monitoring.view', $reading))
            ->assertOk()
            ->assertSee('7.20')
            ->assertDontSee('Edit reading');
        $this->post('/user/water-monitoring', ['ph' => 7.1])->assertStatus(405);
        $this->put('/user/water-monitoring/'.$reading->id, ['ph' => 7.1])->assertStatus(405);

        $otherReading = $otherUser->waterReadings()->create([
            'site_id' => $otherSite->id,
            'recorded_at' => now(),
            'ph' => 7,
        ]);
        $this->get(route('user.water-monitoring.view', $otherReading))->assertNotFound();

        $this->get(route('user.chemical-kits.index'))
            ->assertOk()
            ->assertSee('Usage history')
            ->assertSee('No chemical usage recorded yet');
        $this->get(route('user.chemical-kits.create'))
            ->assertOk()
            ->assertSee('Record chemical use')
            ->assertSee('North Treatment Plant');

        $usage = $user->chemicalUsages()->create([
            'site_id' => $site->id,
            'chemical_name' => 'Coagulant',
            'usage_date' => today(),
            'quantity' => 2.5,
            'unit' => 'L',
            'purpose' => 'Water treatment',
            'notes' => 'Morning treatment batch.',
        ]);
        $this->get(route('user.chemical-kits.index'))
            ->assertOk()
            ->assertSee('Coagulant')
            ->assertSee(route('user.chemical-kits.view', $usage), false)
            ->assertSee(route('user.chemical-kits.edit', $usage), false);
        $this->get(route('user.chemical-kits.view', $usage))
            ->assertOk()
            ->assertSee('Morning treatment batch.')
            ->assertSee('2.500 L');
        $this->get(route('user.chemical-kits.edit', $usage))
            ->assertOk()
            ->assertSee(route('user.chemical-kits.update', $usage), false);

        $otherUsage = $otherUser->chemicalUsages()->create([
            'site_id' => $otherSite->id,
            'chemical_name' => 'Private chemical',
            'usage_date' => today(),
            'quantity' => 1,
            'unit' => 'L',
            'purpose' => 'Private use',
        ]);
        $this->get(route('user.chemical-kits.view', $otherUsage))->assertNotFound();
        $this->get(route('user.chemical-kits.edit', $otherUsage))->assertNotFound();
    }

    public function test_user_can_manage_chemical_entries_reminders_and_notifications(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $site = $user->sites()->create($this->siteData());

        $chemicalData = [
            'site_id' => $site->id,
            'chemical_name' => 'Coagulant',
            'usage_date' => today()->toDateString(),
            'quantity' => '2.5',
            'unit' => 'L',
            'purpose' => 'Water treatment',
            'notes' => 'Batch 123.',
        ];
        $this->post(route('user.chemical-kits.store'), $chemicalData)
            ->assertRedirect(route('user.chemical-kits.index'));

        $usage = $user->chemicalUsages()->firstOrFail();
        $this->put(route('user.chemical-kits.update', $usage), [
            ...$chemicalData,
            'quantity' => '3',
        ])->assertRedirect(route('user.chemical-kits.index'));
        $this->assertDatabaseHas('chemical_usages', ['id' => $usage->id, 'quantity' => 3]);

        $this->delete(route('user.chemical-kits.destroy', $usage))
            ->assertRedirect(route('user.chemical-kits.index'));
        $this->assertDatabaseMissing('chemical_usages', ['id' => $usage->id]);

        $reminderData = [
            'site_id' => $site->id,
            'title' => 'Calibrate sensor',
            'description' => 'Check the site pH sensor.',
            'due_at' => now()->addDay()->format('Y-m-d\TH:i'),
            'status' => 'scheduled',
        ];
        $this->post(route('user.schedule.store'), $reminderData)
            ->assertRedirect(route('user.schedule'));
        $reminder = $user->reminders()->firstOrFail();

        $this->put(route('user.schedule.update', $reminder), [
            ...$reminderData,
            'status' => 'completed',
        ])->assertRedirect(route('user.schedule'));
        $this->assertDatabaseHas('reminders', ['id' => $reminder->id, 'status' => 'completed']);

        $notification = $user->dashboardNotifications()->create([
            'title' => 'System online',
            'message' => 'Your system is ready.',
            'type' => 'system',
        ]);
        $this->put(route('user.notifications.read', $notification))
            ->assertRedirect()
            ->assertSessionHasNoErrors();
        $this->assertNotNull($notification->fresh()->read_at);

        $this->delete(route('user.notifications.dismiss', $notification))
            ->assertRedirect()
            ->assertSessionHasNoErrors();
        $this->assertNotNull($notification->fresh()->dismissed_at);

        $this->delete(route('user.schedule.destroy', $reminder))->assertRedirect(route('user.schedule'));
        $this->assertDatabaseMissing('reminders', ['id' => $reminder->id]);
    }

    public function test_dashboard_profile_threshold_and_password_settings_are_saved_and_validated(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('current-password'),
        ]);
        $this->actingAs($user);

        $this->put(route('user.profile.update'), [
            'first_name' => 'Jordan',
            'last_name' => 'User',
            'email' => $user->email,
            'country_code' => '+1',
            'phone_country' => 'ca',
            'phone' => '555 123 4567',
            'company' => 'Blue Water',
            'industry' => 'Manufacturing',
            'address' => '10 Main Street',
            'city' => 'Ottawa',
            'province' => 'Ontario',
            'postal_code' => 'K1A 0B1',
            'country' => 'Canada',
        ])->assertRedirect(route('user.profile'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'first_name' => 'Jordan',
            'company' => 'Blue Water',
        ]);

        $settings = [
            'notifications' => ['reminders' => '0', 'quality_alerts' => '1'],
            'thresholds' => [
                'ph_min' => '6.7',
                'ph_max' => '8.2',
                'tds_max' => '450',
                'turbidity_max' => '',
                'orp_min' => '',
                'orp_max' => '',
                'cod_max' => '',
                'bod_max' => '',
                'discharge_flow_max' => '',
            ],
        ];
        $this->put(route('user.settings.update'), $settings)
            ->assertRedirect(route('user.settings'))
            ->assertSessionHasNoErrors();
        $this->assertSame(6.7, $user->fresh()->settings['thresholds']['ph_min']);
        $this->assertSame(false, $user->fresh()->settings['notifications']['reminders']);

        $this->from(route('user.settings'))->put(route('user.settings.update'), [
            ...$settings,
            'thresholds' => [...$settings['thresholds'], 'ph_min' => '9', 'ph_max' => '8'],
        ])->assertRedirect(route('user.settings'))
            ->assertSessionHasErrors('thresholds.ph_max');

        $this->from(route('user.settings'))->put(route('user.settings.password'), [
            'current_password' => 'incorrect-password',
            'password' => 'A-new-strong-password-123',
            'password_confirmation' => 'A-new-strong-password-123',
        ])->assertRedirect(route('user.settings'))
            ->assertSessionHasErrors('current_password');

        $this->put(route('user.settings.password'), [
            'current_password' => 'current-password',
            'password' => 'A-new-strong-password-123',
            'password_confirmation' => 'A-new-strong-password-123',
        ])->assertRedirect(route('user.settings'))
            ->assertSessionHasNoErrors();
        $this->assertTrue(Hash::check('A-new-strong-password-123', $user->fresh()->password));
    }

    public function test_admin_and_user_accounts_have_separate_dashboards_and_public_signup_cannot_create_admins(): void
    {
        $user = User::factory()->create();
        $administrator = Admin::factory()->create();

        $this->actingAs($user)
            ->get(route('user.dashboard'))
            ->assertOk();
        $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));

        $this->actingAs($administrator, 'admin')
            ->get('/admin')
            ->assertOk()
            ->assertViewIs('admin.index');
        $this->get(route('admin.dashboard'))->assertRedirect(route('admin.index'));
        $this->get('/admin')->assertOk()->assertViewIs('admin.index');
        $this->actingAs($user, 'web')
            ->get(route('user.dashboard'))
            ->assertOk();

        $this->post(route('admin.users.store'), [
            'first_name' => 'New',
            'last_name' => 'Operator',
            'email' => 'new-operator@example.com',
            'role' => 'user',
            'password' => 'A-new-strong-password-123',
            'password_confirmation' => 'A-new-strong-password-123',
        ])->assertRedirect(route('admin.users.index'))
            ->assertSessionHasNoErrors();

        $newUser = User::where('email', 'new-operator@example.com')->firstOrFail();
        $this->assertSame('user', $newUser->role);

        $this->actingAs($user)->post(route('signup.store'), [
            'role' => 'admin',
        ])->assertRedirect(route('home'));
        $this->assertSame('user', $newUser->fresh()->role);
    }

    public function test_admin_root_url_renders_the_dynamic_admin_index(): void
    {
        $administrator = Admin::factory()->create();
        $user = User::factory()->create();
        $site = $user->sites()->create($this->siteData());
        $user->waterReadings()->create([
            'site_id' => $site->id,
            'recorded_at' => now(),
            'ph' => 7.1,
            'tds' => 325,
            'discharge_flow' => 42.5,
        ]);

        $this->actingAs($administrator, 'admin')
            ->get('/admin')
            ->assertOk()
            ->assertViewIs('admin.index')
            ->assertSee('Total Users')
            ->assertSee('Stored Sensor Readings')
            ->assertSee('Recent Sensor Readings')
            ->assertSee('North Treatment Plant')
            ->assertSee('42.50');
    }

    public function test_administrator_accounts_are_separate_from_customer_accounts(): void
    {
        $user = User::factory()->create();
        $administrator = Admin::factory()->create(['email' => 'admin@example.com']);

        $this->actingAs($user)
            ->get('/admin')
            ->assertRedirect(route('admin.login'));

        $this->assertDatabaseHas('admins', ['email' => 'admin@example.com']);
        $this->assertDatabaseMissing('users', ['email' => 'admin@example.com']);
        $this->actingAs($administrator, 'admin')
            ->actingAs($user, 'web')
            ->get(route('user.dashboard'))
            ->assertOk();
    }

    public function test_admin_can_manage_customer_accounts(): void
    {
        $administrator = Admin::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($administrator, 'admin')
            ->get(route('admin.users.index'))
            ->assertOk()
            ->assertViewIs('admin.user.index')
            ->assertSee($user->email)
            ->assertDontSee($administrator->email);
        $this->get(route('admin.users.create'))
            ->assertOk()
            ->assertViewIs('admin.user.create')
            ->assertSee('intlTelInput')
            ->assertSee('name="phone_country"', false);
        $this->get(route('admin.users.edit', $user))->assertOk()->assertViewIs('admin.user.edit');
        $this->get(route('admin.users.show', $user))
            ->assertOk()
            ->assertViewIs('admin.user.view')
            ->assertSee($user->email)
            ->assertSee('Customer data');
        $this->get(route('admin.users.index', ['search' => $user->email]))
            ->assertOk()
            ->assertSee($user->email);
        $this->get(route('admin.users.index', ['search' => 'no-such-customer@example.test']))
            ->assertOk()
            ->assertSee('No matching customer accounts found.');

        $this->put(route('admin.users.update', $user), [
            'first_name' => 'Updated',
            'last_name' => 'Customer',
            'email' => $user->email,
            'company' => 'Wateryze Customer',
            'country_code' => '+1',
            'phone_country' => 'ca',
            'phone' => '4165550123',
            'address' => '123 Water Street',
            'city' => 'Toronto',
            'province' => 'Ontario',
            'postal_code' => 'M5V 2T6',
            'country' => 'Canada',
            'role' => 'admin',
        ])->assertRedirect(route('admin.users.index'))
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'phone_country' => 'ca',
            'country_code' => '+1',
            'address' => '123 Water Street',
        ]);
        $this->assertSame('user', $user->fresh()->role);

        $this->put(route('admin.users.update', $user), [
            'first_name' => 'Updated',
            'last_name' => 'Customer',
            'email' => $user->email,
            'company' => 'Wateryze Customer',
            'role' => 'admin',
        ])->assertRedirect(route('admin.users.index'))
            ->assertSessionHasNoErrors();
        $this->assertSame('user', $user->fresh()->role);

        $this->post(route('admin.users.store'), [
            'first_name' => 'Bad',
            'last_name' => 'Phone',
            'email' => 'bad-phone@example.test',
            'phone' => '4165550123',
            'password' => 'A-new-strong-password-123',
            'password_confirmation' => 'A-new-strong-password-123',
        ])->assertSessionHasErrors(['country_code', 'phone_country']);

        $this->post(route('admin.users.store'), [
            'first_name' => 'Taken',
            'last_name' => 'Admin Email',
            'email' => $administrator->email,
            'password' => 'A-new-strong-password-123',
            'password_confirmation' => 'A-new-strong-password-123',
        ])->assertSessionHasErrors('email');

        $this->post(route('admin.users.store'), [
            'first_name' => 'New',
            'last_name' => 'Customer',
            'email' => 'new-customer@example.test',
            'country_code' => '+1',
            'phone_country' => 'ca',
            'phone' => '4165550101',
            'password' => 'A-new-strong-password-123',
            'password_confirmation' => 'A-new-strong-password-123',
        ])->assertRedirect(route('admin.users.index'))
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', [
            'email' => 'new-customer@example.test',
            'role' => 'user',
            'country_code' => '+1',
            'phone_country' => 'ca',
        ]);

        $this->delete(route('admin.users.destroy', $user->fresh()))->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_user_crud_cannot_view_modify_or_delete_an_administrator_account(): void
    {
        $administrator = Admin::factory()->create();
        $legacyAdmin = User::factory()->create([
            'email' => 'legacy-admin@example.test',
            'role' => 'admin',
        ]);
        $this->actingAs($administrator, 'admin');

        $this->get(route('admin.users.show', $legacyAdmin))->assertNotFound();
        $this->get(route('admin.users.edit', $legacyAdmin))->assertNotFound();
        $this->put(route('admin.users.update', $legacyAdmin), [
            'first_name' => 'Changed',
            'last_name' => 'Admin',
            'email' => $legacyAdmin->email,
        ])->assertNotFound();
        $this->delete(route('admin.users.destroy', $legacyAdmin))->assertNotFound();
        $this->assertDatabaseHas('users', [
            'id' => $legacyAdmin->id,
            'role' => 'admin',
        ]);
    }

    public function test_admin_navigation_routes_render_without_missing_pages(): void
    {
        $this->actingAs(Admin::factory()->create(), 'admin');

        foreach ([
            'admin.index',
            'admin.users.index',
            'admin.water-usage',
            'admin.chemical-usage',
            'admin.compliance',
            'admin.kit-delivery',
            'admin.subscriptions',
            'admin.subscription-plans',
            'admin.billing',
            'admin.reports',
            'admin.partner-labs',
            'admin.technicians',
            'admin.settings',
            'admin.profile',
        ] as $routeName) {
            $this->get(route($routeName))->assertOk();
        }
    }

    public function test_first_administrator_can_be_provisioned_from_the_command_line(): void
    {
        $user = User::factory()->create();

        $this->artisan('wateryze:promote-admin', [
            'email' => strtoupper($user->email),
            '--force' => true,
        ])->assertSuccessful();

        $admin = Admin::where('email', $user->email)->firstOrFail();
        $this->assertSame('user', $user->fresh()->role);
        $this->actingAs($admin, 'admin')
            ->get(route('admin.dashboard'))
            ->assertRedirect(route('admin.index'));
    }

    private function siteData(array $overrides = []): array
    {
        return [
            'name' => 'North Treatment Plant',
            'facility_type' => 'Manufacturing',
            'address' => '10 Main Street',
            'city' => 'Ottawa',
            'province' => 'Ontario',
            'postal_code' => 'K1A 0B1',
            'country' => 'Canada',
            'capacity' => '500',
            'treatment_type' => 'Biological',
            'latitude' => '45.4215',
            'longitude' => '-75.6972',
            ...$overrides,
        ];
    }
}
