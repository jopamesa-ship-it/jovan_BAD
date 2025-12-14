<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - CourseReg</title>
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
        
        .course-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: transform 0.3s;
            border-left: 5px solid var(--primary-yellow);
        }
        
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }
        
        .course-code {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
        }
        
        .course-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin: 5px 0;
        }
        
        .course-info {
            display: flex;
            gap: 20px;
            margin-top: 15px;
            flex-wrap: wrap;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }
        
        .info-item i {
            color: var(--primary-yellow);
        }
        
        .badge-yellow {
            background: var(--primary-yellow);
            color: #333;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .capacity-bar {
            background: #e9ecef;
            height: 8px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }
        
        .capacity-fill {
            background: var(--primary-yellow);
            height: 100%;
            transition: width 0.3s;
        }
        
        .capacity-text {
            font-size: 0.85rem;
            color: #666;
            margin-top: 5px;
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
        
        .btn-danger-custom {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-danger-custom:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
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
            <li><a href="{{ route('student.courses') }}" class="active"><i class="fas fa-book"></i> My Courses</a></li>
            <li><a href="{{ route('student.browse') }}"><i class="fas fa-search"></i> Browse Courses</a></li>
            <li><a href="{{ route('student.schedule') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
            <li><a href="{{ route('student.grades') }}"><i class="fas fa-chart-line"></i> Grades</a></li>
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
            <h4 class="mb-0"><i class="fas fa-book"></i> My Courses</h4>
            <small class="text-muted">View and manage your enrolled courses</small>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Courses List -->
        @if($courses->isEmpty())
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h3>No Courses Enrolled Yet</h3>
                <p class="text-muted">You haven't enrolled in any courses. Browse available courses to get started!</p>
                <a href="{{ route('student.browse') }}" class="btn btn-yellow mt-3">
                    <i class="fas fa-search"></i> Browse Courses
                </a>
            </div>
        @else
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Total Enrolled: <span class="badge-yellow">{{ $courses->count() }} Courses</span></h5>
                        <h5>Total Units: <span class="badge-yellow">{{ $courses->sum('units') }} Units</span></h5>
                    </div>
                </div>
            </div>

            @foreach($courses as $course)
                <div class="course-card">
                    <div class="course-header">
                        <div>
                            <div class="course-code">{{ $course->course_code }}</div>
                            <div class="course-title">{{ $course->course_name }}</div>
                        </div>
                        <span class="badge-yellow">{{ $course->units }} Units</span>
                    </div>
                    
                    <div class="course-info">
                        @if($course->instructor_name)
                            <div class="info-item">
                                <i class="fas fa-user"></i>
                                <span>{{ $course->instructor_name }}</span>
                            </div>
                        @endif
                        
                        @if($course->schedule)
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <span>{{ $course->schedule }}</span>
                            </div>
                        @endif
                        
                        @if($course->room)
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $course->room }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Course Capacity:</strong>
                            <span class="capacity-text">{{ $course->enrolled_count }} / {{ $course->capacity }} students enrolled</span>
                        </div>
                        <div class="capacity-bar">
                            <div class="capacity-fill" data-percentage="{{ min(100, round(($course->enrolled_count / $course->capacity) * 100, 2)) }}"></div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <form action="{{ route('course.drop', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to drop this course?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger-custom">
                                <i class="fas fa-times"></i> Drop Course
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set capacity bar widths on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.capacity-fill').forEach(function(bar) {
                const percentage = bar.getAttribute('data-percentage');
                if (percentage) {
                    bar.style.width = percentage + '%';
                }
            });
        });
    </script>
</body>
</html>
