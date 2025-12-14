<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard - CourseReg</title>
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
            overflow-y: auto;
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
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--primary-yellow);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #333;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .stat-card {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            border-radius: 10px;
            padding: 25px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .stat-card h3 {
            font-size: 2.5rem;
            margin: 0;
            font-weight: bold;
        }
        
        .stat-card p {
            margin: 5px 0 0;
            font-size: 1rem;
            opacity: 0.8;
        }
        
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .course-card {
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-left: 4px solid var(--primary-yellow);
            background: white;
            margin-bottom: 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .course-card:hover {
            background: var(--light-yellow);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .course-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }
        
        .course-details {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
        }
        
        .btn-yellow {
            background: var(--primary-yellow);
            color: #333;
            border: none;
            padding: 8px 20px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-yellow:hover {
            background: var(--dark-yellow);
            transform: translateY(-2px);
        }
        
        .badge-yellow {
            background: var(--primary-yellow);
            color: #333;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
        }
        
        .table {
            background: white;
        }
        
        .table th {
            border-top: none;
            color: #666;
            font-weight: 600;
            background: var(--light-yellow);
        }
        
        .student-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        
        .student-item:last-child {
            border-bottom: none;
        }
        
        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-yellow);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #333;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
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
            <small class="text-muted">Instructor Portal</small>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ url('/instructor/dashboard') }}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ url('/instructor/courses') }}"><i class="fas fa-chalkboard"></i> My Courses</a></li>
            <li><a href="{{ url('/instructor/students') }}"><i class="fas fa-users"></i> Students</a></li>
            <li><a href="{{ url('/instructor/assignments') }}"><i class="fas fa-clipboard-list"></i> Assignments</a></li>
            <li><a href="{{ url('/instructor/gradebook') }}"><i class="fas fa-chart-bar"></i> Grade Book</a></li>
            <li><a href="{{ url('/instructor/materials') }}"><i class="fas fa-file-upload"></i> Course Materials</a></li>
            <li><a href="{{ url('/instructor/schedule') }}"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
            <li><a href="{{ url('/instructor/messages') }}"><i class="fas fa-comments"></i> Messages</a></li>
            <li><a href="{{ url('/instructor/analytics') }}"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="{{ url('/instructor/profile') }}"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="{{ url('/instructor/settings') }}"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div>
                <h5 class="mb-0">Welcome back, Dr. Johnson!</h5>
                <small class="text-muted">Monday, November 18, 2025</small>
            </div>
            <div class="user-profile">
                <div>
                    <a href="{{ url('/instructor/notifications') }}" style="text-decoration: none; color: #666;">
                        <i class="fas fa-bell" style="font-size: 1.3rem; cursor: pointer;"></i>
                        <span class="badge bg-danger" style="position: relative; top: -10px; left: -10px;">3</span>
                    </a>
                </div>
                <a href="{{ url('/instructor/profile') }}" style="text-decoration: none; color: inherit;">
                    <div class="user-avatar">SJ</div>
                </a>
                <a href="{{ url('/instructor/profile') }}" style="text-decoration: none; color: inherit;">
                    <div>
                        <div style="font-weight: 600;">Dr. Sarah Johnson</div>
                        <small class="text-muted">Computer Science Dept.</small>
                    </div>
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>4</h3>
                    <p>Active Courses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3>156</h3>
                    <p>Total Students</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-tasks"></i>
                    <h3>12</h3>
                    <p>Pending Grades</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-clock"></i>
                    <h3>8</h3>
                    <p>Classes This Week</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- My Courses -->
            <div class="col-lg-8">
                <div class="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5><i class="fas fa-chalkboard"></i> My Courses</h5>
                        <a href="{{ url('/instructor/courses/create') }}" class="btn btn-yellow btn-sm">Create New Course</a>
                    </div>
                    
                    <div class="course-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <a href="{{ url('/instructor/courses/1') }}" style="text-decoration: none; color: inherit;">
                                    <div class="course-title">CS 301 - Data Structures & Algorithms</div>
                                </a>
                                <div class="course-details">
                                    <i class="fas fa-users"></i> 45 Students | 
                                    <i class="fas fa-clock"></i> MWF 10:00 AM - 11:30 AM |
                                    <i class="fas fa-map-marker-alt"></i> Room 204
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-success me-2">Active</span>
                                    <span class="badge-yellow">3 Credits</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ url('/instructor/courses/1/edit') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('/instructor/courses/1/manage') }}" class="btn btn-sm btn-yellow">Manage</a>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <a href="{{ url('/instructor/courses/2') }}" style="text-decoration: none; color: inherit;">
                                    <div class="course-title">CS 401 - Advanced Algorithms</div>
                                </a>
                                <div class="course-details">
                                    <i class="fas fa-users"></i> 32 Students | 
                                    <i class="fas fa-clock"></i> TTh 2:00 PM - 3:30 PM |
                                    <i class="fas fa-map-marker-alt"></i> Room 305
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-success me-2">Active</span>
                                    <span class="badge-yellow">3 Credits</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ url('/instructor/courses/2/edit') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('/instructor/courses/2/manage') }}" class="btn btn-sm btn-yellow">Manage</a>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <a href="{{ url('/instructor/courses/3') }}" style="text-decoration: none; color: inherit;">
                                    <div class="course-title">CS 201 - Introduction to Programming</div>
                                </a>
                                <div class="course-details">
                                    <i class="fas fa-users"></i> 52 Students | 
                                    <i class="fas fa-clock"></i> MWF 1:00 PM - 2:30 PM |
                                    <i class="fas fa-map-marker-alt"></i> Lab 102
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-success me-2">Active</span>
                                    <span class="badge-yellow">4 Credits</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ url('/instructor/courses/3/edit') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('/instructor/courses/3/manage') }}" class="btn btn-sm btn-yellow">Manage</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Submissions -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Recent Submissions</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Assignment</th>
                                    <th>Course</th>
                                    <th>Submitted</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="{{ url('/instructor/students/1') }}" style="text-decoration: none; color: inherit;">John Martinez</a></td>
                                    <td><a href="{{ url('/instructor/assignments/1/submissions') }}" style="text-decoration: none; color: inherit;">BST Implementation</a></td>
                                    <td><a href="{{ url('/instructor/courses/1') }}" style="text-decoration: none; color: inherit;">CS 301</a></td>
                                    <td>2 hours ago</td>
                                    <td><a href="{{ url('/instructor/assignments/1/grade') }}" class="btn btn-sm btn-yellow">Grade</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/instructor/students/2') }}" style="text-decoration: none; color: inherit;">Emily Chen</a></td>
                                    <td><a href="{{ url('/instructor/assignments/2/submissions') }}" style="text-decoration: none; color: inherit;">Sorting Algorithms</a></td>
                                    <td><a href="{{ url('/instructor/courses/2') }}" style="text-decoration: none; color: inherit;">CS 401</a></td>
                                    <td>5 hours ago</td>
                                    <td><a href="{{ url('/instructor/assignments/2/grade') }}" class="btn btn-sm btn-yellow">Grade</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/instructor/students/3') }}" style="text-decoration: none; color: inherit;">Michael Brown</a></td>
                                    <td><a href="{{ url('/instructor/assignments/3/submissions') }}" style="text-decoration: none; color: inherit;">Final Project</a></td>
                                    <td><a href="{{ url('/instructor/courses/3') }}" style="text-decoration: none; color: inherit;">CS 201</a></td>
                                    <td>1 day ago</td>
                                    <td><a href="{{ url('/instructor/assignments/3/grade') }}" class="btn btn-sm btn-yellow">Grade</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/instructor/students/4') }}" style="text-decoration: none; color: inherit;">Sarah Davis</a></td>
                                    <td><a href="{{ url('/instructor/assignments/4/submissions') }}" style="text-decoration: none; color: inherit;">Midterm Exam</a></td>
                                    <td><a href="{{ url('/instructor/courses/1') }}" style="text-decoration: none; color: inherit;">CS 301</a></td>
                                    <td>1 day ago</td>
                                    <td><a href="{{ url('/instructor/assignments/4/grade') }}" class="btn btn-sm btn-yellow">Grade</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Class Performance -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-chart-line"></i> Class Performance Overview</h5>
                    <div class="row">
                        <div class="col-md-4 text-center mb-3">
                            <h4 class="text-success">82%</h4>
                            <small class="text-muted">Average Grade</small>
                        </div>
                        <div class="col-md-4 text-center mb-3">
                            <h4 class="text-warning">15%</h4>
                            <small class="text-muted">At Risk Students</small>
                        </div>
                        <div class="col-md-4 text-center mb-3">
                            <h4 class="text-primary">94%</h4>
                            <small class="text-muted">Attendance Rate</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Panels -->
            <div class="col-lg-4">
                <!-- Today's Schedule -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-calendar-day"></i> Today's Schedule</h5>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between mb-1">
                            <strong>CS 301</strong>
                            <span class="badge bg-success">Now</span>
                        </div>
                        <small class="text-muted">10:00 AM - 11:30 AM</small>
                        <div><small>Room 204 • 45 students</small></div>
                    </div>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between mb-1">
                            <strong>CS 201</strong>
                            <span class="text-muted">Upcoming</span>
                        </div>
                        <small class="text-muted">1:00 PM - 2:30 PM</small>
                        <div><small>Lab 102 • 52 students</small></div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <strong>Office Hours</strong>
                            <span class="text-muted">Upcoming</span>
                        </div>
                        <small class="text-muted">3:00 PM - 5:00 PM</small>
                        <div><small>Office 412</small></div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-bolt"></i> Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/instructor/assignments/create') }}" class="btn btn-yellow"><i class="fas fa-plus"></i> Create Assignment</a>
                        <a href="{{ url('/instructor/materials/upload') }}" class="btn btn-outline-secondary"><i class="fas fa-upload"></i> Upload Materials</a>
                        <a href="{{ url('/instructor/announcements/create') }}" class="btn btn-outline-secondary"><i class="fas fa-envelope"></i> Send Announcement</a>
                        <a href="{{ url('/instructor/analytics') }}" class="btn btn-outline-secondary"><i class="fas fa-chart-bar"></i> View Analytics</a>
                    </div>
                </div>

                <!-- Pending Tasks -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-exclamation-circle"></i> Pending Tasks</h5>
                    <a href="{{ url('/instructor/assignments/pending/1') }}" style="text-decoration: none; color: inherit;">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>Grade Midterm Exams</strong>
                                    <div class="text-muted small">CS 301 • 12 submissions</div>
                                </div>
                                <span class="badge bg-danger">Urgent</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/instructor/courses/2/syllabus') }}" style="text-decoration: none; color: inherit;">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>Update Syllabus</strong>
                                    <div class="text-muted small">CS 401 • Due Nov 20</div>
                                </div>
                                <span class="badge bg-warning">Soon</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/instructor/assignments/proposals/3') }}" style="text-decoration: none; color: inherit;">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>Review Project Proposals</strong>
                                    <div class="text-muted small">CS 201 • 8 proposals</div>
                                </div>
                                <span class="badge bg-info">Pending</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Recent Messages -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-comments"></i> Recent Messages</h5>
                    <a href="{{ url('/instructor/messages/1') }}" style="text-decoration: none; color: inherit;">
                        <div class="student-item">
                            <div class="student-info">
                                <div class="student-avatar">JM</div>
                                <div>
                                    <strong>John Martinez</strong>
                                    <div class="text-muted small">Question about Assignment 3</div>
                                </div>
                            </div>
                            <small class="text-muted">1h</small>
                        </div>
                    </a>
                    <a href="{{ url('/instructor/messages/2') }}" style="text-decoration: none; color: inherit;">
                        <div class="student-item">
                            <div class="student-info">
                                <div class="student-avatar">EC</div>
                                <div>
                                    <strong>Emily Chen</strong>
                                    <div class="text-muted small">Extension request</div>
                                </div>
                            </div>
                            <small class="text-muted">3h</small>
                        </div>
                    </a>
                    <a href="{{ url('/instructor/messages/3') }}" style="text-decoration: none; color: inherit;">
                        <div class="student-item">
                            <div class="student-info">
                                <div class="student-avatar">MB</div>
                                <div>
                                    <strong>Michael Brown</strong>
                                    <div class="text-muted small">Office hours appointment</div>
                                </div>
                            </div>
                            <small class="text-muted">5h</small>
                        </div>
                    </a>
                    <a href="{{ url('/instructor/messages') }}" class="btn btn-sm btn-outline-secondary w-100 mt-3">View All Messages</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>