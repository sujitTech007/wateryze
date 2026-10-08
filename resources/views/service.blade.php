@include('include.header')

    <!-- Page Title -->
    <section class="page-title centred">

        <!-- Background Image -->
        <div class="page-title-bg">
            <img src="images/water_bg.jpg" alt="">
        </div>

        <div class="auto-container">
            <div class="content-box">
                <h3>Our Service</h3>
            </div>
        </div>

        <!-- Bottom Wave Image -->
        <div class="page-title-wave">
            <img src="images/wave.png" alt="wave">
        </div>

    </section>
    <!-- End Page Title -->


    <!-- fact-counter -->
    <section class="fact-counter padding_bottom_100">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h3>We Provide Simple & Scalable <br> Compliance Solutions</h3>
                <p>From chemical kits to smart monitoring and automated reporting, our services are designed to help
                    spas, breweries, wineries, and FMCG manufacturers stay compliant, sustainable, and cost-efficient.
                </p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="1000">1,000</span>+
                        </div>
                        <div class="text">Kits Delivered</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="500">500</span>+
                        </div>
                        <div class="text">Businesses Supported</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="12">100</span>+
                        </div>
                        <div class="text">Compliance Audits Automated</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="5">5</span>Steps
                        </div>
                        <div class="text">Filtration plant</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-counter end -->


    <!-- service-section -->
    <section class="service-section bg-color-1">
        <div class="border-shap">
            <div class="border-1" style="background-image: url(images/border-1.png);"></div>
            <div class="border-2" style="background-image: url(images/border-2.png);"></div>
        </div>
        <div class="auto-container">
            <div class="top-title clearfix">
                <div class="title-inner">
                    <div class="sec-title">
                        <h3>What We Do</h3>
                    </div>
                </div>
                <div class="text-inner">
                    <p class="text">We deliver a complete wastewater treatment and compliance solution through
                        tailored kits, smart technology, and expert guidance.</p>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one wow flipInY" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('subscription') }}"><img src="images/service_card_1.jpg" alt=""></a>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('subscription') }}">Smart Chemical Intelligence</a></h3>
                                <p class="text">Our AI-powered engine delivers the right chemical kits for your
                                    business type, usage, and location. </p>

                                <div class="btn-box"><a href="{{ route('subscription') }}">Order Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one wow flipInY" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('subscription') }}"><img src="images/service_card_2.jpg" alt=""></a>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('subscription') }}">Real-Time Compliance & Reporting</a></h3>
                                <p class="text">Wateryze makes compliance simple with automated logs, alerts, and
                                    audit-ready reports.</p>
                                <div class="btn-box"><a href="{{ route('subscription') }}">Order Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one wow flipInY" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('subscription') }}"><img src="images/service_card_6.jpg" alt=""></a>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('subscription') }}">Subscription Chemical Kits</a></h3>
                                <p class="text">Receive pre-mixed, pre-labeled chemical kits every month, customized
                                    for your needs.</p>

                                <div class="btn-box"><a href="{{ route('subscription') }}">Order Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one wow flipInY" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('subscription') }}"><img src="images/service_card_3.jpg" alt=""></a>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('subscription') }}">Technician Access & Marketplace</a></h3>
                                <p class="text">Book certified experts for installation, calibration, and
                                    maintenance—all from your dashboard.</p>

                                <div class="btn-box"><a href="{{ route('subscription') }}">Order Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one wow flipInY" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('subscription') }}"><img src="images/service_card_4.jpg" alt=""></a>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('subscription') }}">Equipment & Sensor Support</a></h3>
                                <p class="text">Plug-and-play IoT sensors and regular equipment checks give you
                                    real-time monitoring and insights.</p>
                                <div class="btn-box"><a href="{{ route('subscription') }}">Order Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one wow flipInY" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('subscription') }}"><img src="images/service_card_5.jpg" alt=""></a>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('subscription') }}">ESG & Sustainability Tracking</a></h3>
                                <p class="text">Generate sustainability reports that support ESG goals and showcase
                                    your commitment to greener operations.</p>

                                <div class="btn-box"><a href="{{ route('subscription') }}">Order Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-section end -->


    <!-- testimonial-section  -->
    <section class="testimonial-section">
        <div class="auto-container">
            <div class="top-title clearfix">
                <div class="title-inner">
                    <div class="sec-title">
                        <h3>Our Testimonials</h3>
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
                            <figure class="thumb-box"><img src="images/testimonial_1.png" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/testimonial_2.png" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/testimonial_3.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- request-section -->
    <section class="request-section bg-color-2">
        <div class="bg-pattern" style="background-image: url(images/pattern-3.png);"></div>
        <div class="auto-container">
            <div class="sec-title text-center">
                <h3 class="text-white">Get Pure & Healthy <br> Drinking Water</h3>
            </div>
            <div class="inner-box">
                <form action="#" method="post" class="request-form">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <label>Choose a Service</label>
                            <div class="select-box">
                                <select class="selectmenu" id="ui-id-1">

                                    <option selected="selected">Commercial Water Services</option>
                                    <option>Water Filtration</option>
                                    <option>Minarel Water Services</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <label>Type of Service</label>
                            <div class="select-box">
                                <select class="selectmenu" id="ui-id-2">
                                    <option selected="selected">Type of Service</option>
                                    <option>Service Type 01</option>
                                    <option>Service Type 02</option>
                                    <option>Service Type 03</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <label>No. of Bottles <span>(Optional)</span></label>
                            <div class="select-box">
                                <select class="selectmenu" id="ui-id-3">
                                    <option selected="selected">No. of Bottles</option>
                                    <option>Bottles 01</option>
                                    <option>Bottles 02</option>
                                    <option>Bottles 03</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" placeholder="Provide full name" required="">
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter valid email address" required="">
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Enter address with zipcode" required="">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <div class="submit-box d-flex align-items-center justify-content-between">
                                <div style="display:flex; align-items:center; gap:10px; font-size:14px; color:#555;">

                                    <label style="display:flex; align-items:center; gap:6px; cursor:pointer; margin:0;">
                                        <input type="checkbox" name="checkbox" style="margin:0; width:10px;">
                                        <span>I agree with</span>
                                    </label>

                                    <a href="{{ route('contact') }}" style="color:#007bff; text-decoration:none; font-weight:500;">
                                        Terms & Conditions
                                    </a>

                                </div>

                                <div class="btn-box pull-right">
                                    <a href="{{ route('contact') }}" class="theme-btn style-two">Get a free quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- request-section end -->
@include('include.footer')