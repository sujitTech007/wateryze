@include('include.header')

    <!-- Page Title -->
    <section class="page-title centred">
      <!-- Background Image -->
      <div class="page-title-bg">
        <img src="images/water_bg.jpg" alt="" />
      </div>

      <div class="auto-container">
        <div class="content-box">
          <h3>Subscription</h3>
        </div>
      </div>

      <!-- Bottom Wave Image -->
      <div class="page-title-wave">
        <img src="images/wave.png" alt="wave" />
      </div>
    </section>
    <!-- End Page Title -->

 
    <section class="pricing-section bg-white">
      <div class="auto-container">
        <!-- Top Heading -->
        <div class="pricing-header">
          <div class="pricing-tag">
            SIMPLE <span>•</span> FLEXIBLE <span>•</span> POWERFUL
          </div>

          <h3>Choose Your <span>Plan</span></h3>

          <p>
            Get the right tools and features to manage your water business
            <br class="d-none d-md-block" />
            smarter, faster and more efficiently.
          </p>

          <!-- Monthly / Yearly -->
          <!-- <div class="pricing-toggle">
                    <button class="active">Monthly</button>
                    <button>Yearly</button>
                </div> -->
        </div>

        <!-- Pricing Cards -->
        <div class="pricing-wrapper">
          <!-- Starter Plan -->
          <div class="pricing-card">
            <div class="plan-icon">
              <img src="images/bottle_2.png" alt="Water" />
            </div>

            <h2>Starter Plan</h2>

            <div class="price">
              <strong>CAD 249</strong>
              <span>/ month</span>
            </div>

            <ul class="pricing-list">
              <li>
                <span class="check">✓</span>
                <span>Chemical kit support</span>
              </li>

              <li>
                <span class="check">✓</span>
                <span>Compliance checklist</span>
              </li>

              <li>
                <span class="check">✓</span>
                <span>Certified service access</span>
              </li>

              <li>
                <span class="check">✓</span>
                <span>Equipment health checklist</span>
              </li>
              <li>
                <span class="check">✓</span>
                <span>Monthly water quality assessment</span>
              </li>
            </ul>

            <a href="{{ route('signup') }}" class="pricing-btn">
              START NOW
              <span>→</span>
            </a>
          </div>

          <!-- Pro Plan -->
          <div class="pricing-card popular">
            <div class="popular-badge">★ &nbsp; MOST POPULAR</div>

            <div class="plan-icon">
              <img src="images/bottle_2.png" alt="Water" />
            </div>

            <h2>Pro Plan</h2>

            <div class="price">
              <strong>CAD 499</strong>
              <span>/ month</span>
            </div>

            <ul class="pricing-list">
              <li>
                <span class="check">✓</span>
                <span>Sensor integration</span>
              </li>

              <li>
                <span class="check">✓</span>
                <span>Water quality monitoring dashboard</span>
              </li>

              <li>
                <span class="check">✓</span>
                <span>Compliance alerts &amp; notifications</span>
              </li>

              <li>
                <span class="check">✓</span>
                <span>ESG audit reports</span>
              </li>

              <li>
                <span class="check">✓</span>
                <span>Multi-site dashboard</span>
              </li>
            </ul>

            <a href="{{ route('signup') }}" class="pricing-btn">
              START NOW
              <span>→</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    
@include('include.footer')