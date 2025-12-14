<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Transcript - CourseReg</title>
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
        
        .transcript-container {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border: 2px solid #e9ecef;
        }
        
        .transcript-header {
            text-align: center;
            border-bottom: 3px solid var(--primary-yellow);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .transcript-header h1 {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .transcript-header h3 {
            color: #666;
            font-weight: 600;
        }
        
        .student-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .info-label {
            font-weight: 600;
            color: #666;
        }
        
        .info-value {
            color: #333;
        }
        
        .semester-section {
            margin-bottom: 30px;
        }
        
        .semester-header {
            background: var(--primary-yellow);
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
        
        .transcript-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .transcript-table th {
            background: #f8f9fa;
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-weight: 600;
            color: #666;
        }
        
        .transcript-table td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            color: #333;
        }
        
        .transcript-table tr:hover {
            background: var(--light-yellow);
        }
        
        .gpa-summary {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            padding: 25px;
            border-radius: 10px;
            margin-top: 30px;
            text-align: center;
        }
        
        .gpa-summary h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .gpa-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        
        .gpa-stat {
            text-align: center;
        }
        
        .gpa-stat .value {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }
        
        .gpa-stat .label {
            color: #555;
            font-weight: 600;
        }
        
        .download-options {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .btn-yellow {
            background: var(--primary-yellow);
            color: #333;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-yellow:hover {
            background: var(--dark-yellow);
            transform: translateY(-2px);
            color: #333;
        }
        
        @media print {
            .sidebar, .download-options, .top-bar, .no-print {
                display: none !important;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .transcript-container {
                border: none;
                box-shadow: none;
            }
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
        <div class="top-bar no-print">
            <h4 class="mb-0"><i class="fas fa-file-alt"></i> Academic Transcript</h4>
            <small class="text-muted">Official transcript for {{ auth()->user()->name }}</small>
        </div>

        <!-- Download Options -->
        <div class="download-options no-print">
            <h5 class="mb-3"><i class="fas fa-download"></i> Download Options</h5>
            <div class="d-flex gap-3">
                <button onclick="window.print()" class="btn btn-yellow">
                    <i class="fas fa-print"></i> Print Transcript
                </button>
                <button onclick="downloadPDF()" class="btn btn-outline-secondary">
                    <i class="fas fa-file-pdf"></i> Download as PDF
                </button>
                <a href="{{ route('student.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Transcript -->
        <div class="transcript-container" id="transcript">
            <!-- Header -->
            <div class="transcript-header">
                <h1>OFFICIAL ACADEMIC TRANSCRIPT</h1>
                <h3>University Course Registration System</h3>
                <p class="text-muted mb-0">123 University Ave, College Town, ST 12345</p>
            </div>

            <!-- Student Information -->
            <div class="student-info">
                <h5 class="mb-3"><i class="fas fa-user"></i> Student Information</h5>
                <div class="info-row">
                    <span class="info-label">Student Name:</span>
                    <span class="info-value">{{ auth()->user()->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Student ID:</span>
                    <span class="info-value">2023-00123</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ auth()->user()->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Program:</span>
                    <span class="info-value">Bachelor of Science in Computer Science</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date of Issue:</span>
                    <span class="info-value">{{ date('F d, Y') }}</span>
                </div>
            </div>

            <!-- Academic Record -->
            <h5 class="mb-3"><i class="fas fa-book-open"></i> Academic Record</h5>

            <!-- Fall 2025 Semester -->
            <div class="semester-section">
                <div class="semester-header">
                    Fall 2025
                </div>
                
                <table class="transcript-table">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Units</th>
                            <th>Grade</th>
                            <th>Grade Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            @php
                                $grades = ['A', 'A-', 'B+', 'B', 'B-'];
                                $grade = $grades[array_rand($grades)];
                                $gradePoints = [
                                    'A' => 4.0, 'A-' => 3.7,
                                    'B+' => 3.3, 'B' => 3.0, 'B-' => 2.7,
                                ];
                                $points = $gradePoints[$grade];
                            @endphp
                            <tr>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->course_name }}</td>
                                <td>{{ $course->units }}</td>
                                <td><strong>{{ $grade }}</strong></td>
                                <td>{{ number_format($points, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="text-end mb-3">
                    <strong>Semester Units: {{ $courses->sum('units') }}</strong> | 
                    <strong>Semester GPA: 3.75</strong>
                </div>
            </div>

            <!-- GPA Summary -->
            <div class="gpa-summary">
                <h2><i class="fas fa-award"></i> Academic Summary</h2>
                <div class="gpa-stats">
                    <div class="gpa-stat">
                        <div class="value">{{ $courses->sum('units') }}</div>
                        <div class="label">Total Units Earned</div>
                    </div>
                    <div class="gpa-stat">
                        <div class="value">3.85</div>
                        <div class="label">Cumulative GPA</div>
                    </div>
                    <div class="gpa-stat">
                        <div class="value">{{ $courses->count() }}</div>
                        <div class="label">Courses Completed</div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4 pt-4" style="border-top: 2px solid #e9ecef;">
                <p class="text-muted mb-1"><strong>This is an official transcript</strong></p>
                <p class="text-muted small">Generated on {{ date('F d, Y \a\t g:i A') }}</p>
                <p class="text-muted small">For verification purposes, contact the Registrar's Office</p>
            </div>
        </div>

        <!-- Legend -->
        <div class="transcript-container no-print">
            <h5 class="mb-3"><i class="fas fa-info-circle"></i> Grading Scale</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>A (4.0)</strong> - Excellent</p>
                    <p><strong>A- (3.7)</strong> - Excellent</p>
                    <p><strong>B+ (3.3)</strong> - Very Good</p>
                    <p><strong>B (3.0)</strong> - Good</p>
                </div>
                <div class="col-md-6">
                    <p><strong>B- (2.7)</strong> - Good</p>
                    <p><strong>C+ (2.3)</strong> - Satisfactory</p>
                    <p><strong>C (2.0)</strong> - Satisfactory</p>
                    <p><strong>F (0.0)</strong> - Fail</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            alert('PDF download functionality will be implemented with a PDF generation library. For now, please use the Print option and save as PDF.');
            window.print();
        }
    </script>
</body>
</html>
