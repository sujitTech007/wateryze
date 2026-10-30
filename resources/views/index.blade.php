@include('include.header')

    <!-- main-slider -->
    <section class="hero-section">
        <div class="hero-bg"></div>

        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6 col-md-12">
                    <div class="hero-content">
                        <span class="top-text">~~ Understand the importance of life</span>

                        <h1>
                            Smart Water Treatment <br>
                            Made Simple
                        </h1>

                        <p>
                            Wateryze helps small businesses stay compliant with
                            pre-calibrated chemical kits, real-time monitoring,
                            and expert support—all in one subscription.
                        </p>

                        <div class="hero-buttons">
                            <a href="{{ route('contact') }}" class="btn btn-secondary-custom">GET A FREE CONSULTANT</a>
                        </div>
                    </div>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-lg-6 col-md-12 text-center">
                    <div class="hero-image">
                        <img src="{{ asset('public/front/images/side-img.png') }}" alt="Smart Water">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- main-slider end -->


    <!-- feature-section -->
    <section class="wateryze-features">
        <div class="container">
            <h2 class="section-title text-center">
                Your All-in-One Wateryze Partner
            </h2>

            <div class="row feature-row">

                <div class="col-lg-3 col-md-3 feature-item">
                    <div class="icon">
                        <img src="{{ asset('public/front/images//vector-1.png') }}" alt="">
                    </div>
                    <h4>Pre-Calibrated Kits</h4>
                    <p>
                       Our industry-specific chemical kits are pre-formulated and pre-measured, making water treatment  effective.
                    </p>
                    <a href="{{ route('service') }}">Know More</a>
                </div>

                <div class="col-lg-3 col-md-3 feature-item ">
                    <div class="icon">
                        <img src="{{ asset('public/front/images/vector_2.png') }}" alt="">
                    </div>
                    <h4>Smart Monitoring</h4>
                    <p>
                        With our real-time sensor integration, you can monitor water quality and system performance
                        24/7.
                    </p>
                    <a href="{{ route('service') }}">Know More</a>
                </div>

                <div class="col-lg-3 col-md-3 feature-item ">
                    <div class="icon">
                        <img src="{{ asset('public/front/images/vector-3.png') }}" alt="">
                    </div>
                    <h4>Auto Compliance Reporting</h4>
                    <p>
                        Our automated compliance reporting keeps you audit-ready at all times. Reports are generated.
                    </p>
                    <a href="{{ route('service') }}">Know More</a>
                </div>

                <div class="col-lg-3 col-md-3 feature-item ">
                    <div class="icon">
                        <img src="{{ asset('public/front/images/container.png') }}" alt="">
                    </div>
                    <h4>Expert Support</h4>
                    <p>
                        That’s why our platform connects you to on-demand experts and certified technicians.
                    </p>
                    <a href="{{ route('service') }}">Know More</a>
                </div>

            </div>
        </div>
    </section>
    <!-- feature-section end -->


    <!-- delivery-section -->
     <section class="pricing-section">
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
    <!-- delivery-section end -->



    <!-- video-section -->
    <section class="video-section">
        <div class="auto-container">
            <div class="upper-content">
                <div id="video_block_one">
                    <div class="video-inner">
                        <div class="video-box wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms"
                            style="background-image: url(public/front/images/video-img-01.png);">
                            <div class="video-btn">
                                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image"
                                    data-caption=""><i class="fa fa-play-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-title clearfix">
                    <div class="title-inner">
                        <div class="sec-title">
                            <h1>Helping To Improve</h1>
                        </div>
                    </div>
                    <div class="text-inner">
                        <div class="text">We empower small businesses to manage water treatment with ease, ensuring
                            cleaner water discharge, extended equipment life, and verified compliance.</div>
                    </div>
                </div>
            </div>
            <div class="lower-content">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                        <figure class="image-box wow flipInY" data-wow-delay="00ms" data-wow-duration="1500ms"><a
                                href="{{ asset('public/front/images/video-img-3.png') }}" class="lightbox-image" data-fancybox="gallery"><img
                                    src="{{ asset('public/front/images/video-img-3.png') }}" alt=""></a></figure>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                        <figure class="image-box wow flipInY" data-wow-delay="300ms" data-wow-duration="1500ms"><a
                                href="{{ asset('public/front/images/video_2.jpg') }}" class="lightbox-image" data-fancybox="gallery"><img
                                    src="{{ asset('public/front/images/video_1.jpg') }}" alt=""></a></figure>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                        <figure class="image-box wow flipInY" data-wow-delay="600ms" data-wow-duration="1500ms"><a
                                href="{{ asset('public/front/images/video_3.jpg') }}" class="lightbox-image" data-fancybox="gallery"><img
                                    src="{{ asset('public/front/images/video_3.jpg') }}" alt=""></a></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video-section end -->


    <!-- composition-section -->
    <section class="composition-section bg-color-1">
        <div class="border-shap">
            <div class="border-1" style="background-image: url({{ asset('public/front/images/border-1.png') }});"></div>
            <div class="border-2" style="background-image: url({{ asset('public/front/images/border-2.png') }});"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center">
                <h1>Why Choose Our Platform?</h1>
            </div>
            <div class="upper-content">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 left-column">
                        <div class="inner-box">
                            <div class="single-item wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <figure class="icon-box">

                                    <img src="{{ asset('public/front/images/water_drop_1.png') }}" alt="">
                                </figure>
                                <h3>Avoid regulatory fines</h3>

                                <div class="text">Our platform ensures you’re always inspection-ready with automated
                                    reports and accurate chemical...</div>
                            </div>
                            <div class="single-item wow slideInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <figure class="icon-box">

                                    <img src="{{ asset('public/front/images/water_drop_1.png') }}" alt="">
                                </figure>
                                <h3>Reduce chemical <br>waste & impact</h3>

                                <div class="text">Our pre-calibrated kits are tailored to your water quality and
                                    industry needs...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <div class="pattern-bg" style="background-image: url({{ asset('public/front/images/icons/pattern-2.png') }});"></div>
                            <figure class="image wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><img
                                    src="{{ asset('public/front/images/water_glass_1.png') }}" alt="" style="width: 215px; margin-bottom: 20px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 right-column">
                        <div class="inner-box">
                            <div class="single-item wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <figure class="icon-box">

                                    <img src="{{ asset('public/front/images/water_drop_1.png') }}" alt="">
                                </figure>
                                <h3>Save time with automated reporting</h3>

                                <div class="text">Our system automatically collects data from your sensors, generates
                                    compliance reports...</div>
                            </div>
                            <div class="single-item wow slideInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <figure class="icon-box">

                                    <img src="{{ asset('public/front/images/water_drop_1.png') }}" alt="">
                                </figure>
                                <h3>Affordable subscription model</h3>

                                <div class="text">Our model replaces that with a low-cost, predictable monthly
                                    subscription...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- composition-section end -->


    <!-- info-section -->
  <!-- Wastewater Compliance Section -->
