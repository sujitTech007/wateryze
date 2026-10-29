<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(): View
    {
        return view('index');
    }

    public function about(): View
    {
        return view('about');
    }

    public function service(): View
    {
        return view('service');
    }

    public function industry(): View
    {
        return view('industry');
    }

    public function subscription(Request $request): View
    {
        return view('subscription', [
            'plans' => SubscriptionPlan::query()
                ->where('status', 'active')
                ->orderBy('amount')
                ->get(),
            'selectedPlanId' => $request->integer('plan_id'),
        ]);
    }

    public function contact(): View
    {
        return view('contact');
    }

    public function terms(): View
    {
        return view('terms-condition');
    }
}
