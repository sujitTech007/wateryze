// Dashboard JavaScript Functions

// ========== SIDEBAR TOGGLE ==========
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    const body = document.body;

    // Mobile menu toggle
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            body.classList.toggle('sidebar-open');
        });
    }

    // Sidebar close button
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.remove('active');
            body.classList.remove('sidebar-open');
        });
    }

    // Close sidebar when clicking outside
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('active');
            body.classList.remove('sidebar-open');
        }
    });

    // ========== PROFILE DROPDOWN ==========
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.remove('active');
            }
        });
    }

    // ========== ACTIVE NAV LINK ==========
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        }
    });

    // ========== TDS CHART ==========
    const tdsChart = document.getElementById('tdsChart');
    if (tdsChart) {
        const tdsCtx = tdsChart.getContext('2d');
        new Chart(tdsCtx, {
            type: 'line',
            data: {
                labels: ['6 am', '8 am', '10 am', '12 pm', '2 pm', '4 pm', '6 pm'],
                datasets: [
                    {
                        label: 'Current Level',
                        data: [350, 380, 420, 410, 390, 410, 430],
                        borderColor: '#0066cc',
                        backgroundColor: 'rgba(0, 102, 204, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointRadius: 6,
                        pointBackgroundColor: '#0066cc',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        borderWidth: 3
                    },
                    {
                        label: 'Alert Threshold',
                        data: [450, 450, 450, 450, 450, 450, 450],
                        borderColor: '#dc3545',
                        borderDash: [5, 5],
                        fill: false,
                        pointRadius: 0,
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 300,
                        max: 500,
                        grid: {
                            color: '#f0f0f0'
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#999'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#999'
                        }
                    }
                }
            }
        });
    }

    // ========== UPDATE PAGE TITLE ==========
    function updatePageTitle() {
        const currentPath = window.location.pathname;
        const pageTitle = document.getElementById('pageTitle');
        
        if (pageTitle) {
            if (currentPath.includes('schedule')) {
                pageTitle.textContent = 'Schedule Reminder';
            } else if (currentPath.includes('reports')) {
                pageTitle.textContent = 'Reports';
            } else if (currentPath.includes('notifications')) {
                pageTitle.textContent = 'Notifications';
            } else if (currentPath.includes('settings')) {
                pageTitle.textContent = 'Settings';
            } else {
                pageTitle.textContent = 'Dashboard';
            }
        }
    }

    updatePageTitle();
});
