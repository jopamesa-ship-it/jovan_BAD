<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Admin Dashboard</title>
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
            cursor: pointer;
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
        
        .badge-role {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .badge-admin {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }
        
        .badge-instructor {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }
        
        .badge-student {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
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
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #333;
            font-size: 0.9rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid rgba(251, 191, 36, 0.2);
            box-shadow: var(--card-shadow);
        }
        
        .stat-box h3 {
            font-size: 2rem;
            margin: 0;
            color: var(--primary-dark);
            font-weight: 800;
        }
        
        .stat-box p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 0.9rem;
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
            <li><a href="{{ route('admin.users') }}" class="active"><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="{{ route('admin.courses') }}"><i class="fas fa-chalkboard"></i> Course Management</a></li>
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
                <h5 class="mb-0"><i class="fas fa-users"></i> User Management</h5>
                <small class="text-muted">Manage students, instructors, and administrators</small>
            </div>
            <button class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-user-plus"></i> Add New User
            </button>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-box">
                <h3>1,234</h3>
                <p><i class="fas fa-user-graduate"></i> Total Students</p>
            </div>
            <div class="stat-box">
                <h3>87</h3>
                <p><i class="fas fa-chalkboard-teacher"></i> Total Instructors</p>
            </div>
            <div class="stat-box">
                <h3>12</h3>
                <p><i class="fas fa-user-shield"></i> Total Admins</p>
            </div>
            <div class="stat-box">
                <h3>1,333</h3>
                <p><i class="fas fa-users"></i> Total Users</p>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="dashboard-card">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Search by name, email, or ID...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex gap-2 justify-content-md-end">
                        <select class="filter-btn">
                            <option value="">All Roles</option>
                            <option value="student">Students</option>
                            <option value="instructor">Instructors</option>
                            <option value="admin">Administrators</option>
                        </select>
                        <select class="filter-btn">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="suspended">Suspended</option>
                        </select>
                        <select class="filter-btn">
                            <option value="">All Departments</option>
                            <option value="cs">Computer Science</option>
                            <option value="math">Mathematics</option>
                            <option value="eng">Engineering</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="dashboard-card">
            <h5 class="mb-4"><i class="fas fa-list"></i> All Users</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Join Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr onclick="viewUser('1')">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-avatar">JD</div>
                                    <div>
                                        <strong>John Doe</strong>
                                        <div class="text-muted small">ID: 2023-00123</div>
                                    </div>
                                </div>
                            </td>
                            <td>john.doe@university.edu</td>
                            <td><span class="badge badge-role badge-student">Student</span></td>
                            <td>Computer Science</td>
                            <td>Sep 1, 2023</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editUser('1')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteUser('1')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewUser('2')">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-avatar">SJ</div>
                                    <div>
                                        <strong>Dr. Sarah Johnson</strong>
                                        <div class="text-muted small">ID: INS-001</div>
                                    </div>
                                </div>
                            </td>
                            <td>sarah.johnson@university.edu</td>
                            <td><span class="badge badge-role badge-instructor">Instructor</span></td>
                            <td>Computer Science</td>
                            <td>Jan 15, 2020</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editUser('2')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteUser('2')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewUser('3')">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-avatar">MC</div>
                                    <div>
                                        <strong>Prof. Michael Chen</strong>
                                        <div class="text-muted small">ID: INS-002</div>
                                    </div>
                                </div>
                            </td>
                            <td>michael.chen@university.edu</td>
                            <td><span class="badge badge-role badge-instructor">Instructor</span></td>
                            <td>Computer Science</td>
                            <td>Mar 10, 2019</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editUser('3')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteUser('3')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewUser('4')">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-avatar">ER</div>
                                    <div>
                                        <strong>Dr. Emily Rodriguez</strong>
                                        <div class="text-muted small">ID: INS-003</div>
                                    </div>
                                </div>
                            </td>
                            <td>emily.rodriguez@university.edu</td>
                            <td><span class="badge badge-role badge-instructor">Instructor</span></td>
                            <td>Computer Science</td>
                            <td>Jul 5, 2021</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editUser('4')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteUser('4')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewUser('5')">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-avatar">AS</div>
                                    <div>
                                        <strong>Admin Smith</strong>
                                        <div class="text-muted small">ID: ADM-001</div>
                                    </div>
                                </div>
                            </td>
                            <td>admin.smith@university.edu</td>
                            <td><span class="badge badge-role badge-admin">Admin</span></td>
                            <td>Administration</td>
                            <td>Jan 1, 2018</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editUser('5')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteUser('5')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr onclick="viewUser('6')">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-avatar">JW</div>
                                    <div>
                                        <strong>Jane Wilson</strong>
                                        <div class="text-muted small">ID: 2023-00456</div>
                                    </div>
                                </div>
                            </td>
                            <td>jane.wilson@university.edu</td>
                            <td><span class="badge badge-role badge-student">Student</span></td>
                            <td>Mathematics</td>
                            <td>Sep 1, 2023</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="action-btn btn-sm btn-primary" onclick="event.stopPropagation(); editUser('6')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-sm btn-danger" onclick="event.stopPropagation(); deleteUser('6')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%); color: #333; border: none;">
                    <h5 class="modal-title" id="addUserModalLabel"><i class="fas fa-user-plus"></i> Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter last name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="user@university.edu" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" required>
                                    <option value="">Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="instructor">Instructor</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="+1 (555) 123-4567">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-yellow">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewUser(userId) {
            console.log('Viewing user:', userId);
            window.location.href = '/admin/users/' + userId;
        }

        function editUser(userId) {
            console.log('Editing user:', userId);
            // Open edit modal or navigate to edit page
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                console.log('Deleting user:', userId);
                // Send delete request
            }
        }
    </script>
</body>
</html>
