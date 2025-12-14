<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Instructor Dashboard</title>
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
        
        .messages-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            height: calc(100vh - 200px);
            display: flex;
        }
        
        .messages-list {
            width: 350px;
            border-right: 1px solid #eee;
            overflow-y: auto;
        }
        
        .message-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .message-item:hover {
            background: var(--light-yellow);
        }
        
        .message-item.active {
            background: var(--light-yellow);
            border-left: 4px solid var(--primary-yellow);
        }
        
        .message-avatar {
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
        
        .message-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
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
            <li><a href="{{ url('/instructor/messages') }}" class="active"><i class="fas fa-comments"></i> Messages</a></li>
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
                <h5 class="mb-0">Messages</h5>
                <small class="text-muted">Communicate with your students</small>
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

        <!-- Messages Container -->
        <div class="messages-container">
            <!-- Messages List -->
            <div class="messages-list">
                <div class="p-3 border-bottom">
                    <input type="text" class="form-control" placeholder="Search messages...">
                </div>
                
                <div class="message-item active">
                    <div class="d-flex gap-2">
                        <div class="message-avatar">JM</div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <strong>John Martinez</strong>
                                <small class="text-muted">1h ago</small>
                            </div>
                            <small class="text-muted">Question about Assignment 3...</small>
                        </div>
                    </div>
                </div>

                <div class="message-item">
                    <div class="d-flex gap-2">
                        <div class="message-avatar">EC</div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <strong>Emily Chen</strong>
                                <small class="text-muted">3h ago</small>
                            </div>
                            <small class="text-muted">Extension request for project...</small>
                        </div>
                    </div>
                </div>

                <div class="message-item">
                    <div class="d-flex gap-2">
                        <div class="message-avatar">MB</div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <strong>Michael Brown</strong>
                                <small class="text-muted">5h ago</small>
                            </div>
                            <small class="text-muted">Office hours appointment...</small>
                        </div>
                    </div>
                </div>

                <div class="message-item">
                    <div class="d-flex gap-2">
                        <div class="message-avatar">SD</div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <strong>Sarah Davis</strong>
                                <small class="text-muted">1d ago</small>
                            </div>
                            <small class="text-muted">Grade inquiry...</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div class="message-content">
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="message-avatar">JM</div>
                        <div>
                            <strong>John Martinez</strong>
                            <div class="text-muted small">Student ID: 2024001</div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-2 mb-3">
                        <div class="message-avatar">JM</div>
                        <div class="flex-grow-1">
                            <div class="bg-light p-3 rounded">
                                <p class="mb-1">Hello Dr. Johnson,</p>
                                <p class="mb-1">I have a question about Assignment 3, specifically regarding the BST implementation. Could you clarify the requirements for the delete operation?</p>
                                <p class="mb-0">Thank you!</p>
                            </div>
                            <small class="text-muted">1 hour ago</small>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <textarea class="form-control mb-2" rows="4" placeholder="Type your reply..."></textarea>
                    <button class="btn btn-yellow">
                        <i class="fas fa-paper-plane"></i> Send Reply
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
