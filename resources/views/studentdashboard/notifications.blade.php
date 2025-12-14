<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - CourseReg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-yellow: #FFD700;
            --dark-yellow: #FFC700;
            --light-yellow: #FFF9E6;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            padding: 20px 0;
            z-index: 1000;
        }
        
        .sidebar-brand {
            padding: 0 20px 20px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }
        
        .sidebar-brand h4 {
            margin: 0;
            color: #333;
            font-weight: bold;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: #666;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--light-yellow);
            color: #333;
            border-left: 4px solid var(--primary-yellow);
        }
        
        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .top-bar {
            background: white;
            padding: 15px 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-yellow {
            background: var(--primary-yellow);
            color: #333;
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-yellow:hover {
            background: var(--dark-yellow);
            transform: translateY(-2px);
        }
        
        .notification-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .notification-tabs {
            border-bottom: 2px solid #eee;
            margin-bottom: 20px;
        }
        
        .notification-tabs .nav-link {
            color: #666;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .notification-tabs .nav-link.active {
            color: #333;
            background: none;
            border-bottom: 3px solid var(--primary-yellow);
        }
        
        .notification-item {
            padding: 20px;
            border-left: 4px solid #dee2e6;
            background: #f8f9fa;
            margin-bottom: 15px;
            border-radius: 5px;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }
        
        .notification-item:hover {
            background: var(--light-yellow);
            border-left-color: var(--primary-yellow);
        }
        
        .notification-item.unread {
            border-left-color: var(--primary-yellow);
            background: white;
        }
        
        .notification-item.unread::after {
            content: '';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 10px;
            height: 10px;
            background: var(--primary-yellow);
            border-radius: 50%;
        }
        
        .notification-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        
        .icon-grade {
            background: #d4edda;
            color: #155724;
        }
        
        .icon-course {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .icon-announcement {
            background: #fff3cd;
            color: #856404;
        }
        
        .icon-reminder {
            background: #f8d7da;
            color: #721c24;
        }
        
        .icon-system {
            background: #e2e3e5;
            color: #383d41;
        }
        
        .notification-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .notification-message {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }
        
        .notification-time {
            font-size: 0.85rem;
            color: #999;
        }
        
        .notification-actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }
        
        .notification-actions button {
            font-size: 0.85rem;
            padding: 5px 15px;
        }
        
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .filter-btn {
            padding: 8px 16px;
            border: 1px solid #dee2e6;
            background: white;
            color: #666;
            border-radius: 20px;
            margin-right: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-yellow);
            border-color: var(--primary-yellow);
            color: #333;
        }
        
        .badge-new {
            background: var(--primary-yellow);
            color: #333;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.3;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class="fas fa-graduation-cap"></i> CourseReg</h4>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('student.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('student.courses') }}"><i class="fas fa-book"></i> My Courses</a></li>
            <li><a href="{{ route('student.browse') }}"><i class="fas fa-search"></i> Browse Courses</a></li>
            <li><a href="{{ route('student.schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
            <li><a href="{{ route('student.grades') }}"><i class="fas fa-chart-line"></i> Grades</a></li>
            <li><a href="{{ route('student.notifications') }}" class="active"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div>
                <h4 class="mb-0"><i class="fas fa-bell"></i> Notifications</h4>
                <small class="text-muted">Stay updated with your academic activities</small>
            </div>
            <div>
                <button class="btn btn-outline-secondary btn-sm me-2" onclick="markAllAsRead()">
                    <i class="fas fa-check-double"></i> Mark All as Read
                </button>
                <a href="{{ route('student.dashboard') }}" class="btn btn-yellow btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <button class="filter-btn active" data-filter="all">All <span class="badge-new">12</span></button>
                            <button class="filter-btn" data-filter="unread">Unread <span class="badge-new">5</span></button>
                            <button class="filter-btn" data-filter="grade">Grades</button>
                            <button class="filter-btn" data-filter="course">Courses</button>
                            <button class="filter-btn" data-filter="announcement">Announcements</button>
                            <button class="filter-btn" data-filter="reminder">Reminders</button>
                        </div>
                        <div>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="sortNotifications(this.value)">
                                <option value="newest">Newest First</option>
                                <option value="oldest">Oldest First</option>
                                <option value="unread">Unread First</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Notifications List -->
                <div class="notification-card">
                    <ul class="nav notification-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#today">Today (5)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#week">This Week (7)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#earlier">Earlier</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Today Tab -->
                        <div id="today" class="tab-pane fade show active">
                            <!-- Notification Item 1 -->
                            <div class="notification-item unread" data-category="grade" data-time="2" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-grade">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Grade Posted: CS 301 - Assignment 3</div>
                                        <div class="notification-message">
                                            Your grade for "Binary Search Tree Implementation" has been posted. Score: 95/100 (A)
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 2 hours ago
                                        </div>
                                        <div class="notification-actions">
                                            <button class="btn btn-sm btn-yellow" onclick="event.stopPropagation(); viewGrade()">View Grade</button>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="event.stopPropagation(); deleteNotification(this)">Dismiss</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 2 -->
                            <div class="notification-item unread" data-category="course" data-time="4" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-course">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">New Material Available: CS 320</div>
                                        <div class="notification-message">
                                            Dr. Emily Rodriguez has uploaded new lecture materials for "Advanced JavaScript Frameworks"
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 4 hours ago
                                        </div>
                                        <div class="notification-actions">
                                            <button class="btn btn-sm btn-yellow" onclick="event.stopPropagation(); viewMaterial()">View Materials</button>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="event.stopPropagation(); deleteNotification(this)">Dismiss</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 3 -->
                            <div class="notification-item unread" data-category="announcement" data-time="5" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-announcement">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Important Announcement: Spring 2026 Registration</div>
                                        <div class="notification-message">
                                            Spring 2026 course registration begins December 1st. Priority registration for seniors starts at 8:00 AM.
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 5 hours ago
                                        </div>
                                        <div class="notification-actions">
                                            <a href="{{ route('student.browse') }}" class="btn btn-sm btn-yellow" onclick="event.stopPropagation();">Browse Courses</a>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="event.stopPropagation(); deleteNotification(this)">Dismiss</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 4 -->
                            <div class="notification-item" data-category="reminder" data-time="6" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-reminder">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Assignment Due Soon: SQL Query Project</div>
                                        <div class="notification-message">
                                            Your CS 305 assignment "SQL Query Project" is due in 3 days (November 25, 2025 at 11:59 PM)
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 6 hours ago
                                        </div>
                                        <div class="notification-actions">
                                            <button class="btn btn-sm btn-yellow" onclick="event.stopPropagation(); viewAssignment()">View Assignment</button>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="event.stopPropagation(); deleteNotification(this)">Dismiss</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 5 -->
                            <div class="notification-item unread" data-category="course" data-time="8" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-course">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Schedule Change: CS 305</div>
                                        <div class="notification-message">
                                            The December 3rd class has been moved to Lab 402 due to room maintenance. Time remains unchanged.
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 8 hours ago
                                        </div>
                                        <div class="notification-actions">
                                            <a href="{{ route('student.schedule') }}" class="btn btn-sm btn-yellow" onclick="event.stopPropagation();">View Schedule</a>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="event.stopPropagation(); deleteNotification(this)">Dismiss</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- This Week Tab -->
                        <div id="week" class="tab-pane fade">
                            <!-- Notification Item 6 -->
                            <div class="notification-item" data-category="grade" data-time="1440" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-grade">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Midterm Grade Posted: CS 305</div>
                                        <div class="notification-message">
                                            Your midterm exam grade has been posted. Score: 88/100 (B+)
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 1 day ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 7 -->
                            <div class="notification-item" data-category="announcement" data-time="2880" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-announcement">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Library Holiday Hours</div>
                                        <div class="notification-message">
                                            The library will have modified hours during Thanksgiving break (Nov 28-29). Open 9 AM - 5 PM.
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 2 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 8 -->
                            <div class="notification-item unread" data-category="reminder" data-time="3600" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-reminder">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Tuition Payment Due</div>
                                        <div class="notification-message">
                                            Your tuition payment for Spring 2026 is due by December 15, 2025. Balance: $5,400
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 3 days ago
                                        </div>
                                        <div class="notification-actions">
                                            <a href="{{ route('student.tuition') }}" class="btn btn-sm btn-yellow" onclick="event.stopPropagation();">View Tuition</a>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="event.stopPropagation(); deleteNotification(this)">Dismiss</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 9 -->
                            <div class="notification-item" data-category="course" data-time="4320" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-course">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Course Enrollment Confirmed</div>
                                        <div class="notification-message">
                                            You have been successfully enrolled in CS 410 - Software Engineering for Spring 2026
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 4 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 10 -->
                            <div class="notification-item" data-category="system" data-time="5760" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-system">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">System Maintenance Notice</div>
                                        <div class="notification-message">
                                            The registration system will be offline for maintenance on December 1st from 2 AM - 4 AM
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 5 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earlier Tab -->
                        <div id="earlier" class="tab-pane fade">
                            <!-- Notification Item 11 -->
                            <div class="notification-item" data-category="grade" data-time="10080" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-grade">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Semester GPA Updated</div>
                                        <div class="notification-message">
                                            Your Fall 2025 GPA has been calculated: 3.85. Overall GPA: 3.78
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 1 week ago
                                        </div>
                                        <div class="notification-actions">
                                            <a href="{{ route('student.grades') }}" class="btn btn-sm btn-yellow" onclick="event.stopPropagation();">View Grades</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Item 12 -->
                            <div class="notification-item" data-category="announcement" data-time="20160" onclick="markAsRead(this)">
                                <div class="d-flex gap-3">
                                    <div class="notification-icon icon-announcement">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="notification-title">Degree Audit Available</div>
                                        <div class="notification-message">
                                            Your degree audit has been updated. You have completed 75% of your degree requirements.
                                        </div>
                                        <div class="notification-time">
                                            <i class="fas fa-clock"></i> 2 weeks ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="empty-state">
                                <i class="fas fa-check-circle"></i>
                                <p>You've reached the end of your notifications</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mark notification as read
        function markAsRead(element) {
            element.classList.remove('unread');
        }

        // Mark all notifications as read
        function markAllAsRead() {
            const notifications = document.querySelectorAll('.notification-item.unread');
            notifications.forEach(notification => {
                notification.classList.remove('unread');
            });
            
            // Update badge counts
            const unreadBadges = document.querySelectorAll('[data-filter="unread"] .badge-new');
            unreadBadges.forEach(badge => {
                badge.textContent = '0';
            });
            
            alert('All notifications marked as read!');
        }

        // Filter notifications
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active state
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                const notifications = document.querySelectorAll('.notification-item');
                
                notifications.forEach(notification => {
                    if (filter === 'all') {
                        notification.style.display = 'block';
                    } else if (filter === 'unread') {
                        notification.style.display = notification.classList.contains('unread') ? 'block' : 'none';
                    } else {
                        const category = notification.getAttribute('data-category');
                        notification.style.display = category === filter ? 'block' : 'none';
                    }
                });
            });
        });

        // Sort notifications
        function sortNotifications(sortType) {
            const containers = document.querySelectorAll('.tab-pane');
            
            containers.forEach(container => {
                const notifications = Array.from(container.querySelectorAll('.notification-item'));
                
                notifications.sort((a, b) => {
                    const timeA = parseInt(a.getAttribute('data-time'));
                    const timeB = parseInt(b.getAttribute('data-time'));
                    
                    if (sortType === 'newest') {
                        return timeA - timeB;
                    } else if (sortType === 'oldest') {
                        return timeB - timeA;
                    } else if (sortType === 'unread') {
                        const unreadA = a.classList.contains('unread') ? 0 : 1;
                        const unreadB = b.classList.contains('unread') ? 0 : 1;
                        return unreadA - unreadB;
                    }
                });
                
                notifications.forEach(notification => {
                    container.appendChild(notification);
                });
            });
        }

        // Delete notification
        function deleteNotification(button) {
            const notification = button.closest('.notification-item');
            notification.style.transition = 'opacity 0.3s, transform 0.3s';
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100px)';
            
            setTimeout(() => {
                notification.remove();
            }, 300);
        }

        // Action functions
        function viewGrade() {
            window.location.href = "{{ route('student.grades') }}";
        }

        function viewMaterial() {
            window.location.href = "{{ route('student.courses') }}";
        }

        function viewAssignment() {
            window.location.href = "{{ route('student.courses') }}";
        }
    </script>
</body>
</html>
