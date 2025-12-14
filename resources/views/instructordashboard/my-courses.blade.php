<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - Instructor Dashboard</title>
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
        
        .page-header h2 {
            margin: 0;
            color: #333;
            font-weight: bold;
        }
        
        .filter-bar {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .course-card-full {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border-left: 4px solid var(--primary-yellow);
        }
        
        .course-card-full:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .course-header {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            padding: 20px;
            color: #333;
        }
        
        .course-code {
            font-size: 0.9rem;
            font-weight: 600;
            opacity: 0.8;
            margin-bottom: 5px;
        }
        
        .course-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0;
        }
        
        .course-body {
            padding: 20px;
        }
        
        .course-info {
            margin-bottom: 15px;
        }
        
        .course-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            color: #666;
            font-size: 0.9rem;
        }
        
        .course-info-item i {
            width: 20px;
            color: var(--primary-yellow);
        }
        
        .course-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 15px;
            padding: 15px;
            background: var(--light-yellow);
            border-radius: 8px;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin: 0;
        }
        
        .stat-label {
            font-size: 0.75rem;
            color: #666;
            margin: 0;
        }
        
        .course-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        .btn-yellow {
            background: var(--primary-yellow);
            color: #333;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-yellow:hover {
            background: var(--dark-yellow);
            color: #333;
            transform: translateY(-2px);
        }
        
        .btn-outline-yellow {
            background: white;
            color: #333;
            border: 2px solid var(--primary-yellow);
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-outline-yellow:hover {
            background: var(--light-yellow);
            color: #333;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .status-active {
            background: #d4edda;
            color: #155724;
        }
        
        .status-draft {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-archived {
            background: #f8d7da;
            color: #721c24;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--primary-yellow);
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            color: #666;
            margin-bottom: 10px;
        }
        
        .empty-state p {
            color: #999;
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .course-grid {
                grid-template-columns: 1fr;
            }
            
            .course-stats {
                grid-template-columns: 1fr;
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
            <li><a href="{{ url('/instructor/courses') }}" class="active"><i class="fas fa-chalkboard"></i> My Courses</a></li>
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
                <h5 class="mb-0">My Courses</h5>
                <small class="text-muted">Manage your courses and content</small>
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
                    <h2><i class="fas fa-chalkboard"></i> My Courses</h2>
                    <p class="text-muted mb-0">You are teaching 4 active courses this semester</p>
                </div>
                <a href="{{ url('/instructor/courses/create') }}" class="btn btn-yellow">
                    <i class="fas fa-plus"></i> Create New Course
                </a>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="all">All Courses</option>
                        <option value="active" selected>Active Courses</option>
                        <option value="draft">Draft Courses</option>
                        <option value="archived">Archived Courses</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="semesterFilter">
                        <option value="current" selected>Current Semester</option>
                        <option value="fall2025">Fall 2025</option>
                        <option value="spring2025">Spring 2025</option>
                        <option value="fall2024">Fall 2024</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search courses..." id="searchInput">
                    </div>
                </div>
                <div class="col-md-2">
                    <select class="form-select" id="sortFilter">
                        <option value="name">Sort by Name</option>
                        <option value="students">Sort by Students</option>
                        <option value="recent">Recently Updated</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Course Grid -->
        <div class="course-grid">
            <!-- Course Card 1 -->
            <div class="course-card-full">
                <div class="course-header">
                    <div class="course-code">CS 301</div>
                    <h3 class="course-name">Data Structures & Algorithms</h3>
                    <div class="mt-2">
                        <span class="status-badge status-active">Active</span>
                        <span class="badge bg-dark ms-2">3 Credits</span>
                    </div>
                </div>
                <div class="course-body">
                    <div class="course-info">
                        <div class="course-info-item">
                            <i class="fas fa-users"></i>
                            <span>45 Students Enrolled</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-clock"></i>
                            <span>MWF 10:00 AM - 11:30 AM</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Room 204, Computer Science Building</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-calendar"></i>
                            <span>Fall 2025</span>
                        </div>
                    </div>
                    
                    <div class="course-stats">
                        <div class="stat-item">
                            <p class="stat-value">12</p>
                            <p class="stat-label">Assignments</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">8</p>
                            <p class="stat-label">Pending</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">82%</p>
                            <p class="stat-label">Avg Grade</p>
                        </div>
                    </div>
                    
                    <div class="course-actions">
                        <a href="{{ url('/instructor/courses/1/manage') }}" class="btn btn-yellow">
                            <i class="fas fa-cog"></i> Manage
                        </a>
                        <a href="{{ url('/instructor/courses/1') }}" class="btn btn-outline-yellow">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>
            </div>

            <!-- Course Card 2 -->
            <div class="course-card-full">
                <div class="course-header">
                    <div class="course-code">CS 401</div>
                    <h3 class="course-name">Advanced Algorithms</h3>
                    <div class="mt-2">
                        <span class="status-badge status-active">Active</span>
                        <span class="badge bg-dark ms-2">3 Credits</span>
                    </div>
                </div>
                <div class="course-body">
                    <div class="course-info">
                        <div class="course-info-item">
                            <i class="fas fa-users"></i>
                            <span>32 Students Enrolled</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-clock"></i>
                            <span>TTh 2:00 PM - 3:30 PM</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Room 305, Computer Science Building</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-calendar"></i>
                            <span>Fall 2025</span>
                        </div>
                    </div>
                    
                    <div class="course-stats">
                        <div class="stat-item">
                            <p class="stat-value">10</p>
                            <p class="stat-label">Assignments</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">4</p>
                            <p class="stat-label">Pending</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">88%</p>
                            <p class="stat-label">Avg Grade</p>
                        </div>
                    </div>
                    
                    <div class="course-actions">
                        <a href="{{ url('/instructor/courses/2/manage') }}" class="btn btn-yellow">
                            <i class="fas fa-cog"></i> Manage
                        </a>
                        <a href="{{ url('/instructor/courses/2') }}" class="btn btn-outline-yellow">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="course-card-full">
                <div class="course-header">
                    <div class="course-code">CS 201</div>
                    <h3 class="course-name">Introduction to Programming</h3>
                    <div class="mt-2">
                        <span class="status-badge status-active">Active</span>
                        <span class="badge bg-dark ms-2">4 Credits</span>
                    </div>
                </div>
                <div class="course-body">
                    <div class="course-info">
                        <div class="course-info-item">
                            <i class="fas fa-users"></i>
                            <span>52 Students Enrolled</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-clock"></i>
                            <span>MWF 1:00 PM - 2:30 PM</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Lab 102, Computer Science Building</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-calendar"></i>
                            <span>Fall 2025</span>
                        </div>
                    </div>
                    
                    <div class="course-stats">
                        <div class="stat-item">
                            <p class="stat-value">15</p>
                            <p class="stat-label">Assignments</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">6</p>
                            <p class="stat-label">Pending</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">78%</p>
                            <p class="stat-label">Avg Grade</p>
                        </div>
                    </div>
                    
                    <div class="course-actions">
                        <a href="{{ url('/instructor/courses/3/manage') }}" class="btn btn-yellow">
                            <i class="fas fa-cog"></i> Manage
                        </a>
                        <a href="{{ url('/instructor/courses/3') }}" class="btn btn-outline-yellow">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>
            </div>

            <!-- Course Card 4 -->
            <div class="course-card-full">
                <div class="course-header">
                    <div class="course-code">CS 150</div>
                    <h3 class="course-name">Computer Science Fundamentals</h3>
                    <div class="mt-2">
                        <span class="status-badge status-active">Active</span>
                        <span class="badge bg-dark ms-2">3 Credits</span>
                    </div>
                </div>
                <div class="course-body">
                    <div class="course-info">
                        <div class="course-info-item">
                            <i class="fas fa-users"></i>
                            <span>27 Students Enrolled</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-clock"></i>
                            <span>TTh 9:00 AM - 10:30 AM</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Room 101, Computer Science Building</span>
                        </div>
                        <div class="course-info-item">
                            <i class="fas fa-calendar"></i>
                            <span>Fall 2025</span>
                        </div>
                    </div>
                    
                    <div class="course-stats">
                        <div class="stat-item">
                            <p class="stat-value">8</p>
                            <p class="stat-label">Assignments</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">2</p>
                            <p class="stat-label">Pending</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-value">85%</p>
                            <p class="stat-label">Avg Grade</p>
                        </div>
                    </div>
                    
                    <div class="course-actions">
                        <a href="{{ url('/instructor/courses/4/manage') }}" class="btn btn-yellow">
                            <i class="fas fa-cog"></i> Manage
                        </a>
                        <a href="{{ url('/instructor/courses/4') }}" class="btn btn-outline-yellow">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Summary -->
        <div class="row">
            <div class="col-md-3">
                <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center;">
                    <i class="fas fa-chalkboard-teacher" style="font-size: 2rem; color: var(--primary-yellow); margin-bottom: 10px;"></i>
                    <h3 style="margin: 0; color: #333;">4</h3>
                    <p style="margin: 0; color: #666; font-size: 0.9rem;">Total Active Courses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center;">
                    <i class="fas fa-users" style="font-size: 2rem; color: var(--primary-yellow); margin-bottom: 10px;"></i>
                    <h3 style="margin: 0; color: #333;">156</h3>
                    <p style="margin: 0; color: #666; font-size: 0.9rem;">Total Students</p>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center;">
                    <i class="fas fa-clipboard-list" style="font-size: 2rem; color: var(--primary-yellow); margin-bottom: 10px;"></i>
                    <h3 style="margin: 0; color: #333;">45</h3>
                    <p style="margin: 0; color: #666; font-size: 0.9rem;">Total Assignments</p>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center;">
                    <i class="fas fa-chart-line" style="font-size: 2rem; color: var(--primary-yellow); margin-bottom: 10px;"></i>
                    <h3 style="margin: 0; color: #333;">83%</h3>
                    <p style="margin: 0; color: #666; font-size: 0.9rem;">Average Performance</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple filter functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const courseCards = document.querySelectorAll('.course-card-full');
            
            courseCards.forEach(card => {
                const courseName = card.querySelector('.course-name').textContent.toLowerCase();
                const courseCode = card.querySelector('.course-code').textContent.toLowerCase();
                
                if (courseName.includes(searchTerm) || courseCode.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
        
        // Status filter
        document.getElementById('statusFilter').addEventListener('change', function(e) {
            const status = e.target.value;
            console.log('Filter by status:', status);
            // Add filtering logic here when connected to backend
        });
        
        // Sort filter
        document.getElementById('sortFilter').addEventListener('change', function(e) {
            const sortBy = e.target.value;
            console.log('Sort by:', sortBy);
            // Add sorting logic here when connected to backend
        });
    </script>
</body>
</html>
