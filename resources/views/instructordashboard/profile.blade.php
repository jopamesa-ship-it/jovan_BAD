<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Instructor Dashboard</title>
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
        
        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .profile-avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 3rem;
            color: #333;
            margin: 0 auto 20px;
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
            <li><a href="{{ url('/instructor/gradebook') }}"><i class="fas fa-chart-bar"></i> Grade Book</a></li>
            <li><a href="{{ url('/instructor/materials') }}"><i class="fas fa-file-upload"></i> Course Materials</a></li>
            <li><a href="{{ url('/instructor/schedule') }}"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
            <li><a href="{{ url('/instructor/messages') }}"><i class="fas fa-comments"></i> Messages</a></li>
            <li><a href="{{ url('/instructor/analytics') }}"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="{{ url('/instructor/profile') }}" class="active"><i class="fas fa-user"></i> Profile</a></li>
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
                <h5 class="mb-0">My Profile</h5>
                <small class="text-muted">Manage your profile information</small>
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

        <!-- Profile Content -->
        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card text-center">
                    <div class="profile-avatar-large">SJ</div>
                    <h4>Dr. Sarah Johnson</h4>
                    <p class="text-muted">Computer Science Department</p>
                    <p class="text-muted">sarah.johnson@university.edu</p>
                    <button class="btn btn-yellow mt-2">
                        <i class="fas fa-camera"></i> Change Photo
                    </button>
                </div>

                <div class="profile-card">
                    <h5 class="mb-3">Quick Stats</h5>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Active Courses</span>
                            <strong>4</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Students</span>
                            <strong>156</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Years Teaching</span>
                            <strong>12</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Rating</span>
                            <strong>4.8/5.0</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="profile-card">
                    <h5 class="mb-3">Personal Information</h5>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" value="Sarah">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="Johnson">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="sarah.johnson@university.edu">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" value="+1 (555) 123-4567">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control" value="Computer Science">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Office Location</label>
                            <input type="text" class="form-control" value="Room 412, Engineering Building">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bio</label>
                            <textarea class="form-control" rows="4">Dr. Sarah Johnson is a Professor of Computer Science specializing in algorithms and data structures. She has over 12 years of teaching experience and has published numerous papers in top-tier conferences.</textarea>
                        </div>
                        <button type="submit" class="btn btn-yellow">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </form>
                </div>

                <div class="profile-card">
                    <h5 class="mb-3">Education & Credentials</h5>
                    <div class="mb-3">
                        <strong>Ph.D. in Computer Science</strong>
                        <p class="text-muted mb-1">Massachusetts Institute of Technology • 2010</p>
                    </div>
                    <div class="mb-3">
                        <strong>M.S. in Computer Science</strong>
                        <p class="text-muted mb-1">Stanford University • 2006</p>
                    </div>
                    <div class="mb-3">
                        <strong>B.S. in Computer Engineering</strong>
                        <p class="text-muted mb-1">University of California, Berkeley • 2004</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
