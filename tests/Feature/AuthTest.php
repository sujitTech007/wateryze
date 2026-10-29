<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\Feature\Concerns\CreatesPaidSubscription;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use CreatesPaidSubscription;
    use RefreshDatabase;

    public function test_registration_validates_input_creates_user_and_signs_them_in(): void
    {
        $response = $this->post(route('signup.store'), [
            'first_name' => 'Taylor',
            'last_name' => 'Example',
            'email' => '  TAYLOR@example.com ',
            'role' => 'admin',
            'country_code' => '+1',
            'phone_country' => 'ca',
            'phone' => '(555) 123-4567',
            'password' => 'A-strong-password-123',
            'password_confirmation' => 'A-strong-password-123',
            'terms' => '1',
        ]);
        $response->assertRedirect('/user/dashboard')->assertSessionHasNoErrors();

        $user = User::where('email', 'taylor@example.com')->firstOrFail();

        $this->assertAuthenticatedAs($user);
        $this->assertSame('user', $user->role);
        $this->assertSame('Taylor Example', $user->name);
        $this->assertSame('Taylor', $user->first_name);
        $this->assertSame('Example', $user->last_name);
        $this->assertSame('+1', $user->country_code);
        $this->assertSame('ca', $user->phone_country);
        $this->assertSame('(555) 123-4567', $user->phone);
        $this->assertSame('+1 (555) 123-4567', $user->full_phone);
        $this->assertTrue(Hash::check('A-strong-password-123', $user->password));
        $this->get('/user/dashboard')
            ->assertOk()
            ->assertSee('Dashboard')
            ->assertSee('Welcome to your dashboard')
            ->assertSee('Your account has been created successfully.');
    }

    public function test_guest_cannot_access_user_dashboard(): void
    {
        $this->get('/user/dashboard')
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_dashboard_pages_are_reachable_by_named_routes(): void
    {
        $user = User::factory()->create();
        $this->createPaidSubscription($user);
        $this->actingAs($user);

        $routes = [
            'user.dashboard',
            'user.water-monitoring',
            'user.water-monitoring.apis.create',
            'user.chemical-kits.index',
            'user.chemical-kits.create',
            'user.compliance',
            'user.audit-report',
            'user.schedule',
            'user.reports.index',
            'user.reports.view',
            'user.site-locations',
            'user.notifications',
            'user.profile',
            'user.settings',
        ];

        foreach ($routes as $route) {
            $this->get(route($route))->assertOk();
        }
    }

    public function test_water_monitoring_requires_a_successful_premium_payment(): void
    {
        $user = User::factory()->create();
        $basicPlan = SubscriptionPlan::query()->where('water_monitoring_enabled', false)->firstOrFail();
        $attempt = $user->paymentAttempts()->create([
            'subscription_plan_id' => $basicPlan->id,
            'amount_cents' => (int) round((float) $basicPlan->amount * 100),
            'currency' => 'CAD',
            'billing_cycle' => 'monthly',
            'plan_snapshot' => ['water_monitoring_enabled' => false],
            'status' => 'pending',
        ]);
        $user->subscriptions()->create([
            'payment_attempt_id' => $attempt->id,
            'stripe_subscription_id' => 'sub_basic_'.$user->id,
            'water_monitoring_enabled' => true,
            'subscription_plan_id' => $basicPlan->id,
            'billing_cycle' => 'monthly',
            'amount' => $basicPlan->amount,
            'start_date' => today(),
            'status' => 'active',
        ]);
        $this->actingAs($user);

        $this->get(route('user.water-monitoring'))
            ->assertRedirect(route('user.subscription'))
            ->assertSessionHasErrors('subscription');
    }

    public function test_login_and_registration_pages_render_working_forms(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('action="'.route('login.store').'"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="password"', false)
            ->assertSee('name="remember"', false);

        $this->get(route('signup'))
            ->assertOk()
            ->assertSee('action="'.route('signup.store').'"', false)
            ->assertSee('name="first_name"', false)
            ->assertSee('name="last_name"', false)
            ->assertSee('name="country_code"', false)
            ->assertSee('name="phone_country"', false)
            ->assertSee('intl-tel-input@25.15.1', false)
            ->assertSee('country-phone.js', false)
            ->assertSee('name="phone"', false)
            ->assertSee('name="password_confirmation"', false)
            ->assertSee('data-password-toggle="password"', false);
    }

    public function test_registration_rejects_invalid_or_duplicate_data(): void
    {
        User::factory()->create(['email' => 'already@example.com']);

        $response = $this->from(route('signup'))->post(route('signup.store'), [
            'first_name' => '',
            'last_name' => 'Example',
            'email' => 'ALREADY@example.com',
            'country_code' => '1',
            'phone' => 'invalid',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);

        $response->assertRedirect(route('signup'))
            ->assertSessionHasErrors(['first_name', 'email', 'country_code', 'phone', 'password', 'terms']);
        $this->assertDatabaseCount('users', 1);
        $this->assertGuest();
    }

    public function test_user_can_log_in_and_log_out(): void
    {
        $user = User::factory()->create([
            'email' => 'member@example.com',
            'password' => Hash::make('correct-password'),
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => ' MEMBER@example.com ',
            'password' => 'correct-password',
            'remember' => '1',
        ])->assertRedirect('/user/dashboard');

        $this->assertAuthenticatedAs($user);
        $this->get('/user/dashboard')
            ->assertOk()
            ->assertSee('You are now signed in.');

        $this->post(route('logout'))
            ->assertRedirect(route('home'));

        $this->assertGuest();
        $this->get(route('home'))->assertSee('You have been signed out.');
    }

    public function test_login_rejects_incorrect_credentials(): void
    {
        User::factory()->create([
            'email' => 'member@example.com',
            'password' => Hash::make('correct-password'),
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => 'member@example.com',
            'password' => 'wrong-password',
        ])->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_authentication_middleware_protects_guest_and_logout_routes(): void
    {
        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->actingAs(User::factory()->create());

        $this->get(route('login'))
            ->assertRedirect(route('home'));
        $this->get(route('signup'))
            ->assertRedirect(route('home'));
        $this->post(route('login.store'), [])
            ->assertRedirect(route('home'));
        $this->post(route('signup.store'), [])
            ->assertRedirect(route('home'));
    }

    public function test_admin_has_a_separate_login_table_guard_and_dashboard(): void
    {
        $admin = Admin::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin-password-123'),
        ]);

        $this->get('/admin')->assertRedirect(route('admin.login'));
        $this->get(route('admin.login'))
            ->assertOk()
            ->assertSee('action="'.route('admin.login.store').'"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="password"', false);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => $admin->email,
            'password' => 'admin-password-123',
        ])->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->post(route('admin.login.store'), [
            'email' => ' ADMIN@example.com ',
            'password' => 'admin-password-123',
        ])->assertRedirect(route('admin.index'));

        $this->assertAuthenticatedAs($admin, 'admin');
        $this->get('/admin')->assertOk()->assertViewIs('admin.index');
        $this->get(route('admin.dashboard'))->assertRedirect(route('admin.index'));
        $this->assertGuest('web');

        $this->post(route('admin.logout'))->assertRedirect(route('admin.login'));
        $this->assertGuest('admin');
    }
}
