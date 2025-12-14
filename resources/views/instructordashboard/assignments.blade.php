<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments - Instructor Dashboard</title>
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
        
        .assignment-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border-left: 4px solid var(--primary-yellow);
            transition: all 0.3s;
        }
        
        .assignment-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .assignment-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }
        
        .assignment-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .assignment-course {
            color: #666;
            font-size: 0.95rem;
        }
        
        .assignment-details {
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
        
        .assignment-actions {
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
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .progress-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: conic-gradient(var(--primary-yellow) 0deg, var(--primary-yellow) var(--progress), #e9ecef var(--progress), #e9ecef 360deg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            position: relative;
        }
        
        .progress-circle::before {
            content: '';
            position: absolute;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: white;
        }
        
        .progress-circle span {
            position: relative;
            z-index: 1;
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
            <li><a href="{{ url('/instructor/assignments') }}" class="active"><i class="fas fa-clipboard-list"></i> Assignments</a></li>
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
                <h5 class="mb-0">Assignments</h5>
                <small class="text-muted">Manage course assignments and submissions</small>
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
                    <h2><i class="fas fa-clipboard-list"></i> Assignments</h2>
                    <p>You have 45 total assignments across 4 courses</p>
                </div>
                <a href="{{ url('/instructor/assignments/create') }}" class="btn btn-yellow">
                    <i class="fas fa-plus"></i> Create New Assignment
                </a>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="stats-overview">
            <div class="stat-box">
                <i class="fas fa-clipboard-list"></i>
                <h3>45</h3>
                <p>Total Assignments</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-hourglass-half"></i>
                <h3>12</h3>
                <p>Pending Grading</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-check-circle"></i>
                <h3>325</h3>
                <p>Submissions Today</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-clock"></i>
                <h3>8</h3>
                <p>Due This Week</p>
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
                        <option selected>All Status</option>
                        <option>Active</option>
                        <option>Upcoming</option>
                        <option>Past Due</option>
                        <option>Completed</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search assignments...">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Assignments List -->
        <div class="row">
            <div class="col-12">
                <!-- Assignment 1 -->
                <div class="assignment-card">
                    <div class="assignment-header">
                        <div>
                            <div class="assignment-title">BST Implementation</div>
                            <div class="assignment-course">CS 301 - Data Structures & Algorithms</div>
                        </div>
                        <span class="badge bg-danger status-badge">Pending Review</span>
                    </div>
                    
                    <div class="assignment-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <div class="detail-label">Due Date</div>
                                <div class="detail-value">Dec 5, 2025</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <div class="detail-label">Submissions</div>
                                <div class="detail-value">38/45 Students</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Graded</div>
                                <div class="detail-value">26/38 Submissions</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <div class="detail-label">Points</div>
                                <div class="detail-value">100 Points</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="assignment-actions">
                            <a href="{{ url('/instructor/assignments/1/submissions') }}" class="btn btn-yellow btn-sm">
                                <i class="fas fa-eye"></i> View Submissions
                            </a>
                            <a href="{{ url('/instructor/assignments/1/grade') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-clipboard-check"></i> Grade (12 Pending)
                            </a>
                            <a href="{{ url('/instructor/assignments/1/edit') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-outline-info btn-sm">
                                <i class="fas fa-chart-bar"></i> Statistics
                            </button>
                        </div>
                        <div class="progress-circle" style="--progress: 246deg;">
                            <span>68%</span>
                        </div>
                    </div>
                </div>

                <!-- Assignment 2 -->
                <div class="assignment-card">
                    <div class="assignment-header">
                        <div>
                            <div class="assignment-title">Sorting Algorithms Analysis</div>
                            <div class="assignment-course">CS 401 - Advanced Algorithms</div>
                        </div>
                        <span class="badge bg-warning status-badge">Due Soon</span>
                    </div>
                    
                    <div class="assignment-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <div class="detail-label">Due Date</div>
                                <div class="detail-value">Dec 3, 2025</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <div class="detail-label">Submissions</div>
                                <div class="detail-value">28/32 Students</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Graded</div>
                                <div class="detail-value">20/28 Submissions</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <div class="detail-label">Points</div>
                                <div class="detail-value">150 Points</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="assignment-actions">
                            <a href="{{ url('/instructor/assignments/2/submissions') }}" class="btn btn-yellow btn-sm">
                                <i class="fas fa-eye"></i> View Submissions
                            </a>
                            <a href="{{ url('/instructor/assignments/2/grade') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-clipboard-check"></i> Grade (8 Pending)
                            </a>
                            <a href="{{ url('/instructor/assignments/2/edit') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-outline-info btn-sm">
                                <i class="fas fa-chart-bar"></i> Statistics
                            </button>
                        </div>
                        <div class="progress-circle" style="--progress: 252deg;">
                            <span>71%</span>
                        </div>
                    </div>
                </div>

                <!-- Assignment 3 -->
                <div class="assignment-card">
                    <div class="assignment-header">
                        <div>
                            <div class="assignment-title">Final Project - Course Management System</div>
                            <div class="assignment-course">CS 201 - Introduction to Programming</div>
                        </div>
                        <span class="badge bg-success status-badge">Active</span>
                    </div>
                    
                    <div class="assignment-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <div class="detail-label">Due Date</div>
                                <div class="detail-value">Dec 15, 2025</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <div class="detail-label">Submissions</div>
                                <div class="detail-value">12/52 Students</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Graded</div>
                                <div class="detail-value">5/12 Submissions</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <div class="detail-label">Points</div>
                                <div class="detail-value">200 Points</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="assignment-actions">
                            <a href="{{ url('/instructor/assignments/3/submissions') }}" class="btn btn-yellow btn-sm">
                                <i class="fas fa-eye"></i> View Submissions
                            </a>
                            <a href="{{ url('/instructor/assignments/3/grade') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-clipboard-check"></i> Grade (7 Pending)
                            </a>
                            <a href="{{ url('/instructor/assignments/3/edit') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-outline-info btn-sm">
                                <i class="fas fa-chart-bar"></i> Statistics
                            </button>
                        </div>
                        <div class="progress-circle" style="--progress: 83deg;">
                            <span>23%</span>
                        </div>
                    </div>
                </div>

                <!-- Assignment 4 -->
                <div class="assignment-card">
                    <div class="assignment-header">
                        <div>
                            <div class="assignment-title">Midterm Exam</div>
                            <div class="assignment-course">CS 301 - Data Structures & Algorithms</div>
                        </div>
                        <span class="badge bg-info status-badge">Completed</span>
                    </div>
                    
                    <div class="assignment-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <div class="detail-label">Due Date</div>
                                <div class="detail-value">Nov 28, 2025</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <div class="detail-label">Submissions</div>
                                <div class="detail-value">45/45 Students</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Graded</div>
                                <div class="detail-value">45/45 Submissions</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <div class="detail-label">Points</div>
                                <div class="detail-value">100 Points</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="assignment-actions">
                            <a href="{{ url('/instructor/assignments/4/submissions') }}" class="btn btn-yellow btn-sm">
                                <i class="fas fa-eye"></i> View Submissions
                            </a>
                            <button class="btn btn-outline-success btn-sm">
                                <i class="fas fa-check-circle"></i> All Graded
                            </button>
                            <button class="btn btn-outline-info btn-sm">
                                <i class="fas fa-chart-bar"></i> Statistics
                            </button>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>
                        <div class="progress-circle" style="--progress: 360deg;">
                            <span>100%</span>
                        </div>
                    </div>
                </div>

                <!-- Assignment 5 -->
                <div class="assignment-card">
                    <div class="assignment-header">
                        <div>
                            <div class="assignment-title">Database Normalization Exercise</div>
                            <div class="assignment-course">CS 350 - Database Systems</div>
                        </div>
                        <span class="badge bg-secondary status-badge">Upcoming</span>
                    </div>
                    
                    <div class="assignment-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <div class="detail-label">Due Date</div>
                                <div class="detail-value">Dec 10, 2025</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <div class="detail-label">Submissions</div>
                                <div class="detail-value">0/27 Students</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-tasks"></i>
                            <div>
                                <div class="detail-label">Graded</div>
                                <div class="detail-value">0/0 Submissions</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <div class="detail-label">Points</div>
                                <div class="detail-value">75 Points</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="assignment-actions">
                            <a href="{{ url('/instructor/assignments/5/submissions') }}" class="btn btn-yellow btn-sm">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                            <a href="{{ url('/instructor/assignments/5/edit') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                        <div class="progress-circle" style="--progress: 0deg;">
                            <span>0%</span>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing 5 of 45 assignments
                    </div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">9</a></li>
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
