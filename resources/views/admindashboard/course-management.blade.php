<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #fbbf24;
            --primary-dark: #f59e0b;
            --primary-light: #fcd34d;
            --secondary-color: #fbbf24;
            --secondary-dark: #d97706;
            --accent-color: #fcd34d;
            --gradient-start: #fbbf24;
            --gradient-end: #f59e0b;
            --light-bg: #fffbeb;
            --card-shadow: 0 10px 40px rgba(251, 191, 36, 0.15);
            --hover-shadow: 0 20px 60px rgba(251, 191, 36, 0.25);
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light-bg);
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: white;
            box-shadow: 2px 0 20px rgba(0,0,0,0.08);
            padding: 20px 0;
            z-index: 1000;
            border-right: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .sidebar-brand {
            padding: 0 20px 20px;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 20px;
        }
        
        .sidebar-brand h4 {
            margin: 0;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
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
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0 8px 8px 0;
            margin-right: 10px;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: linear-gradient(90deg, rgba(251, 191, 36, 0.15) 0%, rgba(251, 191, 36, 0.05) 100%);
            color: var(--primary-dark);
            border-left: 4px solid var(--primary-color);
            padding-left: 16px;
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
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .dashboard-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .btn-yellow {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: #333;
            border: none;
            padding: 10px 28px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
        }
        
        .btn-yellow:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--secondary-dark) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(251, 191, 36, 0.5);
            color: #333;
        }
        
        .table tbody tr {
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background: rgba(251, 191, 36, 0.08);
        }
        
        .badge-yellow {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: #333;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .badge-status {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .action-btn {
            padding: 6px 12px;
            border-radius: 8px;
            border: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding-left: 40px;
            border-radius: 10px;
            border: 1px solid rgba(251, 191, 36, 0.3);
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-dark);
        }
        
        .filter-btn {
            border: 1px solid rgba(251, 191, 36, 0.3);
            border-radius: 10px;
            padding: 10px 20px;
            background: white;
            transition: all 0.2s ease;
        }
        
        .filter-btn:hover {
            background: rgba(251, 191, 36, 0.1);
            border-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class="fas fa-graduation-cap"></i> CourseReg</h4>
            <small class="text-muted">Admin Portal</small>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="{{ route('admin.courses') }}" class="active"><i class="fas fa-chalkboard"></i> Course Management</a></li>
            <li><a href="#"><i class="fas fa-building"></i> Department Management</a></li>
            <li><a href="#"><i class="fas fa-calendar-alt"></i> Academic Calendar</a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> Reports</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Analytics</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> System Settings</a></li>
            <li><a href="#"><i class="fas fa-database"></i> Backup & Restore</a></li>
            <li><a href="#"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="#"><i class="fas fa-shield-alt"></i> Security</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
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
            <div>
                <h5 class="mb-0"><i class="fas fa-chalkboard"></i> Course Management</h5>
                <small class="text-muted">Manage all courses and curriculum</small>
            </div>
            <button class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                <i class="fas fa-plus"></i> Add New Course
            </button>
        </div>

        <!-- Filters and Search -->
        <div class="dashboard-card">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Search courses by name, code, or instructor...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex gap-2 justify-content-md-end">
                        <select class="filter-btn">
                            <option value="">All Departments</option>
                            <option value="cs">Computer Science</option>
                            <option value="math">Mathematics</option>
                            <option value="eng">Engineering</option>
                        </select>
                        <select class="filter-btn">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <select class="filter-btn">
                            <option value="">All Semesters</option>
                            <option value="fall2025">Fall 2025</option>
                            <option value="spring2026">Spring 2026</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Courses Table -->
        <div class="dashboard-card">
            <h5 class="mb-4"><i class="fas fa-list"></i> All Courses</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Department</th>
                            <th>Instructor</th>
                            <th>Credits</th>
                            <th>Enrolled</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr onclick="viewCourse('CS301')">
                            <td><strong>CS 301</strong></td>
                            <td>Data Structures & Algorithms</td>
                            <td>Computer Science</td>
                            <td>Dr. Sarah Johnson</td>
                            <td><span class="badge-yellow">3</span></td>
                            <td>35/40</td>
                            <td><span class="badge bg-success badge-status">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editCourse('CS301')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteCourse('CS301')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewCourse('CS305')">
                            <td><strong>CS 305</strong></td>
                            <td>Database Management Systems</td>
                            <td>Computer Science</td>
                            <td>Prof. Michael Chen</td>
                            <td><span class="badge-yellow">3</span></td>
                            <td>30/35</td>
                            <td><span class="badge bg-success badge-status">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editCourse('CS305')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteCourse('CS305')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewCourse('CS320')">
                            <td><strong>CS 320</strong></td>
                            <td>Web Development</td>
                            <td>Computer Science</td>
                            <td>Dr. Emily Rodriguez</td>
                            <td><span class="badge-yellow">3</span></td>
                            <td>28/30</td>
                            <td><span class="badge bg-success badge-status">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editCourse('CS320')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteCourse('CS320')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewCourse('MATH201')">
                            <td><strong>MATH 201</strong></td>
                            <td>Calculus II</td>
                            <td>Mathematics</td>
                            <td>Dr. Robert Smith</td>
                            <td><span class="badge-yellow">4</span></td>
                            <td>45/50</td>
                            <td><span class="badge bg-success badge-status">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editCourse('MATH201')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteCourse('MATH201')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewCourse('ENG101')">
                            <td><strong>ENG 101</strong></td>
                            <td>Engineering Mechanics</td>
                            <td>Engineering</td>
                            <td>Prof. Lisa Anderson</td>
                            <td><span class="badge-yellow">3</span></td>
                            <td>40/40</td>
                            <td><span class="badge bg-warning badge-status">Full</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editCourse('ENG101')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteCourse('ENG101')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewCourse('CS405')">
                            <td><strong>CS 405</strong></td>
                            <td>Artificial Intelligence</td>
                            <td>Computer Science</td>
                            <td>Dr. David Kumar</td>
                            <td><span class="badge-yellow">3</span></td>
                            <td>0/25</td>
                            <td><span class="badge bg-secondary badge-status">Inactive</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editCourse('CS405')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteCourse('CS405')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%); color: #333; border: none;">
                    <h5 class="modal-title" id="addCourseModalLabel"><i class="fas fa-plus-circle"></i> Add New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="courseCode" class="form-label">Course Code</label>
                                <input type="text" class="form-control" id="courseCode" placeholder="e.g., CS 301" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="courseName" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="courseName" placeholder="e.g., Data Structures" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label">Department</label>
                                <select class="form-select" id="department" required>
                                    <option value="">Select Department</option>
                                    <option value="cs">Computer Science</option>
                                    <option value="math">Mathematics</option>
                                    <option value="eng">Engineering</option>
                                    <option value="bus">Business</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="instructor" class="form-label">Instructor</label>
                                <select class="form-select" id="instructor" required>
                                    <option value="">Select Instructor</option>
                                    <option value="1">Dr. Sarah Johnson</option>
                                    <option value="2">Prof. Michael Chen</option>
                                    <option value="3">Dr. Emily Rodriguez</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="credits" class="form-label">Credits</label>
                                <input type="number" class="form-control" id="credits" placeholder="3" min="1" max="6" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="capacity" class="form-label">Max Capacity</label>
                                <input type="number" class="form-control" id="capacity" placeholder="30" min="1" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <select class="form-select" id="semester" required>
                                    <option value="">Select Semester</option>
                                    <option value="fall2025">Fall 2025</option>
                                    <option value="spring2026">Spring 2026</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Enter course description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="prerequisites" class="form-label">Prerequisites</label>
                            <input type="text" class="form-control" id="prerequisites" placeholder="e.g., CS 101, CS 201">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-yellow">Create Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewCourse(courseId) {
            console.log('Viewing course:', courseId);
            window.location.href = '/admin/courses/' + courseId;
        }

        function editCourse(courseId) {
            console.log('Editing course:', courseId);
            // Open edit modal or navigate to edit page
        }

        function deleteCourse(courseId) {
            if (confirm('Are you sure you want to delete this course?')) {
                console.log('Deleting course:', courseId);
                // Send delete request
            }
        }
    </script>
</body>
</html>
