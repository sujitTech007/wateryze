<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureWaterMonitoringSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()?->hasWaterMonitoringAccess()) {
            return redirect()->route('user.subscription')
                ->withErrors(['subscription' => 'A paid Premium subscription is required to access water monitoring.']);
        }

        return $next($request);
    }
}
