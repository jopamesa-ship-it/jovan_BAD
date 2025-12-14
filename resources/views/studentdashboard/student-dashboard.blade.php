<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - CourseReg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #fbbf24;
            --primary-dark: #f59e0b;
            --primary-light: #fcd34d;
            --secondary-color: #fbbf24;
            --secondary-dark: #d97706;
            --accent-color: #fcd34d;
            --success-color: #10b981;
            --gradient-start: #fbbf24;
            --gradient-end: #f59e0b;
            --light-bg: #fffbeb;
            --card-shadow: 0 10px 40px rgba(251, 191, 36, 0.15);
            --hover-shadow: 0 20px 60px rgba(251, 191, 36, 0.25);
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light-bg);
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: white;
            box-shadow: 2px 0 20px rgba(0,0,0,0.08);
            padding: 20px 0;
            z-index: 1000;
            border-right: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .sidebar-brand {
            padding: 0 20px 20px;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 20px;
        }
        
        .sidebar-brand h4 {
            margin: 0;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
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
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0 8px 8px 0;
            margin-right: 10px;
            cursor: pointer;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: linear-gradient(90deg, rgba(251, 191, 36, 0.15) 0%, rgba(251, 191, 36, 0.05) 100%);
            color: var(--primary-dark);
            border-left: 4px solid var(--primary-color);
            padding-left: 16px;
        }
        
        .sidebar-menu a:active {
            transform: scale(0.98);
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
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .notification-btn {
            position: relative;
            cursor: pointer;
            padding: 10px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .notification-btn:hover {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.15) 0%, rgba(245, 158, 11, 0.15) 100%);
            transform: scale(1.1);
        }
        
        .notification-btn:active {
            transform: scale(0.95);
        }
        
        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
        }
        
        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #333;
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
        }
        
        .profile-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: inherit;
            padding: 8px 16px;
            border-radius: 30px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .profile-btn:hover {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.15) 0%, rgba(245, 158, 11, 0.15) 100%);
            transform: translateY(-2px);
            color: inherit;
        }
        
        .profile-btn:active {
            transform: translateY(0);
        }
        
        .dashboard-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }
        
        .stat-card {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            border-radius: 16px;
            padding: 28px;
            color: #333;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(251, 191, 36, 0.4);
            border: none;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(251, 191, 36, 0.5);
        }
        
        .stat-card:active {
            transform: translateY(-2px);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .stat-card h3 {
            font-size: 2.8rem;
            margin: 0;
            font-weight: 800;
            position: relative;
        }
        
        .stat-card p {
            margin: 8px 0 0;
            font-size: 1rem;
            opacity: 0.9;
            position: relative;
            font-weight: 500;
        }
        
        .course-item {
            padding: 18px;
            border-left: 4px solid var(--primary-color);
            background: linear-gradient(to right, rgba(251, 191, 36, 0.08), transparent);
            margin-bottom: 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .course-item:hover {
            background: linear-gradient(to right, rgba(251, 191, 36, 0.15), rgba(251, 191, 36, 0.03));
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.2);
        }
        
        .course-item:active {
            transform: translateX(3px);
        }
        
        .course-title {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }
        
        .course-details {
            font-size: 0.9rem;
            color: #64748b;
        }
        
        .btn-yellow {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: #333;
            border: none;
            padding: 10px 28px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
        }
        
        .btn-yellow:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--secondary-dark) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(251, 191, 36, 0.5);
            color: #333;
        }
        
        .badge-yellow {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: #333;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .progress {
            height: 8px;
            border-radius: 10px;
            background: rgba(251, 191, 36, 0.15);
        }
        
        .progress-bar {
            background: linear-gradient(90deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            border-radius: 10px;
        }
        
        .table {
            background: white;
            border-radius: 10px;
        }
        
        .table th {
            border-top: none;
            color: #666;
            font-weight: 600;
        }
        
        .table tbody tr {
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background: rgba(251, 191, 36, 0.08);
            transform: translateX(3px);
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
            <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('student.courses') }}"><i class="fas fa-book"></i> My Courses</a></li>
            <li><a href="{{ route('student.browse') }}"><i class="fas fa-search"></i> Browse Courses</a></li>
            <li><a href="{{ route('student.schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
            <li><a href="{{ route('student.grades') }}"><i class="fas fa-chart-line"></i> Grades</a></li>
            <li><a href="{{ route('student.notifications') }}"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#settingsModal"><i class="fas fa-cog"></i> Settings</a></li>
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
                <h5 class="mb-0">Welcome back, Jovan!</h5>
                <small class="text-muted">Monday, November 18, 2025</small>
            </div>
            <div class="user-profile">
                <a href="{{ route('student.notifications') }}" class="notification-btn">
                    <i class="fas fa-bell" style="font-size: 1.3rem; color: #666;"></i>
                    <span class="notification-badge">3</span>
                </a>
                <a href="#" class="profile-btn" data-bs-toggle="modal" data-bs-target="#profileModal">
                    <div class="user-avatar">JD</div>
                    <div>
                        <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                        <small class="text-muted">{{ Auth::user()->student_id }}</small>
                    </div>
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>6</h3>
                    <p>Enrolled Courses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>18</h3>
                    <p>Total Credits</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>3.85</h3>
                    <p>Current GPA</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>75%</h3>
                    <p>Degree Progress</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Current Courses -->
            <div class="col-lg-8">
                <div class="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5><i class="fas fa-book-open"></i> Current Courses</h5>
                        <a href="{{ route('student.courses') }}" class="btn btn-yellow btn-sm">View All</a>
                    </div>
                    
                    <div class="course-item" onclick="viewCourse('CS301')">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="course-title">CS 301 - Data Structures & Algorithms</div>
                                <div class="course-details">
                                    <i class="fas fa-user"></i> Dr. Sarah Johnson | 
                                    <i class="fas fa-clock"></i> MWF 10:00 AM - 11:30 AM |
                                    <i class="fas fa-map-marker-alt"></i> Room 204
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted">Progress: 65%</small>
                                    <div class="progress mt-1">
                                        <div class="progress-bar" style="width: 65%"></div>
                                    </div>
                                </div>
                            </div>
                            <span class="badge-yellow">3 Credits</span>
                        </div>
                    </div>

                    <div class="course-item" onclick="viewCourse('CS305')">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="course-title">CS 305 - Database Management Systems</div>
                                <div class="course-details">
                                    <i class="fas fa-user"></i> Prof. Michael Chen | 
                                    <i class="fas fa-clock"></i> TTh 2:00 PM - 3:30 PM |
                                    <i class="fas fa-map-marker-alt"></i> Room 301
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted">Progress: 70%</small>
                                    <div class="progress mt-1">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                </div>
                            </div>
                            <span class="badge-yellow">3 Credits</span>
                        </div>
                    </div>

                    <div class="course-item" onclick="viewCourse('CS320')">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="course-title">CS 320 - Web Development</div>
                                <div class="course-details">
                                    <i class="fas fa-user"></i> Dr. Emily Rodriguez | 
                                    <i class="fas fa-clock"></i> MWF 1:00 PM - 2:30 PM |
                                    <i class="fas fa-map-marker-alt"></i> Lab 105
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted">Progress: 58%</small>
                                    <div class="progress mt-1">
                                        <div class="progress-bar" style="width: 58%"></div>
                                    </div>
                                </div>
                            </div>
                            <span class="badge-yellow">3 Credits</span>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Assignments -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-tasks"></i> Upcoming Assignments</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Assignment</th>
                                    <th>Course</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Binary Search Tree Implementation</td>
                                    <td>CS 301</td>
                                    <td>Nov 22, 2025</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>SQL Query Project</td>
                                    <td>CS 305</td>
                                    <td>Nov 25, 2025</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Responsive Website Design</td>
                                    <td>CS 320</td>
                                    <td>Nov 28, 2025</td>
                                    <td><span class="badge bg-success">In Progress</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sidebar Cards -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-bolt"></i> Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <a href="{{ route('student.browse') }}" class="btn btn-yellow"><i class="fas fa-plus"></i> Register for Courses</a>
                        <a href="{{ route('student.schedule') }}" class="btn btn-outline-secondary"><i class="fas fa-calendar-plus"></i> Add to Schedule</a>
                        <a href="{{ route('student.transcript') }}" class="btn btn-outline-secondary"><i class="fas fa-download"></i> Download Transcript</a>
                        <a href="{{ route('student.tuition') }}" class="btn btn-outline-secondary"><i class="fas fa-file-invoice"></i> View Tuition</a>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-bell"></i> Recent Notifications</h5>
                    <div class="mb-3 pb-3 border-bottom notification-item" style="cursor: pointer; padding: 8px; border-radius: 8px; transition: all 0.2s ease;" onmouseover="this.style.background='rgba(251, 191, 36, 0.08)'" onmouseout="this.style.background='transparent'" onclick="viewNotification(1)">
                        <div class="d-flex justify-content-between">
                            <strong>Grade Posted</strong>
                            <small class="text-muted">2h ago</small>
                        </div>
                        <small class="text-muted">CS 301 - Assignment 3 graded</small>
                    </div>
                    <div class="mb-3 pb-3 border-bottom notification-item" style="cursor: pointer; padding: 8px; border-radius: 8px; transition: all 0.2s ease;" onmouseover="this.style.background='rgba(251, 191, 36, 0.08)'" onmouseout="this.style.background='transparent'" onclick="viewNotification(2)">
                        <div class="d-flex justify-content-between">
                            <strong>Course Update</strong>
                            <small class="text-muted">1d ago</small>
                        </div>
                        <small class="text-muted">CS 320 - New materials uploaded</small>
                    </div>
                    <div class="mb-3 notification-item" style="cursor: pointer; padding: 8px; border-radius: 8px; transition: all 0.2s ease;" onmouseover="this.style.background='rgba(251, 191, 36, 0.08)'" onmouseout="this.style.background='transparent'" onclick="viewNotification(3)">
                        <div class="d-flex justify-content-between">
                            <strong>Registration Reminder</strong>
                            <small class="text-muted">2d ago</small>
                        </div>
                        <small class="text-muted">Spring 2026 registration opens soon</small>
                    </div>
                    <a href="{{ route('student.notifications') }}" class="btn btn-sm btn-outline-secondary w-100">View All</a>
                </div>

                <!-- Academic Calendar -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-calendar-alt"></i> Academic Calendar</h5>
                    <div class="mb-2" style="cursor: pointer; padding: 8px; border-radius: 8px; transition: all 0.2s ease;" onmouseover="this.style.background='rgba(251, 191, 36, 0.08)'" onmouseout="this.style.background='transparent'" onclick="viewCalendarEvent('thanksgiving')">
                        <strong>Nov 28-29</strong>
                        <div class="text-muted small">Thanksgiving Break</div>
                    </div>
                    <div class="mb-2" style="cursor: pointer; padding: 8px; border-radius: 8px; transition: all 0.2s ease;" onmouseover="this.style.background='rgba(251, 191, 36, 0.08)'" onmouseout="this.style.background='transparent'" onclick="viewCalendarEvent('finals')">
                        <strong>Dec 15-20</strong>
                        <div class="text-muted small">Final Examinations</div>
                    </div>
                    <div class="mb-2" style="cursor: pointer; padding: 8px; border-radius: 8px; transition: all 0.2s ease;" onmouseover="this.style.background='rgba(251, 191, 36, 0.08)'" onmouseout="this.style.background='transparent'" onclick="viewCalendarEvent('semester-end')">
                        <strong>Dec 21</strong>
                        <div class="text-muted small">Semester Ends</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="profileModalLabel"><i class="fas fa-user"></i> My Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="user-avatar" style="width: 100px; height: 100px; font-size: 2.5rem; margin: 0 auto;">JD</div>
                        <h5 class="mt-3 mb-0">Jovan Pamesa</h5>
                        <small class="text-muted">Student ID: 2023-00123</small>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" value="John" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" value="Doe" placeholder="Enter last name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="profileEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="profileEmail" value="john.doe@university.edu" placeholder="Enter email">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="studentId" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="studentId" value="2023-00123" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="major" class="form-label">Major</label>
                                <input type="text" class="form-control" id="major" value="Computer Science" placeholder="Enter major">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567" placeholder="Enter phone number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="yearLevel" class="form-label">Year Level</label>
                                <select class="form-select" id="yearLevel">
                                    <option value="1">Freshman</option>
                                    <option value="2">Sophomore</option>
                                    <option value="3" selected>Junior</option>
                                    <option value="4">Senior</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" rows="3" placeholder="Tell us about yourself">Passionate about software development and data science.</textarea>
                        </div>

                        <hr class="my-4">

                        <h6 class="mb-3">Change Password</h6>
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmNewPassword" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-yellow" id="saveProfile">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Modal -->
    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="settingsModalLabel"><i class="fas fa-cog"></i> Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Notifications</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notifyEmail" checked>
                                <label class="form-check-label" for="notifyEmail">Email notifications</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notifyPush">
                                <label class="form-check-label" for="notifyPush">Browser push notifications</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Privacy</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="privateProfile">
                                <label class="form-check-label" for="privateProfile">Set profile to private</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Theme</label>
                            <select class="form-select" id="themeSelect">
                                <option value="light" selected>Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-yellow" id="saveSettings">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Save profile (placeholder - replace with AJAX or form submit as needed)
            var saveProfileBtn = document.getElementById('saveProfile');
            if (saveProfileBtn) {
                saveProfileBtn.addEventListener('click', function() {
                    var firstName = document.getElementById('firstName').value;
                    var lastName = document.getElementById('lastName').value;
                    
                    // Update display name in top bar
                    var profileBtns = document.querySelectorAll('.profile-btn div[style*="font-weight"]');
                    profileBtns.forEach(function(btn) {
                        btn.textContent = firstName + ' ' + lastName;
                    });
                    
                    // Update welcome message
                    var welcomeMsg = document.querySelector('.top-bar h5');
                    if (welcomeMsg) {
                        welcomeMsg.textContent = 'Welcome back, ' + firstName + '!';
                    }
                    
                    var profileModal = bootstrap.Modal.getInstance(document.getElementById('profileModal'));
                    if (profileModal) profileModal.hide();
                    
                    // Show success message
                    alert('Profile updated successfully!');
                });
            }

            // Course click handlers
            window.viewCourse = function(courseId) {
                window.location.href = '/student/courses/' + courseId;
            };

            // Notification click handler
            window.viewNotification = function(notificationId) {
                console.log('Viewing notification:', notificationId);
                window.location.href = '/student/notifications/' + notificationId;
            };

            // Calendar event click handler
            window.viewCalendarEvent = function(eventId) {
                console.log('Viewing calendar event:', eventId);
                window.location.href = '/student/calendar?event=' + eventId;
            };

            // Stat card click handlers
            var statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(function(card, index) {
                card.addEventListener('click', function() {
                    var routes = [
                        '/student/courses',
                        '/student/courses',
                        '/student/grades',
                        '/student/progress'
                    ];
                    if (routes[index]) {
                        window.location.href = routes[index];
                    }
                });
            });

            // Table row click handlers
            var tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach(function(row) {
                row.addEventListener('click', function() {
                    console.log('Assignment clicked');
                    // Navigate to assignment details
                });
            });

            // Save settings (placeholder - replace with AJAX or form submit as needed)
            var saveBtn = document.getElementById('saveSettings');
            if (saveBtn) {
                saveBtn.addEventListener('click', function() {
                    var theme = document.getElementById('themeSelect').value;
                    // Example: apply theme locally
                    if (theme === 'dark') {
                        document.documentElement.style.background = '#121212';
                        document.documentElement.style.color = '#e6e6e6';
                    } else {
                        document.documentElement.style.background = '';
                        document.documentElement.style.color = '';
                    }

                    var settingsModal = bootstrap.Modal.getInstance(document.getElementById('settingsModal'));
                    if (settingsModal) settingsModal.hide();
                });
            }
        });
    </script>
</body>
</html>