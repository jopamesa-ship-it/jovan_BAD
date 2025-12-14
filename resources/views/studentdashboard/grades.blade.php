<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Grades - CourseReg</title>
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
        }
        
        .gpa-card {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            border-radius: 10px;
            padding: 30px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .gpa-card h1 {
            font-size: 4rem;
            margin: 10px 0;
            font-weight: bold;
        }
        
        .gpa-card p {
            font-size: 1.2rem;
            margin: 0;
        }
        
        .stat-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .stat-box h3 {
            color: var(--primary-yellow);
            font-size: 2rem;
            margin: 0;
        }
        
        .stat-box p {
            color: #666;
            margin: 5px 0 0;
        }
        
        .grades-container {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .course-grade-card {
            background: #f8f9fa;
            border-left: 5px solid var(--primary-yellow);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .course-grade-card:hover {
            background: var(--light-yellow);
            transform: translateX(5px);
        }
        
        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .course-code {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }
        
        .course-name {
            color: #666;
            font-size: 0.95rem;
        }
        
        .grade-badge {
            font-size: 2rem;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 10px;
            min-width: 80px;
            text-align: center;
        }
        
        .grade-A {
            background: #28a745;
            color: white;
        }
        
        .grade-B {
            background: #17a2b8;
            color: white;
        }
        
        .grade-C {
            background: #ffc107;
            color: #333;
        }
        
        .grade-D {
            background: #fd7e14;
            color: white;
        }
        
        .grade-F {
            background: #dc3545;
            color: white;
        }
        
        .grade-IP {
            background: #6c757d;
            color: white;
            font-size: 1.2rem;
        }
        
        .grade-details {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
        
        .grade-detail-item {
            text-align: center;
        }
        
        .grade-detail-item .label {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 5px;
        }
        
        .grade-detail-item .value {
            color: #333;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .semester-header {
            background: var(--primary-yellow);
            padding: 15px 20px;
            border-radius: 8px;
            margin: 30px 0 20px 0;
            font-weight: 600;
            color: #333;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--primary-yellow);
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .gpa-card h1 {
                font-size: 3rem;
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
            <li><a href="{{ route('student.grades') }}" class="active"><i class="fas fa-chart-line"></i> Grades</a></li>
            <li><a href="#"><i class="fas fa-bell"></i> Notifications</a></li>
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
            <h4 class="mb-0"><i class="fas fa-chart-line"></i> My Grades</h4>
            <small class="text-muted">Academic Performance Overview</small>
        </div>

        @if($courses->isEmpty())
            <div class="empty-state">
                <i class="fas fa-chart-bar"></i>
                <h3>No Grades Available</h3>
                <p class="text-muted">You haven't enrolled in any courses yet. Grades will appear here once you enroll and complete coursework.</p>
                <a href="{{ route('student.browse') }}" class="btn btn-yellow mt-3">
                    <i class="fas fa-search"></i> Browse Courses
                </a>
            </div>
        @else
            <!-- GPA Overview -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="gpa-card">
                        <p>Current GPA</p>
                        <h1>{{ number_format($gpa, 2) }}</h1>
                        <p>Out of 4.0</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="stat-box">
                                <h3>{{ $courses->count() }}</h3>
                                <p>Total Courses</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-box">
                                <h3>{{ $totalUnits }}</h3>
                                <p>Total Units</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-box">
                                <h3>{{ $completedCourses }}</h3>
                                <p>Completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Semester -->
            <div class="semester-header">
                <i class="fas fa-calendar-alt"></i> Fall 2025 - Current Semester
            </div>

            <div class="grades-container">
                @foreach($courses as $course)
                    @php
                        // Generate sample grades for demonstration
                        $grades = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'In Progress'];
                        $grade = $grades[array_rand($grades)];
                        
                        // Determine grade class
                        $gradeClass = 'grade-IP';
                        if(strpos($grade, 'A') !== false) $gradeClass = 'grade-A';
                        elseif(strpos($grade, 'B') !== false) $gradeClass = 'grade-B';
                        elseif(strpos($grade, 'C') !== false) $gradeClass = 'grade-C';
                        elseif(strpos($grade, 'D') !== false) $gradeClass = 'grade-D';
                        elseif(strpos($grade, 'F') !== false) $gradeClass = 'grade-F';
                        
                        // Calculate points
                        $gradePoints = [
                            'A' => 4.0, 'A-' => 3.7,
                            'B+' => 3.3, 'B' => 3.0, 'B-' => 2.7,
                            'C+' => 2.3, 'C' => 2.0, 'C-' => 1.7,
                            'D+' => 1.3, 'D' => 1.0, 'D-' => 0.7,
                            'F' => 0.0
                        ];
                        $points = isset($gradePoints[$grade]) ? $gradePoints[$grade] : null;
                    @endphp
                    
                    <div class="course-grade-card">
                        <div class="course-header">
                            <div>
                                <div class="course-code">{{ $course->course_code }}</div>
                                <div class="course-name">{{ $course->course_name }}</div>
                            </div>
                            <div class="grade-badge {{ $gradeClass }}">
                                {{ $grade }}
                            </div>
                        </div>
                        
                        <div class="grade-details">
                            <div class="grade-detail-item">
                                <div class="label">Units</div>
                                <div class="value">{{ $course->units }}</div>
                            </div>
                            <div class="grade-detail-item">
                                <div class="label">Grade Points</div>
                                <div class="value">{{ $points !== null ? number_format($points, 1) : 'N/A' }}</div>
                            </div>
                            <div class="grade-detail-item">
                                <div class="label">Instructor</div>
                                <div class="value">{{ $course->instructor_name }}</div>
                            </div>
                            <div class="grade-detail-item">
                                <div class="label">Status</div>
                                <div class="value">{{ $grade === 'In Progress' ? 'Active' : 'Complete' }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Grade Distribution Chart -->
            <div class="grades-container">
                <h5 class="mb-3"><i class="fas fa-chart-pie"></i> Grade Distribution</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-around align-items-end" style="height: 200px; border-bottom: 2px solid #ddd;">
                            <div class="text-center" style="width: 15%;">
                                <div style="background: #28a745; height: 150px; border-radius: 5px 5px 0 0; margin-bottom: 10px;"></div>
                                <strong>A</strong>
                                <div class="text-muted small">40%</div>
                            </div>
                            <div class="text-center" style="width: 15%;">
                                <div style="background: #17a2b8; height: 120px; border-radius: 5px 5px 0 0; margin-bottom: 10px;"></div>
                                <strong>B</strong>
                                <div class="text-muted small">35%</div>
                            </div>
                            <div class="text-center" style="width: 15%;">
                                <div style="background: #ffc107; height: 80px; border-radius: 5px 5px 0 0; margin-bottom: 10px;"></div>
                                <strong>C</strong>
                                <div class="text-muted small">20%</div>
                            </div>
                            <div class="text-center" style="width: 15%;">
                                <div style="background: #6c757d; height: 60px; border-radius: 5px 5px 0 0; margin-bottom: 10px;"></div>
                                <strong>IP</strong>
                                <div class="text-muted small">5%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- GPA Trend -->
            <div class="grades-container">
                <h5 class="mb-3"><i class="fas fa-chart-line"></i> GPA Trend</h5>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Your GPA has improved by <strong>0.15 points</strong> compared to last semester!
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
