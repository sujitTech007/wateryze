<?php

namespace App\Http\Controllers;

use App\Services\StripeCheckoutService;
use App\Services\SubscriptionPaymentProcessor;
use Illuminate\Http\Request;

class StripeWebhookController extends Controller
{
    public function __invoke(
        Request $request,
        StripeCheckoutService $stripe,
        SubscriptionPaymentProcessor $processor,
    ) {
        $event = $stripe->verifyWebhook(
            $request->getContent(),
            $request->header('Stripe-Signature'),
        );
        $processor->handleWebhook($event);

        return response()->json(['received' => true]);
    }
}
