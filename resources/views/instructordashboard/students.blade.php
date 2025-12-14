<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - Instructor Dashboard</title>
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
        
        .stats-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            border-left: 4px solid var(--primary-yellow);
        }
        
        .stat-box h3 {
            font-size: 2rem;
            margin: 10px 0;
            color: #333;
        }
        
        .stat-box p {
            color: #666;
            margin: 0;
            font-size: 0.9rem;
        }
        
        .stat-box i {
            font-size: 2rem;
            color: var(--dark-yellow);
        }
        
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .student-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .student-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .student-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .student-avatar-large {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5rem;
            color: #333;
        }
        
        .student-info {
            flex-grow: 1;
        }
        
        .student-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .student-id {
            color: #666;
            font-size: 0.9rem;
        }
        
        .student-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: var(--light-yellow);
            border-radius: 8px;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-item i {
            color: var(--dark-yellow);
            width: 20px;
        }
        
        .detail-label {
            font-size: 0.85rem;
            color: #666;
        }
        
        .detail-value {
            font-weight: 600;
            color: #333;
        }
        
        .student-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
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
            transform: translateY(-2px);
        }
        
        .performance-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
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
            <li><a href="{{ url('/instructor/students') }}" class="active"><i class="fas fa-users"></i> Students</a></li>
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
                <h5 class="mb-0">Students</h5>
                <small class="text-muted">Manage and monitor your students</small>
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
                    <h2><i class="fas fa-users"></i> My Students</h2>
                    <p>You have 156 students across 4 courses</p>
                </div>
                <button class="btn btn-yellow">
                    <i class="fas fa-download"></i> Export List
                </button>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="stats-overview">
            <div class="stat-box">
                <i class="fas fa-users"></i>
                <h3>156</h3>
                <p>Total Students</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-star"></i>
                <h3>82%</h3>
                <p>Average Performance</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>23</h3>
                <p>At Risk Students</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-check-circle"></i>
                <h3>94%</h3>
                <p>Attendance Rate</p>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="row g-3">
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>All Courses</option>
                        <option>CS 301</option>
                        <option>CS 401</option>
                        <option>CS 201</option>
                        <option>CS 350</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>All Performance</option>
                        <option>Excellent (90-100%)</option>
                        <option>Good (80-89%)</option>
                        <option>Average (70-79%)</option>
                        <option>At Risk (Below 70%)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search students...">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Students List -->
        <div class="row">
            <div class="col-12">
                <!-- Student 1 -->
                <div class="student-card">
                    <div class="student-header">
                        <div class="student-avatar-large">JM</div>
                        <div class="student-info">
                            <div class="student-name">John Martinez</div>
                            <div class="student-id">Student ID: 2024001 • Computer Science</div>
                        </div>
                        <span class="badge bg-success performance-badge">Excellent</span>
                    </div>
                    
                    <div class="student-details">
                        <div class="detail-item">
                            <i class="fas fa-book"></i>
                            <div>
                                <div class="detail-label">Courses</div>
                                <div class="detail-value">2 (CS 301, CS 350)</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-chart-line"></i>
                            <div>
                                <div class="detail-label">Average Grade</div>
                                <div class="detail-value">92%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clipboard-check"></i>
                            <div>
                                <div class="detail-label">Attendance</div>
                                <div class="detail-value">96%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Assignments</div>
                                <div class="detail-value">18/20 Submitted</div>
                            </div>
                        </div>
                    </div>

                    <div class="student-actions">
                        <a href="{{ url('/instructor/students/1') }}" class="btn btn-yellow btn-sm">
                            <i class="fas fa-eye"></i> View Profile
                        </a>
                        <a href="{{ url('/instructor/messages/1') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-envelope"></i> Message
                        </a>
                        <a href="{{ url('/instructor/gradebook?student=1') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-chart-bar"></i> View Grades
                        </a>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-file-alt"></i> Reports
                        </button>
                    </div>
                </div>

                <!-- Student 2 -->
                <div class="student-card">
                    <div class="student-header">
                        <div class="student-avatar-large">EC</div>
                        <div class="student-info">
                            <div class="student-name">Emily Chen</div>
                            <div class="student-id">Student ID: 2024002 • Computer Science</div>
                        </div>
                        <span class="badge bg-success performance-badge">Excellent</span>
                    </div>
                    
                    <div class="student-details">
                        <div class="detail-item">
                            <i class="fas fa-book"></i>
                            <div>
                                <div class="detail-label">Courses</div>
                                <div class="detail-value">2 (CS 401, CS 350)</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-chart-line"></i>
                            <div>
                                <div class="detail-label">Average Grade</div>
                                <div class="detail-value">95%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clipboard-check"></i>
                            <div>
                                <div class="detail-label">Attendance</div>
                                <div class="detail-value">98%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Assignments</div>
                                <div class="detail-value">20/20 Submitted</div>
                            </div>
                        </div>
                    </div>

                    <div class="student-actions">
                        <a href="{{ url('/instructor/students/2') }}" class="btn btn-yellow btn-sm">
                            <i class="fas fa-eye"></i> View Profile
                        </a>
                        <a href="{{ url('/instructor/messages/2') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-envelope"></i> Message
                        </a>
                        <a href="{{ url('/instructor/gradebook?student=2') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-chart-bar"></i> View Grades
                        </a>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-file-alt"></i> Reports
                        </button>
                    </div>
                </div>

                <!-- Student 3 -->
                <div class="student-card">
                    <div class="student-header">
                        <div class="student-avatar-large">MB</div>
                        <div class="student-info">
                            <div class="student-name">Michael Brown</div>
                            <div class="student-id">Student ID: 2024003 • Computer Science</div>
                        </div>
                        <span class="badge bg-info performance-badge">Good</span>
                    </div>
                    
                    <div class="student-details">
                        <div class="detail-item">
                            <i class="fas fa-book"></i>
                            <div>
                                <div class="detail-label">Courses</div>
                                <div class="detail-value">1 (CS 201)</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-chart-line"></i>
                            <div>
                                <div class="detail-label">Average Grade</div>
                                <div class="detail-value">84%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clipboard-check"></i>
                            <div>
                                <div class="detail-label">Attendance</div>
                                <div class="detail-value">92%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Assignments</div>
                                <div class="detail-value">13/14 Submitted</div>
                            </div>
                        </div>
                    </div>

                    <div class="student-actions">
                        <a href="{{ url('/instructor/students/3') }}" class="btn btn-yellow btn-sm">
                            <i class="fas fa-eye"></i> View Profile
                        </a>
                        <a href="{{ url('/instructor/messages/3') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-envelope"></i> Message
                        </a>
                        <a href="{{ url('/instructor/gradebook?student=3') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-chart-bar"></i> View Grades
                        </a>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-file-alt"></i> Reports
                        </button>
                    </div>
                </div>

                <!-- Student 4 -->
                <div class="student-card">
                    <div class="student-header">
                        <div class="student-avatar-large">SD</div>
                        <div class="student-info">
                            <div class="student-name">Sarah Davis</div>
                            <div class="student-id">Student ID: 2024004 • Computer Science</div>
                        </div>
                        <span class="badge bg-warning performance-badge">Average</span>
                    </div>
                    
                    <div class="student-details">
                        <div class="detail-item">
                            <i class="fas fa-book"></i>
                            <div>
                                <div class="detail-label">Courses</div>
                                <div class="detail-value">2 (CS 301, CS 201)</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-chart-line"></i>
                            <div>
                                <div class="detail-label">Average Grade</div>
                                <div class="detail-value">76%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clipboard-check"></i>
                            <div>
                                <div class="detail-label">Attendance</div>
                                <div class="detail-value">88%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Assignments</div>
                                <div class="detail-value">28/34 Submitted</div>
                            </div>
                        </div>
                    </div>

                    <div class="student-actions">
                        <a href="{{ url('/instructor/students/4') }}" class="btn btn-yellow btn-sm">
                            <i class="fas fa-eye"></i> View Profile
                        </a>
                        <a href="{{ url('/instructor/messages/4') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-envelope"></i> Message
                        </a>
                        <a href="{{ url('/instructor/gradebook?student=4') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-chart-bar"></i> View Grades
                        </a>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-file-alt"></i> Reports
                        </button>
                    </div>
                </div>

                <!-- Student 5 -->
                <div class="student-card">
                    <div class="student-header">
                        <div class="student-avatar-large">DW</div>
                        <div class="student-info">
                            <div class="student-name">David Wilson</div>
                            <div class="student-id">Student ID: 2024005 • Computer Science</div>
                        </div>
                        <span class="badge bg-danger performance-badge">At Risk</span>
                    </div>
                    
                    <div class="student-details">
                        <div class="detail-item">
                            <i class="fas fa-book"></i>
                            <div>
                                <div class="detail-label">Courses</div>
                                <div class="detail-value">1 (CS 301)</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-chart-line"></i>
                            <div>
                                <div class="detail-label">Average Grade</div>
                                <div class="detail-value">64%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clipboard-check"></i>
                            <div>
                                <div class="detail-label">Attendance</div>
                                <div class="detail-value">78%</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Assignments</div>
                                <div class="detail-value">14/20 Submitted</div>
                            </div>
                        </div>
                    </div>

                    <div class="student-actions">
                        <a href="{{ url('/instructor/students/5') }}" class="btn btn-yellow btn-sm">
                            <i class="fas fa-eye"></i> View Profile
                        </a>
                        <a href="{{ url('/instructor/messages/5') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-envelope"></i> Message
                        </a>
                        <a href="{{ url('/instructor/gradebook?student=5') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-chart-bar"></i> View Grades
                        </a>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-exclamation-triangle"></i> Intervention
                        </button>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing 5 of 156 students
                    </div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">32</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
