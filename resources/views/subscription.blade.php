@include('include.header')

<section class="page-title centred">
    <div class="page-title-bg"><img src="{{ asset('public/front/images/water_bg.jpg') }}" alt=""></div>
    <div class="auto-container">
        <div class="content-box">
            <h3>Subscription plans</h3>
        </div>
    </div>
    <div class="page-title-wave"><img src="{{ asset('public/front/images/wave.png') }}" alt="wave"></div>
</section>

<section class="pricing-section bg-white">
    <div class="auto-container">
        <!-- Top Heading -->
        <div class="pricing-header">
            <div class="pricing-tag">
                SIMPLE <span>•</span> FLEXIBLE <span>•</span> POWERFUL
            </div>

            <h1>Choose Your <span>Plan</span></h1>

            <p>Plans are billed in CAD. No tax is calculated or added at checkout.</p>
        </div>

        @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
        @endif

        <!-- Pricing Cards -->
        <div class="pricing-wrapper">
            @forelse ($plans as $plan)
            <article class="pricing-card {{ $plan->name === 'Premium' ? 'popular' : '' }}">
                @if ($plan->name === 'Premium')
                <div class="popular-badge py-1">★ &nbsp; PREMIUM</div>
                @endif
                <div class="d-flex justify-content-start align-items-center gap-3 mb-2">
                    <div class="plan-icon mb-0">
                        <img src="{{ asset('public/front/images/bottle_2.png') }}" alt="">
                    </div>
                    <h2 class="mb-0">{{ $plan->name }}</h2>
                </div>
                @if ($plan->description)
                <p class="fs-14">{{ $plan->description }}</p>
                @endif
                <div class="price mt-3">
                    <strong>CAD {{ number_format((float) $plan->amount, 2) }}</strong>
                    <span>/ {{ $plan->billing_cycle === 'yearly' ? 'year' : ($plan->billing_cycle === 'quarterly' ? 'quarter' : 'month') }}</span>
                </div>

                <ul class="pricing-list">
                    @foreach ($plan->features ?? [] as $feature)
                    <li><span class="check">✓</span><span>{{ $feature }}</span></li>
                    @endforeach
                    @if ($plan->water_monitoring_enabled)
                    <li><span class="check">✓</span><span>Premium water monitoring access</span></li>
                    @endif
                </ul>

                @auth
                <form method="POST" action="{{ route('user.subscription.checkout', $plan) }}">
                    @csrf
                    <button class="pricing-btn" type="submit">
                        Purchase {{ $plan->name }}
                        <span>→</span>
                    </button>
                </form>
                @else
                <a href="{{ route('signup', ['plan_id' => $plan->id]) }}" class="pricing-btn">
                    Sign up to purchase
                    <span>→</span>
                </a>
                @endauth
            </article>
            @empty
            <div class="alert alert-info w-100">There are no subscription plans available at this time.</div>
            @endforelse
        </div>
        <p class="text-muted text-center mt-4">
            Payments are processed by Stripe. A subscription is activated only after Stripe confirms payment.
        </p>
    </div>
</section>
@include('include.footer')