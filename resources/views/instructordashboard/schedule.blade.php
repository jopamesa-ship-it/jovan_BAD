<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule - Instructor Dashboard</title>
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
        
        .page-header {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .schedule-event {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            border-left: 4px solid var(--primary-yellow);
        }
        
        .time-badge {
            background: var(--light-yellow);
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 600;
            color: #333;
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
            color: #333;
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
            <li><a href="{{ url('/instructor/dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ url('/instructor/courses') }}"><i class="fas fa-chalkboard"></i> My Courses</a></li>
            <li><a href="{{ url('/instructor/students') }}"><i class="fas fa-users"></i> Students</a></li>
            <li><a href="{{ url('/instructor/assignments') }}"><i class="fas fa-clipboard-list"></i> Assignments</a></li>
            <li><a href="{{ url('/instructor/gradebook') }}"><i class="fas fa-chart-bar"></i> Grade Book</a></li>
            <li><a href="{{ url('/instructor/materials') }}"><i class="fas fa-file-upload"></i> Course Materials</a></li>
            <li><a href="{{ url('/instructor/schedule') }}" class="active"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
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
                <h5 class="mb-0">Schedule</h5>
                <small class="text-muted">View your weekly schedule</small>
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

        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2><i class="fas fa-calendar-alt"></i> My Schedule</h2>
                    <p>Week of December 2 - December 8, 2025</p>
                </div>
                <button class="btn btn-yellow">
                    <i class="fas fa-plus"></i> Add Event
                </button>
            </div>
        </div>

        <!-- Schedule -->
        <div class="row">
            <div class="col-12">
                <h5 class="mb-3">Monday, December 2</h5>
                
                <div class="schedule-event">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="time-badge">10:00 AM - 11:30 AM</span>
                                <h6 class="mb-0">CS 301 - Data Structures & Algorithms</h6>
                            </div>
                            <p class="mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> Room 204 • 45 Students</p>
                            <span class="badge bg-success">Lecture</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                </div>

                <div class="schedule-event">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="time-badge">1:00 PM - 2:30 PM</span>
                                <h6 class="mb-0">CS 201 - Introduction to Programming</h6>
                            </div>
                            <p class="mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> Lab 102 • 52 Students</p>
                            <span class="badge bg-info">Lab Session</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                </div>

                <div class="schedule-event">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="time-badge">3:00 PM - 5:00 PM</span>
                                <h6 class="mb-0">Office Hours</h6>
                            </div>
                            <p class="mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> Office 412</p>
                            <span class="badge bg-warning">Office Hours</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                </div>

                <h5 class="mb-3 mt-4">Tuesday, December 3</h5>
                
                <div class="schedule-event">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="time-badge">2:00 PM - 3:30 PM</span>
                                <h6 class="mb-0">CS 401 - Advanced Algorithms</h6>
                            </div>
                            <p class="mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> Room 305 • 32 Students</p>
                            <span class="badge bg-success">Lecture</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                </div>

                <h5 class="mb-3 mt-4">Wednesday, December 4</h5>
                
                <div class="schedule-event">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="time-badge">10:00 AM - 11:30 AM</span>
                                <h6 class="mb-0">CS 301 - Data Structures & Algorithms</h6>
                            </div>
                            <p class="mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> Room 204 • 45 Students</p>
                            <span class="badge bg-success">Lecture</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                </div>

                <div class="schedule-event">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="time-badge">1:00 PM - 2:30 PM</span>
                                <h6 class="mb-0">CS 201 - Introduction to Programming</h6>
                            </div>
                            <p class="mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> Lab 102 • 52 Students</p>
                            <span class="badge bg-info">Lab Session</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
