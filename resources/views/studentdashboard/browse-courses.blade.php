<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Courses - CourseReg</title>
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
        
        .search-box {
            background: white;
            padding: 20px;
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
        
        .badge-success {
            background: #28a745;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .badge-danger {
            background: #dc3545;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .badge-enrolled {
            background: #17a2b8;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
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
        
        .capacity-fill.full {
            background: #dc3545;
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
            color: #333;
        }
        
        .btn-yellow:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
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
            <li><a href="{{ route('student.browse') }}" class="active"><i class="fas fa-search"></i> Browse Courses</a></li>
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
            <h4 class="mb-0"><i class="fas fa-search"></i> Browse Courses</h4>
            <small class="text-muted">Discover and enroll in available courses</small>
        </div>

        <!-- Search Box -->
        <div class="search-box">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search courses by name or code...">
                </div>
                <div class="col-md-4">
                    <select class="form-select" id="filterSelect">
                        <option value="all">All Courses</option>
                        <option value="available">Available Only</option>
                        <option value="enrolled">Already Enrolled</option>
                        <option value="full">Full</option>
                    </select>
                </div>
            </div>
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

        <!-- Summary -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Available Courses: <span class="badge-yellow">{{ $courses->count() }} Total</span></h5>
                </div>
            </div>
        </div>

        <!-- Courses List -->
        <div id="coursesList">
            @foreach($courses as $course)
                @php
                    $isEnrolled = auth()->user()->courses()->where('course_id', $course->id)->exists();
                    $isFull = $course->enrolled_count >= $course->capacity;
                    $percentage = ($course->enrolled_count / $course->capacity) * 100;
                @endphp
                
                <div class="course-card" data-enrolled="{{ $isEnrolled ? 'true' : 'false' }}" data-full="{{ $isFull ? 'true' : 'false' }}">
                    <div class="course-header">
                        <div>
                            <div class="course-code">{{ $course->course_code }}</div>
                            <div class="course-title">{{ $course->course_name }}</div>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="badge-yellow">{{ $course->units }} Units</span>
                            @if($isEnrolled)
                                <span class="badge-enrolled">Enrolled</span>
                            @elseif($isFull)
                                <span class="badge-danger">Full</span>
                            @else
                                <span class="badge-success">Available</span>
                            @endif
                        </div>
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
                            <span class="capacity-text">
                                {{ $course->enrolled_count }} / {{ $course->capacity }} students enrolled
                                @if(!$isFull)
                                    ({{ $course->capacity - $course->enrolled_count }} slots available)
                                @endif
                            </span>
                        </div>
                        <div class="capacity-bar">
                            <div class="capacity-fill @if($isFull) full @endif" data-percentage="{{ min(100, round($percentage, 2)) }}"></div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        @if($isEnrolled)
                            <button class="btn btn-secondary" disabled>
                                <i class="fas fa-check"></i> Already Enrolled
                            </button>
                            <a href="{{ route('student.courses') }}" class="btn btn-outline-primary">
                                <i class="fas fa-eye"></i> View in My Courses
                            </a>
                        @elseif($isFull)
                            <button class="btn btn-yellow" disabled>
                                <i class="fas fa-times"></i> Course Full
                            </button>
                        @else
                            <form action="{{ route('course.enroll', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-yellow" onclick="return confirm('Are you sure you want to enroll in {{ $course->course_name }}?');">
                                    <i class="fas fa-plus"></i> Enroll Now
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
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

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', filterCourses);
        document.getElementById('filterSelect').addEventListener('change', filterCourses);

        function filterCourses() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const filterValue = document.getElementById('filterSelect').value;
            const courses = document.querySelectorAll('.course-card');

            courses.forEach(course => {
                const courseText = course.textContent.toLowerCase();
                const isEnrolled = course.getAttribute('data-enrolled') === 'true';
                const isFull = course.getAttribute('data-full') === 'true';
                
                let matchesSearch = courseText.includes(searchTerm);
                let matchesFilter = true;

                if (filterValue === 'available') {
                    matchesFilter = !isEnrolled && !isFull;
                } else if (filterValue === 'enrolled') {
                    matchesFilter = isEnrolled;
                } else if (filterValue === 'full') {
                    matchesFilter = isFull;
                }

                if (matchesSearch && matchesFilter) {
                    course.style.display = '';
                } else {
                    course.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
