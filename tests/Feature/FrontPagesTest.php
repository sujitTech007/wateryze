<?php

namespace Tests\Feature;

use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_render_with_the_shared_navigation_and_footer(): void
    {
        $routes = [
            'home',
            'about',
            'service',
            'industry',
            'subscription',
            'contact',
            'terms',
            'login',
            'signup',
        ];

        foreach ($routes as $route) {
            $response = $this->get(route($route));

            $response->assertOk()
                ->assertSee(route('home'), false)
                ->assertSee(route('contact'), false)
                ->assertSee('Wateryze Platform');
        }
    }

    public function test_home_page_displays_active_database_plans_and_purchase_actions(): void
    {
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Choose Your')
            ->assertSee('Plan')
            ->assertSee($plan->name)
            ->assertSee('CAD '.number_format((float) $plan->amount, 2))
            ->assertSee(route('signup', ['plan_id' => $plan->id]), false)
            ->assertSee('Premium water monitoring access');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('home'))
            ->assertOk()
            ->assertSee(route('user.subscription.checkout', $plan), false)
            ->assertSee('Purchase '.$plan->name);
    }
}
