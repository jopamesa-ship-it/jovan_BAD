<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CourseReg</title>
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
        
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .stat-card {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            border-radius: 10px;
            padding: 25px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .stat-card h3 {
            font-size: 2.5rem;
            margin: 0;
            font-weight: bold;
        }
        
        .stat-card p {
            margin: 5px 0 0;
            font-size: 1rem;
            opacity: 0.8;
        }
        
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .user-card {
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-left: 4px solid var(--primary-yellow);
            background: white;
            margin-bottom: 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .user-card:hover {
            background: var(--light-yellow);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .user-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }
        
        .user-details {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
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
            transform: translateY(-2px);
        }
        
        .badge-yellow {
            background: var(--primary-yellow);
            color: #333;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
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
        
        .user-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        
        .user-item:last-child {
            border-bottom: none;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .user-avatar-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-yellow);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #333;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
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
            <small class="text-muted">Admin Portal</small>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.users') }}"><i class="fas fa-users"></i> User Management</a></li>
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
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div>
                <h5 class="mb-0">Welcome back, Administrator!</h5>
                <small class="text-muted">Monday, November 18, 2025</small>
            </div>
            <div class="user-profile">
                <div>
                    <i class="fas fa-bell" style="font-size: 1.3rem; color: #666; cursor: pointer;"></i>
                    <span class="badge bg-danger" style="position: relative; top: -10px; left: -10px;">5</span>
                </div>
                <div class="user-avatar">AD</div>
                <div>
                    <div style="font-weight: 600;">Admin User</div>
                    <small class="text-muted">System Administrator</small>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3>1,247</h3>
                    <p>Total Users</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-chalkboard"></i>
                    <h3>98</h3>
                    <p>Active Courses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>892</h3>
                    <p>Total Students</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>45</h3>
                    <p>Total Instructors</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Activity -->
            <div class="col-lg-8">
                <div class="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5><i class="fas fa-clock"></i> Recent System Activity</h5>
                        <button class="btn btn-yellow btn-sm">View All Activity</button>
                    </div>
                    
                    <div class="user-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <div class="user-title">New Student Registration</div>
                                <div class="user-details">
                                    <i class="fas fa-user"></i> John Smith registered for Fall 2025 semester |
                                    <i class="fas fa-clock"></i> 15 minutes ago
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-success me-2">Approved</span>
                                    <span class="badge-yellow">Student</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="user-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <div class="user-title">Course Added</div>
                                <div class="user-details">
                                    <i class="fas fa-chalkboard"></i> Dr. Johnson created "Advanced Machine Learning" |
                                    <i class="fas fa-clock"></i> 1 hour ago
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-info me-2">Pending Review</span>
                                    <span class="badge-yellow">CS Department</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-yellow">Review</button>
                            </div>
                        </div>
                    </div>

                    <div class="user-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <div class="user-title">System Backup Completed</div>
                                <div class="user-details">
                                    <i class="fas fa-database"></i> Automatic daily backup completed successfully |
                                    <i class="fas fa-clock"></i> 3 hours ago
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-success me-2">Completed</span>
                                    <span class="badge-yellow">System</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Management Overview -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-users-cog"></i> User Management Overview</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Type</th>
                                    <th>Total</th>
                                    <th>Active</th>
                                    <th>Pending</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-graduation-cap text-primary"></i> Students</td>
                                    <td>892</td>
                                    <td><span class="badge bg-success">856</span></td>
                                    <td><span class="badge bg-warning">36</span></td>
                                    <td><button class="btn btn-sm btn-yellow">Manage</button></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-chalkboard-teacher text-info"></i> Instructors</td>
                                    <td>45</td>
                                    <td><span class="badge bg-success">43</span></td>
                                    <td><span class="badge bg-warning">2</span></td>
                                    <td><button class="btn btn-sm btn-yellow">Manage</button></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-user-tie text-warning"></i> Staff</td>
                                    <td>28</td>
                                    <td><span class="badge bg-success">28</span></td>
                                    <td><span class="badge bg-warning">0</span></td>
                                    <td><button class="btn btn-sm btn-yellow">Manage</button></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-user-shield text-danger"></i> Administrators</td>
                                    <td>5</td>
                                    <td><span class="badge bg-success">5</span></td>
                                    <td><span class="badge bg-warning">0</span></td>
                                    <td><button class="btn btn-sm btn-yellow">Manage</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- System Health -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-heartbeat"></i> System Health Monitor</h5>
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <h4 class="text-success">99.8%</h4>
                            <small class="text-muted">System Uptime</small>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <h4 class="text-info">2.1GB</h4>
                            <small class="text-muted">Database Size</small>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <h4 class="text-warning">45%</h4>
                            <small class="text-muted">Server Load</small>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <h4 class="text-primary">156ms</h4>
                            <small class="text-muted">Response Time</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Panels -->
            <div class="col-lg-4">
                <!-- Pending Approvals -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-clock"></i> Pending Approvals</h5>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between mb-1">
                            <strong>Course Requests</strong>
                            <span class="badge bg-warning">8</span>
                        </div>
                        <small class="text-muted">New courses pending approval</small>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-yellow">Review</button>
                        </div>
                    </div>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between mb-1">
                            <strong>User Registrations</strong>
                            <span class="badge bg-info">23</span>
                        </div>
                        <small class="text-muted">New user accounts to verify</small>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-yellow">Review</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <strong>System Updates</strong>
                            <span class="badge bg-danger">3</span>
                        </div>
                        <small class="text-muted">Critical updates available</small>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-yellow">Install</button>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-bolt"></i> Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fas fa-user-plus"></i> Add New User</button>
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#createCourseModal"><i class="fas fa-plus"></i> Create Course</button>
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addDepartmentModal"><i class="fas fa-building"></i> Add Department</button>
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#sendAnnouncementModal"><i class="fas fa-envelope"></i> Send Announcement</button>
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#generateReportModal"><i class="fas fa-download"></i> Generate Report</button>
                        <button class="btn btn-outline-secondary" onclick="confirmBackup()"><i class="fas fa-database"></i> Backup System</button>
                    </div>
                </div>

                <!-- Recent Issues -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-exclamation-triangle"></i> Recent Issues</h5>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong>Login Issues Reported</strong>
                                <div class="text-muted small">5 users affected • Server maintenance</div>
                            </div>
                            <span class="badge bg-warning">Resolved</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong>Course Registration Error</strong>
                                <div class="text-muted small">Database timeout • Peak hours</div>
                            </div>
                            <span class="badge bg-success">Fixed</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong>Email Service Outage</strong>
                                <div class="text-muted small">External provider issue</div>
                            </div>
                            <span class="badge bg-danger">Active</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Admin Activity -->
                <div class="dashboard-card">
                    <h5 class="mb-3"><i class="fas fa-history"></i> Recent Admin Actions</h5>
                    <div class="user-item">
                        <div class="user-info">
                            <div class="user-avatar-small">MJ</div>
                            <div>
                                <strong>Mike Johnson</strong>
                                <div class="text-muted small">Added new instructor account</div>
                            </div>
                        </div>
                        <small class="text-muted">2h</small>
                    </div>
                    <div class="user-item">
                        <div class="user-info">
                            <div class="user-avatar-small">SD</div>
                            <div>
                                <strong>Sarah Davis</strong>
                                <div class="text-muted small">Updated system settings</div>
                            </div>
                        </div>
                        <small class="text-muted">4h</small>
                    </div>
                    <div class="user-item">
                        <div class="user-info">
                            <div class="user-avatar-small">JW</div>
                            <div>
                                <strong>John Wilson</strong>
                                <div class="text-muted small">Approved course requests</div>
                            </div>
                        </div>
                        <small class="text-muted">6h</small>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary w-100 mt-3">View All Activity</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%); border-bottom: 1px solid rgba(251, 191, 36, 0.2);">
                    <h5 class="modal-title" style="color: #f59e0b; font-weight: 700;"><i class="fas fa-user-plus"></i> Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="user@university.edu" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">User Role</label>
                                <select class="form-select" required>
                                    <option value="">Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="instructor">Instructor</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Student/Employee ID</label>
                                <input type="text" class="form-control" placeholder="ID Number" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="">Select Department</option>
                                <option>Computer Science</option>
                                <option>Mathematics</option>
                                <option>Engineering</option>
                                <option>Business</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-yellow">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Course Modal -->
    <div class="modal fade" id="createCourseModal" tabindex="-1" aria-labelledby="createCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%); border-bottom: 1px solid rgba(251, 191, 36, 0.2);">
                    <h5 class="modal-title" style="color: #f59e0b; font-weight: 700;"><i class="fas fa-plus"></i> Create New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Course Code</label>
                                <input type="text" class="form-control" placeholder="e.g., CS 301" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" placeholder="Course Name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Course description"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Credits/Units</label>
                                <input type="number" class="form-control" placeholder="3" min="1" max="6" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Max Students</label>
                                <input type="number" class="form-control" placeholder="30" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select" required>
                                    <option value="">Select</option>
                                    <option>Computer Science</option>
                                    <option>Mathematics</option>
                                    <option>Engineering</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Schedule</label>
                                <input type="text" class="form-control" placeholder="e.g., MWF 10:00 AM">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Room</label>
                                <input type="text" class="form-control" placeholder="e.g., Room 204">
                            </div>
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

    <!-- Add Department Modal -->
    <div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%); border-bottom: 1px solid rgba(251, 191, 36, 0.2);">
                    <h5 class="modal-title" style="color: #f59e0b; font-weight: 700;"><i class="fas fa-building"></i> Add Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Department Name</label>
                            <input type="text" class="form-control" placeholder="e.g., Computer Science" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department Code</label>
                            <input type="text" class="form-control" placeholder="e.g., CS" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department Head</label>
                            <select class="form-select">
                                <option value="">Select Instructor</option>
                                <option>Dr. Sarah Johnson</option>
                                <option>Prof. Michael Chen</option>
                                <option>Dr. Emily Rodriguez</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Building/Location</label>
                            <input type="text" class="form-control" placeholder="Building name or location">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-yellow">Add Department</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Send Announcement Modal -->
    <div class="modal fade" id="sendAnnouncementModal" tabindex="-1" aria-labelledby="sendAnnouncementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%); border-bottom: 1px solid rgba(251, 191, 36, 0.2);">
                    <h5 class="modal-title" style="color: #f59e0b; font-weight: 700;"><i class="fas fa-envelope"></i> Send Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Recipients</label>
                            <select class="form-select" required>
                                <option value="">Select Audience</option>
                                <option value="all">All Users</option>
                                <option value="students">All Students</option>
                                <option value="instructors">All Instructors</option>
                                <option value="department">Specific Department</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" placeholder="Announcement subject" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="5" placeholder="Type your announcement message here..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select class="form-select">
                                <option value="normal" selected>Normal</option>
                                <option value="high">High Priority</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="sendEmail">
                            <label class="form-check-label" for="sendEmail">
                                Also send via email
                            </label>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-yellow">Send Announcement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Generate Report Modal -->
    <div class="modal fade" id="generateReportModal" tabindex="-1" aria-labelledby="generateReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%); border-bottom: 1px solid rgba(251, 191, 36, 0.2);">
                    <h5 class="modal-title" style="color: #f59e0b; font-weight: 700;"><i class="fas fa-download"></i> Generate Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Report Type</label>
                            <select class="form-select" required>
                                <option value="">Select Report Type</option>
                                <option value="enrollment">Enrollment Summary</option>
                                <option value="grades">Grade Distribution</option>
                                <option value="attendance">Attendance Report</option>
                                <option value="financial">Financial Report</option>
                                <option value="course">Course Statistics</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Time Period</label>
                            <select class="form-select" required>
                                <option value="">Select Period</option>
                                <option value="current">Current Semester</option>
                                <option value="last">Last Semester</option>
                                <option value="year">This Academic Year</option>
                                <option value="custom">Custom Date Range</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Format</label>
                            <select class="form-select" required>
                                <option value="pdf" selected>PDF</option>
                                <option value="excel">Excel (XLSX)</option>
                                <option value="csv">CSV</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-yellow">Generate Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmBackup() {
            if(confirm('Are you sure you want to start a system backup? This process may take several minutes.')) {
                // Show loading message
                const loadingToast = document.createElement('div');
                loadingToast.className = 'alert alert-info position-fixed top-0 start-50 translate-middle-x mt-3';
                loadingToast.style.zIndex = '9999';
                loadingToast.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Backup in progress...';
                document.body.appendChild(loadingToast);
                
                // Simulate backup process
                setTimeout(() => {
                    loadingToast.remove();
                    alert('System backup completed successfully!');
                }, 3000);
            }
        }
    </script>
</body>
</html>