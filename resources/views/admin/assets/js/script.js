/* ============================================
   WATERYZE ADMIN DASHBOARD - JAVASCRIPT
   ============================================ */

// ========== CHART CONFIGURATION & INITIALIZATION ==========

/**
 * Initialize Daily Water Usage Line Chart
 * Shows water usage data for the last 7 days
 */
function initializeDailyUsageChart() {
    const ctx = document.getElementById('dailyUsageChart').getContext('2d');
    
    // Sample data for the chart
    const data = {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Water Usage (Liters)',
            data: [2400, 2210, 2290, 2000, 2181, 2500, 2800],
            borderColor: '#0066cc',
            backgroundColor: 'rgba(0, 102, 204, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointRadius: 5,
            pointBackgroundColor: '#0066cc',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointHoverRadius: 7,
            pointHoverBackgroundColor: '#0088dd',
        }]
    };

    const options = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    font: {
                        family: "'Poppins', sans-serif",
                        size: 14,
                        weight: '500'
                    },
                    color: '#2c3e50',
                    padding: 15,
                    usePointStyle: true
                }
            },
            filler: {
                propagate: true
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 3000,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)',
                    drawBorder: false
                },
                ticks: {
                    font: {
                        family: "'Poppins', sans-serif",
                        size: 12
                    },
                    color: '#7f8c8d',
                    stepSize: 500
                }
            },
            x: {
                grid: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    font: {
                        family: "'Poppins', sans-serif",
                        size: 12
                    },
                    color: '#7f8c8d'
                }
            }
        }
    };

    new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
}

/**
 * Initialize Monthly Comparison Bar Chart
 * Shows water usage comparison across months
 */
function initializeMonthlyComparisonChart() {
    const ctx = document.getElementById('monthlyComparisonChart').getContext('2d');
    
    const data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Usage (1000s L)',
            data: [65, 59, 80, 81, 76, 72],
            backgroundColor: [
                'rgba(0, 102, 204, 0.8)',
                'rgba(0, 136, 221, 0.8)',
                'rgba(0, 188, 212, 0.8)',
                'rgba(0, 150, 136, 0.8)',
                'rgba(0, 188, 212, 0.6)',
                'rgba(0, 102, 204, 0.6)'
            ],
            borderColor: [
                '#0066cc',
                '#0088dd',
                '#00bcd4',
                '#009688',
                '#00bcd4',
                '#0066cc'
            ],
            borderWidth: 0,
            borderRadius: 8,
            borderSkipped: false
        }]
    };

    const options = {
        responsive: true,
        maintainAspectRatio: true,
        indexAxis: 'x',
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)',
                    drawBorder: false
                },
                ticks: {
                    font: {
                        family: "'Poppins', sans-serif",
                        size: 11
                    },
                    color: '#7f8c8d',
                    stepSize: 25
                }
            },
            x: {
                grid: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    font: {
                        family: "'Poppins', sans-serif",
                        size: 11
                    },
                    color: '#7f8c8d'
                }
            }
        }
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
}

// ========== DROPDOWN & MENU TOGGLE FUNCTIONS ==========

/**
 * Toggle notification dropdown
 * Shows/hides the notification menu with animation
 */
function toggleNotificationDropdown() {
    const dropdown = document.getElementById('notificationDropdown');
    dropdown.classList.toggle('active');
    
    // Close profile dropdown if open
    document.getElementById('profileDropdown').classList.remove('active');
}

/**
 * Toggle profile dropdown
 * Shows/hides the profile menu with animation
 */
function toggleProfileDropdown() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('active');
    
    // Close notification dropdown if open
    document.getElementById('notificationDropdown').classList.remove('active');
}

/**
 * Toggle sidebar (mobile view)
 * Opens/closes the sidebar navigation on mobile devices
 */
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
    
    // Close menu when a nav link is clicked
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992) {
                sidebar.classList.remove('active');
            }
        });
    });
}

// ========== EVENT LISTENERS ==========

/**
 * Initialize all event listeners when DOM is loaded
 */
document.addEventListener('DOMContentLoaded', function() {
    // Notification button toggle
    const notificationBtn = document.getElementById('notificationBtn');
    if (notificationBtn) {
        notificationBtn.addEventListener('click', toggleNotificationDropdown);
    }

    // Profile button toggle
    const profileBtn = document.getElementById('profileBtn');
    if (profileBtn) {
        profileBtn.addEventListener('click', toggleProfileDropdown);
    }

    // Menu toggle (mobile)
    const menuToggle = document.getElementById('menuToggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }

    // Sidebar toggle (close button on mobile)
    const sidebarToggle = document.getElementById('sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', toggleSidebar);
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const notificationDropdown = document.getElementById('notificationDropdown');
        const profileDropdown = document.getElementById('profileDropdown');
        const notificationBtn = document.getElementById('notificationBtn');
        const profileBtn = document.getElementById('profileBtn');

        if (notificationBtn && !notificationBtn.contains(event.target) && 
            notificationDropdown && !notificationDropdown.contains(event.target)) {
            notificationDropdown.classList.remove('active');
        }

        if (profileBtn && !profileBtn.contains(event.target) && 
            profileDropdown && !profileDropdown.contains(event.target)) {
            profileDropdown.classList.remove('active');
        }
    });

    // Navigation link active state
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));
            // Add active class to clicked link
            this.classList.add('active');
            
            // Update page title
            const pageTitle = document.getElementById('pageTitle');
            if (pageTitle) {
                const title = this.textContent.trim();
                pageTitle.textContent = title;
            }
        });
    });

    // Initialize charts
    initializeDailyUsageChart();
    initializeMonthlyComparisonChart();

    // Add smooth page scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
});