<section class="wz-compliance-section">

    <div class="container-fluid p-0">
        <div class="row g-0 align-items-stretch">

            <!-- LEFT IMAGE -->
            <div class="col-lg-6 wz-compliance-image">
                <img src="{{ asset('public/front/images/side-img-02.png') }}"
                     alt="Wastewater Compliance"
                     class="img-fluid">
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-6 wz-compliance-content">

                <div class="wz-compliance-inner">

                    <h3 class="wz-compliance-title">
                        Wastewater Compliance
                        <br>
                        Made Simple
                    </h3>

                    <p class="wz-compliance-description">
                        With our subscription-based kits, monitoring tools,
                        and expert support, small businesses can achieve
                        stress-free compliance without large investments.
                    </p>

                    <!-- FEATURES -->
                    <ul class="wz-compliance-features list-unstyled">

                        <li>
                            <span class="wz-check">✓</span>
                            <span>Tailored to your industry &amp; water profile</span>
                        </li>

                        <li>
                            <span class="wz-check">✓</span>
                            <span>Real-time sensors &amp; dashboards</span>
                        </li>

                        <li>
                            <span class="wz-check">✓</span>
                            <span>Automated compliance logs for inspections</span>
                        </li>

                        <li>
                            <span class="wz-check">✓</span>
                            <span>Expert guidance whenever you need it</span>
                        </li>

                    </ul>

                    <!-- BUTTONS -->
                    <div class="wz-compliance-buttons d-flex flex-wrap gap-3"style="gap: 10px;">

                        <a href="{{ route('contact') }}"
                           class="wz-btn wz-btn-primary">
                            GET STARTED TODAY
                            <span>→</span>
                        </a>

                        <a href="{{ route('contact') }}"
                           class="wz-btn wz-btn-outline">
                            REQUEST FOR ESTIMATE
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</section>
    <!-- info-section end -->


    <!-- testimonial-section  -->
    <section class="testimonial-section">
        <div class="auto-container">
            <div class="top-title clearfix">
                <div class="title-inner">
                    <div class="sec-title">
                        <h1>Our Testimonials</h1>
                    </div>
                </div>
                <div class="text-inner">
                    <div class="text">Hear from our satisfied customers who have transformed their water treatment processes with Wateryze.</div>
                </div>
            </div>
            <div class="inner-content">
                <div class="client-testimonial-carousel owl-carousel owl-theme owl-dots-none">
                    <div class="testimonial-content">
                        <div class="inner-box">
                            <div class="text">"Wateryze has transformed our spa's water treatment process. The
                                pre-calibrated kits make compliance effortless, and we've saved thousands on potential
                                fines. Highly recommended!"</div>
                            <div class="author-info">
                                <h5 class="name">Sarah Mitchell</h5>
                                <span class="designation">Spa Owner, Ontario</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="inner-box">
                            <div class="text">"The real-time monitoring and automated reports have been game-changers
                                for our restaurant. We're always inspection-ready and our water quality has never been
                                better."</div>
                            <div class="author-info">
                                <h5 class="name">Mike Chen</h5>
                                <span class="designation">Restaurant Manager, BC</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="inner-box">
                            <div class="text">"As a small manufacturing business, Wateryze's subscription model fits our
                                budget perfectly. The expert support is invaluable when we need guidance."</div>
                            <div class="author-info">
                                <h5 class="name">Jennifer Adams</h5>
                                <span class="designation">Operations Director, Alberta</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Client Thumbs Carousel-->
                <div class="client-thumb-outer">
                    <div class="client-thumbs-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('public/front/images/testimonial_1.png') }}" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('public/front/images/testimonial_2.png') }}" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('public/front/images/testimonial_3.png') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->

    @include('include.footer')
