<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wateryze</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="icon" href="../images/favicon.png" type="image/x-icon" />

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="wrapper">
        <!-- ========== SIDEBAR START ========== -->
        <nav class="sidebar">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-wrapper">
                    <a href="index.html" class="logo-link">
                        <img src="assets/images/logo.png" alt="Wateryze Logo" class="logo-img" />
                    </a>
                </div>
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.html" class="nav-link active">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="water-monitoring.html" class="nav-link">
                        <i class="fas fa-tint"></i>
                        <span>Water Monitoring</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./chemical-kits/Chemical-Kit-Usage.html" class="nav-link">
                        <i class="fas fa-flask"></i>
                        <span>Chemical Kit Usage</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="compliance.html" class="nav-link">
                        <i class="fas fa-shield-alt"></i>
                        <span>Compliance </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="schedule.html" class="nav-link">
                        <i class="fas fa-clock"></i>
                        <span>Schedule Reminder</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./report/reports.html" class="nav-link">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="site-location.html" class="nav-link">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Sites & Locations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="notifications.html" class="nav-link">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="settings.html" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- ========== SIDEBAR END ========== -->

        <!-- ========== MAIN CONTENT START ========== -->
        <div class="main-content">
            <!-- ========== TOP NAVBAR START ========== -->
            <nav class="navbar justify-content-end">
                <div class="navbar-right">
                    <!-- Admin Profile Dropdown -->
                    <div class="nav-item profile-wrapper">
                        <button class="nav-link profile-btn" id="profileBtn">
                            <img src="assets/images/profile-icon.png" alt="William" class="profile-avatar" />
                            <span class="profile-name d-none d-sm-inline">William</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <!-- Profile Dropdown Menu -->
                        <div class="profile-dropdown" id="profileDropdown">
                            <a href="profile.html" class="dropdown-item">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                            <a href="settings.html" class="dropdown-item">
                                <i class="fas fa-lock"></i> Change Password
                            </a>
                            <hr class="dropdown-divider" />
                            <a href="login.html" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ========== TOP NAVBAR END ========== -->

            <!-- ========== DASHBOARD CONTENT START ========== -->
            <div class="content-area">

                <!-- ================= DASHBOARD HEADER ================= -->
                <div class="d-flex flex-column flex-md-row
                justify-content-between align-items-md-center
                gap-3 mb-4">

                    <div>
                        <small class="text-secondary">
                            Wastewater Management
                        </small>

                        <h5 class="mb-1 mt-1">
                            Welcome back William!
                        </h5>

                        <small class="text-secondary">
                            Overview of your wastewater treatment system.
                        </small>
                    </div>

                    <div class="d-flex gap-2">

                        <!-- <div class="input-group input-group-sm">
                <span class="input-group-text bg-white">
                    <i class="fas fa-search text-secondary"></i>
                </span>

                <input type="text"
                       class="form-control"
                       placeholder="Search">
            </div> -->

                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-sync-alt me-1"></i>
                            Refresh
                        </button>

                    </div>

                </div>


                <!-- ================= SYSTEM STATUS ================= -->
                <div class="alert alert-primary
                d-flex flex-column flex-sm-row
                justify-content-between
                align-items-sm-center
                gap-2 mb-4">

                    <div class="d-flex align-items-center">

                        <i class="fas fa-satellite-dish me-3"></i>

                        <div>
                            <small class="d-block">
                                Live Monitoring Active
                            </small>

                            <small>
                                Your treatment system is being monitored
                                in real time.
                            </small>
                        </div>

                    </div>

                    <span class="badge bg-success">
                        <i class="fas fa-circle me-1" style="font-size:6px;"></i>
                        All Sensors Online
                    </span>

                </div>


                <!-- ================= MAIN DASHBOARD CARDS ================= -->
                <div class="row g-3 mb-4"> <!-- CHEMICAL USAGE -->
                    <div class="col-md-4">
                        <div class="card shadow h-100 bg-warning-subtle border border-warning-subtle rounded-3">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div> <small class="text-secondary"> Chemical Usage </small>
                                        <h6 class="mb-0 mt-1"> Usage Tracker </h6>
                                    </div>
                                    <div class="bg-warning text-white rounded p-2"> <i class="fas fa-flask"></i> </div>
                                </div>
                                <div class="d-flex justify-content-between mb-2"> <small class="text-secondary"> Current
                                        usage </small> <small> 68% </small> </div>
                                <div class="progress" style="height:6px;">
                                    <div class="progress-bar bg-primary" style="width:68%;"> </div>
                                </div> <small class="text-primary d-block mt-2"> Usage tracking active </small>
                            </div>
                        </div>
                    </div> <!-- COMPLIANCE -->
                    <div class="col-md-4">
                        <div class="card shadow h-100 bg-success-subtle border border-success-subtle rounded-3">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div> <small class="text-secondary"> Compliance </small>
                                        <h6 class="mb-0 mt-1"> Compliance Checklist </h6>
                                    </div>
                                    <div class="bg-success text-white rounded p-2"> <i
                                            class="fas fa-clipboard-check"></i> </div>
                                </div>
                                <div class="d-flex justify-content-between mb-2"> <small class="text-secondary">
                                        Completed </small> <small> 8 / 10 </small> </div>
                                <div class="progress" style="height:6px;">
                                    <div class="progress-bar bg-success" style="width:80%;"> </div>
                                </div> <small class="text-success d-block mt-2"> 80% completed </small>
                            </div>
                        </div>
                    </div> <!-- SENSOR DATA -->
                    <div class="col-md-4">
                        <div class="card shadow h-100 bg-primary-subtle border border-primary-subtle rounded-3">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div> <small class="text-secondary"> Sensor Data </small>
                                        <h6 class="mb-0 mt-1"> Monitoring Status </h6>
                                    </div>
                                    <div class="bg-primary text-white rounded p-2"> <i class="fas fa-microchip"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-2"> <span
                                        class="bg-success rounded-circle" style="width:8px;height:8px;"> </span> <small>
                                        Connected </small> </div> <small class="text-secondary"> Sensor data integration
                                    is active. </small>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ================= WATER QUALITY ================= -->
                <div class="card border-0 shadow mb-4">

                    <div class="card-body p-3">

                        <div class="d-flex flex-column flex-md-row
                        justify-content-between
                        align-items-md-center
                        gap-2 mb-3">

                            <div>

                                <small class="text-secondary">
                                    Live Monitoring
                                </small>

                                <h6 class="mb-1 mt-1">
                                    Water Quality
                                </h6>

                                <small class="text-secondary">
                                    Current wastewater treatment readings.
                                </small>

                            </div>

                            <span class="badge bg-success">
                                Live
                            </span>

                        </div>


                        <!-- READINGS -->
                        <div class="row g-2"> <!-- PH -->
                            <div class="col-6 col-md-3">
                                <div class="border border-primary-subtle bg-primary-subtle rounded p-3 shadow">
                                    <small class="text-secondary d-block"> pH Level </small>
                                    <h6 class="mt-1 mb-1"> 7.1 </h6> <small class="text-primary"> Normal </small>
                                </div>
                            </div> <!-- TDS -->
                            <div class="col-6 col-md-3">
                                <div class="border border-info-subtle bg-info-subtle rounded p-3 shadow"> <small
                                        class="text-secondary d-block"> TDS </small>
                                    <h6 class="mt-1 mb-1"> 480 ppm </h6> <small class="text-info"> Normal </small>
                                </div>
                            </div> <!-- COD -->
                            <div class="col-6 col-md-3">
                                <div class="border border-warning-subtle bg-warning-subtle rounded p-3 shadow">
                                    <small class="text-secondary d-block"> COD </small>
                                    <h6 class="mt-1 mb-1"> 320 mg/L </h6> <small class="text-warning"> Within range
                                    </small>
                                </div>
                            </div> <!-- BOD -->
                            <div class="col-6 col-md-3">
                                <div class="border border-success-subtle bg-success-subtle rounded p-3 shadow">
                                    <small class="text-secondary d-block"> BOD </small>
                                    <h6 class="mt-1 mb-1"> 140 mg/L </h6> <small class="text-success"> Within range
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- ================= TREND + SENSOR STATUS ================= -->
                <div class="row g-3 mb-4">

                    <!-- CHART -->
                    <div class="col-lg-8">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body p-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-3">

                                    <div>

                                        <small class="text-secondary">
                                            Monitoring
                                        </small>

                                        <h6 class="mb-1 mt-1">
                                            Water Quality Trend
                                        </h6>

                                        <small class="text-secondary">
                                            Recent sensor readings
                                        </small>

                                    </div>

                                    <select class="form-select form-select-sm" style="width:120px;">

                                        <option>Today</option>
                                        <option>7 Days</option>
                                        <option>30 Days</option>

                                    </select>

                                </div>

                                <div style="height:260px;">

                                    <canvas id="waterQualityChart"></canvas>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- SENSOR STATUS -->
                    <div class="col-lg-4">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body p-3">

                                <div class="mb-3">

                                    <small class="text-secondary">
                                        Sensor Integration
                                    </small>

                                    <h6 class="mb-1 mt-1">
                                        Sensor Status
                                    </h6>

                                </div>


                                <!-- SENSOR -->
                                <div class="d-flex justify-content-between
                                align-items-center
                                border-bottom py-2 mb-2">

                                    <div>

                                        <small class="d-block">
                                            pH Sensor
                                        </small>

                                        <small class="text-secondary">
                                            Updated now
                                        </small>

                                    </div>

                                    <span class="badge bg-success">
                                        Online
                                    </span>

                                </div>


                                <!-- SENSOR -->
                                <div class="d-flex justify-content-between
                                align-items-center
                                border-bottom py-2 mb-2">

                                    <div>

                                        <small class="d-block">
                                            TDS Sensor
                                        </small>

                                        <small class="text-secondary">
                                            Updated now
                                        </small>

                                    </div>

                                    <span class="badge bg-success">
                                        Online
                                    </span>

                                </div>


                                <!-- SENSOR -->
                                <div class="d-flex justify-content-between
                                align-items-center
                                border-bottom py-2 mb-2">

                                    <div>

                                        <small class="d-block">
                                            Turbidity Sensor
                                        </small>

                                        <small class="text-secondary">
                                            Updated 2 min ago
                                        </small>

                                    </div>

                                    <span class="badge bg-warning text-dark">
                                        Check
                                    </span>

                                </div>


                                <!-- SENSOR -->
                                <div class="d-flex justify-content-between
                                align-items-center">

                                    <div>

                                        <small class="d-block">
                                            ORP Sensor
                                        </small>

                                        <small class="text-secondary">
                                            Updated now
                                        </small>

                                    </div>

                                    <span class="badge bg-success">
                                        Online
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================= COMPLIANCE + ALERTS ================= -->
                <div class="row g-3">

                    <!-- COMPLIANCE -->
                    <div class="col-lg-7">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body p-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-3">

                                    <div>

                                        <small class="text-secondary">
                                            Compliance
                                        </small>

                                        <h6 class="mb-1 mt-1">
                                            Compliance Checklist
                                        </h6>

                                    </div>

                                    <a href="compliance.html" class="small text-primary
                                  text-decoration-none">

                                        View All

                                    </a>

                                </div>


                                <!-- ITEM -->
                                <div class="d-flex align-items-center
                                gap-3 border-bottom pb-2 mb-2">

                                    <i class="fas fa-check-circle
                                  text-success"></i>

                                    <div class="flex-grow-1">

                                        <small class="d-block">
                                            Chemical usage record
                                        </small>

                                        <small class="text-secondary">
                                            Record available
                                        </small>

                                    </div>

                                    <span class="badge bg-success">
                                        Done
                                    </span>

                                </div>


                                <!-- ITEM -->
                                <div class="d-flex align-items-center
                                gap-3 border-bottom pb-2 mb-2">

                                    <i class="fas fa-check-circle
                                  text-success"></i>

                                    <div class="flex-grow-1">

                                        <small class="d-block">
                                            Sensor monitoring
                                        </small>

                                        <small class="text-secondary">
                                            Sensor data available
                                        </small>

                                    </div>

                                    <span class="badge bg-success">
                                        Done
                                    </span>

                                </div>


                                <!-- ITEM -->
                                <div class="d-flex align-items-center
                                gap-3">

                                    <i class="fas fa-clock text-warning"></i>

                                    <div class="flex-grow-1">

                                        <small class="d-block">
                                            Compliance log review
                                        </small>

                                        <small class="text-secondary">
                                            Review latest record
                                        </small>

                                    </div>

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ALERTS -->
                    <div class="col-lg-5">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body p-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-3">

                                    <div>

                                        <small class="text-secondary">
                                            Notifications
                                        </small>

                                        <h6 class="mb-1 mt-1">
                                            System Alerts
                                        </h6>

                                    </div>

                                    <i class="fas fa-bell text-primary"></i>

                                </div>


                                <div class="alert alert-warning py-2">

                                    <div class="d-flex gap-2">

                                        <i class="fas fa-triangle-exclamation
                                      mt-1"></i>

                                        <div>

                                            <small class="d-block">
                                                Turbidity requires attention.
                                            </small>

                                            <small>
                                                Current reading: 12 NTU.
                                            </small>

                                        </div>

                                    </div>

                                </div>


                                <div class="alert alert-success py-2 mb-0">

                                    <div class="d-flex gap-2">

                                        <i class="fas fa-check-circle
                                      mt-1"></i>

                                        <div>

                                            <small class="d-block">
                                                Chemical usage is normal.
                                            </small>

                                            <small>
                                                No action required.
                                            </small>

                                        </div>

                                    </div>

                                </div>

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

            if (!canvas) return;

            new Chart(canvas, {
                type: "line",

                data: {
                    labels: [
                        "6 AM",
                        "8 AM",
                        "10 AM",
                        "12 PM",
                        "2 PM",
                        "4 PM"
                    ],

                    datasets: [
                        {
                            label: "Water Quality",
                            data: [82, 86, 84, 89, 92, 90],
                            borderWidth: 2,
                            tension: 0.4,
                            pointRadius: 3,
                            fill: false
                        }
                    ]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        legend: {
                            display: false
                        }
                    },

                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },

                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

        });
    </script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>

</html>