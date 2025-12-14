<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Schedule - CourseReg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #fbbf24;
            --primary-dark: #f59e0b;
            --primary-light: #fcd34d;
            --primary-yellow: #fbbf24;
            --dark-yellow: #f59e0b;
            --light-yellow: #fffbeb;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light-yellow);
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
        
        .schedule-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow-x: auto;
        }
        
        .schedule-table {
            width: 100%;
            min-width: 800px;
            border-collapse: collapse;
        }
        
        .schedule-table th {
            background: var(--primary-yellow);
            color: #333;
            padding: 15px 10px;
            text-align: center;
            font-weight: 600;
            border: 1px solid #ddd;
        }
        
        .schedule-table td {
            border: 1px solid #ddd;
            padding: 10px;
            vertical-align: top;
            height: 80px;
            position: relative;
        }
        
        .time-slot {
            background: #f8f9fa;
            font-weight: 600;
            color: #666;
            text-align: center;
        }
        
        .course-block {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 5px;
            cursor: pointer;
            transition: transform 0.2s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .course-block:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        
        .course-code {
            font-weight: bold;
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 3px;
        }
        
        .course-room {
            font-size: 0.75rem;
            color: #555;
        }
        
        .course-instructor {
            font-size: 0.75rem;
            color: #555;
            font-style: italic;
        }
        
        .calendar-view {
            display: block;
        }
        
        .list-view {
            display: none;
        }
        
        .calendar-view.active {
            display: block !important;
        }
        
        .list-view.active {
            display: block !important;
        }
        
        .course-card {
            background: white;
            border-left: 5px solid var(--primary-yellow);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .course-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .day-header {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
            margin-top: 20px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-yellow);
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
        
        .btn-yellow.active {
            background: var(--dark-yellow);
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
            
            .schedule-table {
                font-size: 0.85rem;
            }
            
            .course-block {
                padding: 5px;
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
            <li><a href="{{ route('student.schedule') }}" class="active"><i class="fas fa-calendar"></i> Schedule</a></li>
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
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0"><i class="fas fa-calendar"></i> My Schedule</h4>
                    <small class="text-muted">Fall 2025 - Week View</small>
                </div>
                <div>
                    <button class="btn btn-yellow" id="calendarViewBtn" onclick="toggleView('calendar')">
                        <i class="fas fa-calendar-alt"></i> Calendar View
                    </button>
                    <button class="btn btn-outline-secondary" id="listViewBtn" onclick="toggleView('list')">
                        <i class="fas fa-list"></i> List View
                    </button>
                </div>
            </div>
        </div>

        @if($courses->isEmpty())
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <h3>No Schedule Yet</h3>
                <p class="text-muted">You haven't enrolled in any courses. Browse and enroll in courses to build your schedule!</p>
                <a href="{{ route('student.browse') }}" class="btn btn-yellow mt-3">
                    <i class="fas fa-search"></i> Browse Courses
                </a>
            </div>
        @else
            <!-- Calendar View -->
            <div class="calendar-view active">
                <div class="schedule-container">
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $timeSlots = [
                                    '8:00 AM',
                                    '9:00 AM',
                                    '10:00 AM',
                                    '11:00 AM',
                                    '12:00 PM',
                                    '1:00 PM',
                                    '2:00 PM',
                                    '3:00 PM',
                                    '4:00 PM',
                                    '5:00 PM',
                                ];
                                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                                $schedule = [];
                                
                                foreach($courses as $course) {
                                    if($course->schedule) {
                                        preg_match('/([MTWF]+)\s+(\d+:\d+\s*[AP]M)/i', $course->schedule, $matches);
                                        if(count($matches) >= 3) {
                                            $daysStr = $matches[1];
                                            $time = $matches[2];
                                            
                                            if(strpos($daysStr, 'M') !== false && strpos($daysStr, 'W') === false) {
                                                $schedule['Monday'][$time][] = $course;
                                            }
                                            if(strpos($daysStr, 'T') !== false && strpos($daysStr, 'h') === false) {
                                                $schedule['Tuesday'][] = $course;
                                            }
                                            if(strpos($daysStr, 'W') !== false) {
                                                $schedule['Wednesday'][$time][] = $course;
                                            }
                                            if(strpos($daysStr, 'Th') !== false || strpos($daysStr, 'T') !== false && strpos($daysStr, 'h') !== false) {
                                                $schedule['Thursday'][$time][] = $course;
                                            }
                                            if(strpos($daysStr, 'F') !== false) {
                                                $schedule['Friday'][$time][] = $course;
                                            }
                                            
                                            // Handle MWF
                                            if(strpos($daysStr, 'MWF') !== false || (strpos($daysStr, 'M') !== false && strpos($daysStr, 'W') !== false && strpos($daysStr, 'F') !== false)) {
                                                $schedule['Monday'][$time][] = $course;
                                                $schedule['Wednesday'][$time][] = $course;
                                                $schedule['Friday'][$time][] = $course;
                                            }
                                            // Handle MW
                                            if(strpos($daysStr, 'MW') !== false && strpos($daysStr, 'F') === false) {
                                                $schedule['Monday'][$time][] = $course;
                                                $schedule['Wednesday'][$time][] = $course;
                                            }
                                            // Handle TTh
                                            if(strpos($daysStr, 'TTh') !== false || strpos($daysStr, 'TuTh') !== false) {
                                                $schedule['Tuesday'][$time][] = $course;
                                                $schedule['Thursday'][$time][] = $course;
                                            }
                                        }
                                    }
                                }
                            @endphp
                            
                            @foreach($timeSlots as $time)
                                <tr>
                                    <td class="time-slot">{{ $time }}</td>
                                    @foreach($days as $day)
                                        <td>
                                            @if(isset($schedule[$day][$time]))
                                                @foreach($schedule[$day][$time] as $course)
                                                    <div class="course-block">
                                                        <div class="course-code">{{ $course->course_code }}</div>
                                                        <div class="course-room">{{ $course->room }}</div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- List View -->
            <div class="list-view">
                <div class="schedule-container">
                    @php
                        $daySchedule = [
                            'Monday' => [],
                            'Tuesday' => [],
                            'Wednesday' => [],
                            'Thursday' => [],
                            'Friday' => [],
                        ];
                        
                        foreach($courses as $course) {
                            if($course->schedule) {
                                if(strpos($course->schedule, 'MWF') !== false) {
                                    $daySchedule['Monday'][] = $course;
                                    $daySchedule['Wednesday'][] = $course;
                                    $daySchedule['Friday'][] = $course;
                                } elseif(strpos($course->schedule, 'TTh') !== false) {
                                    $daySchedule['Tuesday'][] = $course;
                                    $daySchedule['Thursday'][] = $course;
                                } elseif(strpos($course->schedule, 'MW') !== false) {
                                    $daySchedule['Monday'][] = $course;
                                    $daySchedule['Wednesday'][] = $course;
                                }
                            }
                        }
                    @endphp
                    
                    @foreach($daySchedule as $day => $dayCourses)
                        @if(count($dayCourses) > 0)
                            <div class="day-header">
                                <i class="fas fa-calendar-day"></i> {{ $day }}
                            </div>
                            
                            @foreach($dayCourses as $course)
                                <div class="course-card">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="mb-2">{{ $course->course_code }} - {{ $course->course_name }}</h5>
                                            <div class="mb-1">
                                                <i class="fas fa-clock text-warning"></i> {{ $course->schedule }}
                                            </div>
                                            <div class="mb-1">
                                                <i class="fas fa-map-marker-alt text-warning"></i> {{ $course->room }}
                                            </div>
                                            <div>
                                                <i class="fas fa-user text-warning"></i> {{ $course->instructor_name }}
                                            </div>
                                        </div>
                                        <span class="badge bg-warning text-dark">{{ $course->units }} Units</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Summary -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="schedule-container">
                        <h5 class="mb-3"><i class="fas fa-info-circle"></i> Schedule Summary</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center p-3 bg-light rounded">
                                    <h3 class="text-warning">{{ $courses->count() }}</h3>
                                    <p class="mb-0 text-muted">Total Courses</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 bg-light rounded">
                                    <h3 class="text-warning">{{ $courses->sum('units') }}</h3>
                                    <p class="mb-0 text-muted">Total Units</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 bg-light rounded">
                                    <h3 class="text-warning">Fall 2025</h3>
                                    <p class="mb-0 text-muted">Current Semester</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleView(view) {
            const calendarView = document.querySelector('.calendar-view');
            const listView = document.querySelector('.list-view');
            const calendarBtn = document.getElementById('calendarViewBtn');
            const listBtn = document.getElementById('listViewBtn');
            
            if(view === 'calendar') {
                calendarView.classList.add('active');
                calendarView.style.display = 'block';
                listView.classList.remove('active');
                listView.style.display = 'none';
                
                calendarBtn.classList.remove('btn-outline-secondary');
                calendarBtn.classList.add('btn-yellow');
                listBtn.classList.remove('btn-yellow');
                listBtn.classList.add('btn-outline-secondary');
            } else {
                listView.classList.add('active');
                listView.style.display = 'block';
                calendarView.classList.remove('active');
                calendarView.style.display = 'none';
                
                listBtn.classList.remove('btn-outline-secondary');
                listBtn.classList.add('btn-yellow');
                calendarBtn.classList.remove('btn-yellow');
                calendarBtn.classList.add('btn-outline-secondary');
            }
        }
    </script>
</body>
</html>