// ========== UTILITY FUNCTIONS ==========

/**
 * Format numbers with thousand separators
 * @param {number} num - The number to format
 * @returns {string} - Formatted number string
 */
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

/**
 * Update stat card value with animation
 * @param {string} selector - CSS selector for the stat value element
 * @param {number} newValue - The new value to display
 */
function updateStatValue(selector, newValue) {
    const element = document.querySelector(selector);
    if (element) {
        element.style.opacity = '0.5';
        setTimeout(() => {
            element.textContent = formatNumber(newValue);
            element.style.opacity = '1';
        }, 300);
    }
}

/**
 * Add animation class to elements
 * @param {element} element - The DOM element to animate
 * @param {string} animationClass - The animation class name
 */
function animateElement(element, animationClass = 'fadeIn') {
    element.classList.add(animationClass);
    element.addEventListener('animationend', function() {
        element.classList.remove(animationClass);
    }, { once: true });
}

/**
 * Refresh dashboard data (can be connected to backend API)
 * Simulates data refresh with visual feedback
 */
function refreshDashboard() {
    // Show loading state
    const cards = document.querySelectorAll('.stat-card');
    cards.forEach(card => {
        card.style.opacity = '0.6';
    });

    // Simulate API call with timeout
    setTimeout(() => {
        // Restore opacity
        cards.forEach(card => {
            card.style.opacity = '1';
        });
        
        // Show success message (optional)
        console.log('Dashboard data refreshed successfully');
    }, 1000);
}

// ========== RESPONSIVE HANDLER ==========

/**
 * Handle window resize events
 * Adjust layout for different screen sizes
 */
window.addEventListener('resize', function() {
    const sidebar = document.querySelector('.sidebar');
    
    // Close sidebar on larger screens
    if (window.innerWidth >= 992 && sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
    }
});

// ========== KEYBOARD SHORTCUTS ==========

/**
 * Add keyboard shortcuts support
 * - Ctrl/Cmd + / : Toggle sidebar
 * - Esc : Close all dropdowns
 */
document.addEventListener('keydown', function(e) {
    // Close dropdowns on Escape key
    if (e.key === 'Escape') {
        document.getElementById('notificationDropdown')?.classList.remove('active');
        document.getElementById('profileDropdown')?.classList.remove('active');
    }

    // Toggle sidebar on Ctrl+Shift+B (or Cmd+Shift+B on Mac)
    if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'B') {
        e.preventDefault();
        toggleSidebar();
    }
});

// ========== LIVE TIME DISPLAY ==========

/**
 * Update current time in dashboard (optional enhancement)
 * Can be displayed in navbar or elsewhere
 */
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
    
    // Update time display if element exists
    const timeElement = document.getElementById('currentTime');
    if (timeElement) {
        timeElement.textContent = timeString;
    }
}

// Update time every second
setInterval(updateTime, 1000);

// Initial time update
updateTime();

// ========== NOTIFICATION CLICK HANDLERS ==========

/**
 * Mark notification as read
 * @param {element} element - The notification element
 */
function markNotificationAsRead(element) {
    element.classList.remove('unread');
    element.style.opacity = '0.7';
}

/**
 * Mark all notifications as read
 */
function markAllNotificationsAsRead() {
    const unreadNotifications = document.querySelectorAll('.notification-item.unread');
    unreadNotifications.forEach(notification => {
        notification.classList.remove('unread');
    });
    
    // Update badge
    const badge = document.querySelector('.notification-badge');
    if (badge) {
        badge.textContent = '0';
    }
}

// Add click handlers to notification items
document.querySelectorAll('.notification-item').forEach(item => {
    item.addEventListener('click', function() {
        markNotificationAsRead(this);
    });
});

// ========== DATA TABLE INTERACTIONS ==========

/**
 * Add sorting functionality to tables
 * @param {string} columnIndex - The column index to sort by
 */
function sortTable(tableSelector, columnIndex) {
    const table = document.querySelector(tableSelector);
    if (!table) return;

    const rows = Array.from(table.querySelectorAll('tbody tr'));
    const isAscending = table.dataset.sortOrder !== 'asc';

    rows.sort((a, b) => {
        const aValue = a.children[columnIndex].textContent.trim();
        const bValue = b.children[columnIndex].textContent.trim();
        
        // Try to parse as number
        const aNum = parseFloat(aValue);
        const bNum = parseFloat(bValue);

        if (!isNaN(aNum) && !isNaN(bNum)) {
            return isAscending ? aNum - bNum : bNum - aNum;
        }

        // Fall back to string comparison
        return isAscending ? 
            aValue.localeCompare(bValue) : 
            bValue.localeCompare(aValue);
    });

    // Re-append rows in new order
    rows.forEach(row => {
        table.querySelector('tbody').appendChild(row);
    });

    // Update sort order
    table.dataset.sortOrder = isAscending ? 'asc' : 'desc';
}

// ========== PAGE LOAD COMPLETE ==========

window.addEventListener('load', function() {
    // All resources are loaded - add any final initializations here
    console.log('Admin Dashboard loaded successfully');
});
