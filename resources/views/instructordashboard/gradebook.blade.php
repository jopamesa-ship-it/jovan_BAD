<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Book - Instructor Dashboard</title>
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
        
        .grade-table-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .table-header {
            background: var(--light-yellow);
            padding: 20px;
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
        
        .grade-table {
            width: 100%;
        }
        
        .grade-table th {
            background: var(--light-yellow);
            color: #333;
            font-weight: 600;
            padding: 12px;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .grade-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        
        .grade-table tbody tr:hover {
            background: #f8f9fa;
        }
        
        .grade-input {
            width: 70px;
            text-align: center;
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
            <li><a href="{{ url('/instructor/gradebook') }}" class="active"><i class="fas fa-chart-bar"></i> Grade Book</a></li>
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
                <h5 class="mb-0">Grade Book</h5>
                <small class="text-muted">View and manage student grades</small>
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
                    <h2><i class="fas fa-chart-bar"></i> Grade Book</h2>
                    <p>CS 301 - Data Structures & Algorithms</p>
                </div>
                <div>
                    <select class="form-select mb-2">
                        <option selected>CS 301</option>
                        <option>CS 401</option>
                        <option>CS 201</option>
                        <option>CS 350</option>
                    </select>
                    <button class="btn btn-yellow">
                        <i class="fas fa-download"></i> Export Grades
                    </button>
                </div>
            </div>
        </div>

        <!-- Grade Table -->
        <div class="grade-table-card">
            <div class="table-header">
                <h5 class="mb-0">Student Grades</h5>
            </div>
            <div class="table-responsive">
                <table class="grade-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student ID</th>
                            <th>Assignment 1</th>
                            <th>Assignment 2</th>
                            <th>Midterm</th>
                            <th>Assignment 3</th>
                            <th>Final</th>
                            <th>Total</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>John Martinez</strong></td>
                            <td>2024001</td>
                            <td><input type="number" class="form-control grade-input" value="95"></td>
                            <td><input type="number" class="form-control grade-input" value="88"></td>
                            <td><input type="number" class="form-control grade-input" value="92"></td>
                            <td><input type="number" class="form-control grade-input" value="90"></td>
                            <td><input type="number" class="form-control grade-input" value=""></td>
                            <td><strong>91.25%</strong></td>
                            <td><span class="badge bg-success">A</span></td>
                            <td><button class="btn btn-sm btn-yellow">Save</button></td>
                        </tr>
                        <tr>
                            <td><strong>Emily Chen</strong></td>
                            <td>2024002</td>
                            <td><input type="number" class="form-control grade-input" value="98"></td>
                            <td><input type="number" class="form-control grade-input" value="95"></td>
                            <td><input type="number" class="form-control grade-input" value="96"></td>
                            <td><input type="number" class="form-control grade-input" value="94"></td>
                            <td><input type="number" class="form-control grade-input" value=""></td>
                            <td><strong>95.75%</strong></td>
                            <td><span class="badge bg-success">A</span></td>
                            <td><button class="btn btn-sm btn-yellow">Save</button></td>
                        </tr>
                        <tr>
                            <td><strong>Michael Brown</strong></td>
                            <td>2024003</td>
                            <td><input type="number" class="form-control grade-input" value="82"></td>
                            <td><input type="number" class="form-control grade-input" value="85"></td>
                            <td><input type="number" class="form-control grade-input" value="80"></td>
                            <td><input type="number" class="form-control grade-input" value="87"></td>
                            <td><input type="number" class="form-control grade-input" value=""></td>
                            <td><strong>83.5%</strong></td>
                            <td><span class="badge bg-info">B</span></td>
                            <td><button class="btn btn-sm btn-yellow">Save</button></td>
                        </tr>
                        <tr>
                            <td><strong>Sarah Davis</strong></td>
                            <td>2024004</td>
                            <td><input type="number" class="form-control grade-input" value="75"></td>
                            <td><input type="number" class="form-control grade-input" value="78"></td>
                            <td><input type="number" class="form-control grade-input" value="72"></td>
                            <td><input type="number" class="form-control grade-input" value="80"></td>
                            <td><input type="number" class="form-control grade-input" value=""></td>
                            <td><strong>76.25%</strong></td>
                            <td><span class="badge bg-warning">C</span></td>
                            <td><button class="btn btn-sm btn-yellow">Save</button></td>
                        </tr>
                        <tr>
                            <td><strong>David Wilson</strong></td>
                            <td>2024005</td>
                            <td><input type="number" class="form-control grade-input" value="65"></td>
                            <td><input type="number" class="form-control grade-input" value="62"></td>
                            <td><input type="number" class="form-control grade-input" value="68"></td>
                            <td><input type="number" class="form-control grade-input" value="60"></td>
                            <td><input type="number" class="form-control grade-input" value=""></td>
                            <td><strong>63.75%</strong></td>
                            <td><span class="badge bg-danger">D</span></td>
                            <td><button class="btn btn-sm btn-yellow">Save</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
