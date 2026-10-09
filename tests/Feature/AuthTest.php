<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_validates_input_creates_user_and_signs_them_in(): void
    {
        $response = $this->post(route('signup.store'), [
            'first_name' => 'Taylor',
            'last_name' => 'Example',
            'email' => '  TAYLOR@example.com ',
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
        $this->assertNull($user->name);
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
        $this->actingAs(User::factory()->create());

        $routes = [
            'user.dashboard',
            'user.water-monitoring',
            'user.chemical-kits.index',
            'user.chemical-kits.create',
            'user.compliance',
            'user.audit-report',
            'user.schedule',
            'user.reports.index',
            'user.reports.view',
            'user.reports.edit',
            'user.site-locations',
            'user.notifications',
            'user.profile',
            'user.settings',
        ];

        foreach ($routes as $route) {
            $this->get(route($route))->assertOk();
        }
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

        $this->post(route('login.store'), [
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
}
