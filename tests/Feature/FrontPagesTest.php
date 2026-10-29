<?php

namespace Tests\Feature;

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
}
