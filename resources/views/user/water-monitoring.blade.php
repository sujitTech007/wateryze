@include('user.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
            <div class="content-area">

                <!-- PAGE HEADER -->
                <div class="d-flex flex-column flex-lg-row
                justify-content-between
                align-items-lg-center
                gap-3
                mb-4">

                    <div>

                        <h2 class="mb-1 fs-4">
                            Water Monitoring
                        </h2>

                        <p class="text-muted mb-0">
                            Monitor your wastewater treatment system in real time.
                        </p>

                    </div>


                    <div class="d-flex align-items-center gap-3">

                        <div class="d-flex align-items-center gap-2 text-muted">

                            <i class="fas fa-calendar"></i>

                            <span>Today</span>

                        </div>


                        <button type="button" class="btn btn-primary btn-sm">

                            <i class="fas fa-sync-alt me-2"></i>
                            Refresh Data

                        </button>

                    </div>

                </div>


                <!-- LIVE MONITORING STATUS -->
                <div class="alert alert-primary
                d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-3
                mb-4">

                    <div class="d-flex align-items-center">

                        <div class="fs-3 me-3">

                            <i class="fas fa-satellite-dish"></i>

                        </div>


                        <div>

                            <h6 class="mb-1">
                                Live Monitoring Active
                            </h6>

                            <p class="mb-0">

                                Your wastewater treatment system is currently connected
                                and sending real-time sensor data.

                            </p>

                        </div>

                    </div>


                    <span class="badge bg-success px-3 py-2">

                        <i class="fas fa-circle me-2"></i>

                        All Sensors Online

                    </span>

                </div>



                <!-- PRIMARY SENSOR READINGS -->
                <div class="row g-4 mb-4"> <!-- PH -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-primary-subtle border border-primary-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> pH Level </p>
                                    <h2 class="mb-0 fs-1"> 7.1 </h2>
                                </div> <i class="fas fa-tint text-primary fs-2"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center"> <span
                                    class="badge bg-success" style="font-size: 10px;"> Normal </span> <small
                                    class="text-muted" style="font-size: 10px;"> Updated now </small> </div>
                        </div>
                    </div> <!-- TDS -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-info-subtle border border-info-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> TDS </p>
                                    <h2 class="mb-0 fs-1"> 480 <small class="fs-6 text-muted">ppm</small> </h2>
                                </div> <i class="fas fa-water text-info fs-2"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center"> <span
                                    class="badge bg-success" style="font-size: 10px;"> Normal </span> <small
                                    class="text-muted" style="font-size: 10px;"> Updated now </small> </div>
                        </div>
                    </div> <!-- TURBIDITY -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-warning-subtle border border-warning-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> Turbidity </p>
                                    <h2 class="mb-0 fs-1"> 12 <small class="fs-6 text-muted">NTU</small> </h2>
                                </div> <i class="fas fa-exclamation-triangle text-warning fs-2"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center"> <span
                                    class="badge bg-warning text-dark" style="font-size: 10px;"> Attention </span>
                                <small class="text-muted" style="font-size: 10px;"> Updated now </small>
                            </div>
                        </div>
                    </div> <!-- ORP -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-success-subtle border border-success-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> ORP </p>
                                    <h2 class="mb-0 fs-1"> 670 <small class="fs-6 text-muted">mV</small> </h2>
                                </div> <i class="fas fa-chart-line text-success fs-2"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center"> <span
                                    class="badge bg-success" style="font-size: 10px;"> Normal </span> <small
                                    class="text-muted" style="font-size: 10px;"> Updated now </small> </div>
                        </div>
                    </div>
                </div>



                <!-- SECONDARY READINGS -->
                <div class="row g-4 mb-4"> <!-- COD -->
                    <div class="col-md-6">
                        <div class="chart-card bg-primary-subtle border border-primary-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> COD </p>
                                    <h2 class="mb-2 fs-1"> 320 <small class="fs-6 text-muted"> mg/L </small> </h2> <span
                                        class="text-primary" style="font-size: 10px;"> <i
                                            class="fas fa-arrow-down me-2"></i> Within acceptable range </span>
                                </div> <i class="fas fa-flask text-primary fs-1"></i>
                            </div>
                        </div>
                    </div> <!-- BOD -->
                    <div class="col-md-6">
                        <div class="chart-card bg-success-subtle border border-success-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> BOD </p>
                                    <h2 class="mb-2 fs-1"> 140 <small class="fs-6 text-muted"> mg/L </small> </h2> <span
                                        class="text-success" style="font-size: 10px;"> <i
                                            class="fas fa-check-circle me-2"></i> Within acceptable range </span>
                                </div> <i class="fas fa-leaf text-success fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- CHART AND SENSOR STATUS -->
                <div class="row g-4 mb-4">


                    <!-- WATER QUALITY CHART -->
                    <div class="col-lg-8">

                        <div class="chart-card h-100">

                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            mb-4">

                                <div>

                                    <h4 class="mb-1">
                                        Water Quality Trend
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Real-time sensor readings throughout the day
                                    </p>

                                </div>


                                <select class="form-select w-auto">

                                    <option selected>
                                        Today
                                    </option>

                                    <option>
                                        Last 7 Days
                                    </option>

                                    <option>
                                        Last 30 Days
                                    </option>

                                </select>

                            </div>


                            <!-- CHART -->
                            <div style="height: 300px;">

                                <canvas id="waterQualityChart"></canvas>

                            </div>

                        </div>

                    </div>



                    <!-- SENSOR STATUS -->
                    <div class="col-lg-4">

                        <div class="chart-card h-100">

                            <div class="mb-4">

                                <h4 class="mb-1">
                                    Sensor Status
                                </h4>

                                <p class="text-muted mb-0">
                                    Connection status
                                </p>

                            </div>



                            <!-- PH SENSOR -->
                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            border-bottom
                            pb-3
                            mb-3">

                                <div>

                                    <h6 class="mb-1">
                                        pH Sensor
                                    </h6>

                                    <small class="text-muted">
                                        Last update: Just now
                                    </small>

                                </div>


                                <span class="badge bg-success">
                                    Online
                                </span>

                            </div>



                            <!-- TDS SENSOR -->
                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            border-bottom
                            pb-3
                            mb-3">

                                <div>

                                    <h6 class="mb-1">
                                        TDS Sensor
                                    </h6>

                                    <small class="text-muted">
                                        Last update: Just now
                                    </small>

                                </div>


                                <span class="badge bg-success">
                                    Online
                                </span>

                            </div>



                            <!-- TURBIDITY SENSOR -->
                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            border-bottom
                            pb-3
                            mb-3">

                                <div>

                                    <h6 class="mb-1">
                                        Turbidity Sensor
                                    </h6>

                                    <small class="text-muted">
                                        Last update: 2 min ago
                                    </small>

                                </div>


                                <span class="badge bg-warning text-dark">
                                    Check
                                </span>

                            </div>



                            <!-- ORP SENSOR -->
                            <div class="d-flex
                            justify-content-between
                            align-items-center">

                                <div>

                                    <h6 class="mb-1">
                                        ORP Sensor
                                    </h6>

                                    <small class="text-muted">
                                        Last update: Just now
                                    </small>

                                </div>


                                <span class="badge bg-success">
                                    Online
                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ALERTS AND ACTIVITY -->
                <div class="row g-4">


                    <!-- ACTIVE ALERT -->
                    <div class="col-lg-6">

                        <div class="chart-card h-100">

                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            mb-4">

                                <div>

                                    <h4 class="mb-1">
                                        Active Alerts
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Parameters requiring attention
                                    </p>

                                </div>


                                <span class="badge bg-danger">
                                    1 Alert
                                </span>

                            </div>


                            <div class="alert alert-warning mb-0">

                                <div class="d-flex">

                                    <i class="fas fa-exclamation-triangle
                                  fs-4
                                  me-3"></i>


                                    <div>

                                        <h6>
                                            Turbidity Above Recommended Level
                                        </h6>

                                        <p class="mb-0">

                                            Current reading is 12 NTU.
                                            Review the filtration and treatment process.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- RECENT ACTIVITY -->
                    <div class="col-lg-6">

                        <div class="chart-card h-100">

                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            mb-4">

                                <div>

                                    <h4 class="mb-1">
                                        Recent Sensor Activity
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Latest readings received
                                    </p>

                                </div>


                                <a href="#">
                                    View All
                                </a>

                            </div>



                            <!-- ACTIVITY 1 -->
                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            border-bottom
                            pb-3
                            mb-3">

                                <div>

                                    <h6 class="mb-1">
                                        pH Reading Updated
                                    </h6>

                                    <small class="text-muted">
                                        pH recorded at 7.1
                                    </small>

                                </div>


                                <small class="text-muted">
                                    Now
                                </small>

                            </div>



                            <!-- ACTIVITY 2 -->
                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            border-bottom
                            pb-3
                            mb-3">

                                <div>

                                    <h6 class="mb-1">
                                        TDS Reading Updated
                                    </h6>

                                    <small class="text-muted">
                                        TDS recorded at 480 ppm
                                    </small>

                                </div>


                                <small class="text-muted">
                                    2 min ago
                                </small>

                            </div>



                            <!-- ACTIVITY 3 -->
                            <div class="d-flex
                            justify-content-between
                            align-items-center">

                                <div>

                                    <h6 class="mb-1">
                                        Turbidity Alert Generated
                                    </h6>

                                    <small class="text-muted">
                                        Reading exceeded configured threshold
                                    </small>

                                </div>


                                <small class="text-muted">
                                    5 min ago
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const canvas = document.getElementById("waterQualityChart");

            if (!canvas) {
                console.error("waterQualityChart canvas not found");
                return;
            }

            new Chart(canvas, {
                type: "line",

                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun"
                    ],

                    datasets: [{
                        label: "Water Quality",
                        data: [82, 86, 84, 89, 92, 90],
                        borderWidth: 2,
                        tension: 0.4,
                        fill: false
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        legend: {
                            display: true
                        }
                    },

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        });
    </script>

  @include('user.include.footer')