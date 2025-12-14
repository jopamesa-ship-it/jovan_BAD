<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition & Fees - CourseReg</title>
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
        
        .balance-card {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            border-radius: 10px;
            padding: 30px;
            color: #333;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }
        
        .balance-card h1 {
            font-size: 3rem;
            margin: 10px 0;
            font-weight: bold;
        }
        
        .balance-card .label {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .tuition-container {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .summary-box {
            background: #f8f9fa;
            border-left: 5px solid var(--primary-yellow);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        
        .summary-row:last-child {
            border-bottom: none;
        }
        
        .summary-row.total {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
            padding-top: 15px;
            border-top: 2px solid var(--primary-yellow);
        }
        
        .fee-item {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }
        
        .fee-item:hover {
            background: var(--light-yellow);
            border-color: var(--primary-yellow);
        }
        
        .fee-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }
        
        .fee-description {
            color: #666;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-paid {
            background: #28a745;
            color: white;
        }
        
        .status-pending {
            background: #ffc107;
            color: #333;
        }
        
        .status-overdue {
            background: #dc3545;
            color: white;
        }
        
        .payment-history {
            margin-top: 20px;
        }
        
        .payment-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 4px solid #28a745;
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
        
        .alert-warning {
            background: #fff3cd;
            border-color: var(--primary-yellow);
            color: #333;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .balance-card h1 {
                font-size: 2rem;
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
        <div class="top-bar">
            <h4 class="mb-0"><i class="fas fa-file-invoice-dollar"></i> Tuition & Fees</h4>
            <small class="text-muted">Fall 2025 Semester - Account Summary</small>
        </div>

        <!-- Balance Overview -->
        <div class="row">
            <div class="col-md-6">
                <div class="balance-card">
                    <div class="label">Total Amount Due</div>
                    <h1>$5,400.00</h1>
                    <div class="d-flex justify-content-between mt-3">
                        <span>Due Date: January 15, 2026</span>
                        <span class="status-badge status-pending">Pending</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tuition-container" style="height: 100%;">
                    <h5 class="mb-3"><i class="fas fa-info-circle"></i> Payment Information</h5>
                    <p><strong>Student ID:</strong> 2023-00123</p>
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Program:</strong> BS Computer Science</p>
                    <p><strong>Semester:</strong> Fall 2025</p>
                    <p class="mb-0"><strong>Units Enrolled:</strong> {{ $courses->sum('units') }} units</p>
                </div>
            </div>
        </div>

        <!-- Fee Breakdown -->
        <div class="tuition-container">
            <h5 class="mb-3"><i class="fas fa-list"></i> Fee Breakdown</h5>
            
            <div class="summary-box">
                <h6 class="mb-3">Tuition Charges</h6>
                
                <div class="fee-item">
                    <div class="fee-header">
                        <span><i class="fas fa-book"></i> Tuition Fee ({{ $courses->sum('units') }} units × $300/unit)</span>
                        <span class="text-success">${{ number_format($courses->sum('units') * 300, 2) }}</span>
                    </div>
                    <div class="fee-description">Base tuition fee for enrolled courses</div>
                </div>

                <div class="fee-item">
                    <div class="fee-header">
                        <span><i class="fas fa-laptop"></i> Technology Fee</span>
                        <span class="text-success">$500.00</span>
                    </div>
                    <div class="fee-description">Computer labs, software licenses, and online resources</div>
                </div>

                <div class="fee-item">
                    <div class="fee-header">
                        <span><i class="fas fa-flask"></i> Laboratory Fee</span>
                        <span class="text-success">$350.00</span>
                    </div>
                    <div class="fee-description">Lab equipment and materials for CS courses</div>
                </div>

                <div class="fee-item">
                    <div class="fee-header">
                        <span><i class="fas fa-university"></i> Registration Fee</span>
                        <span class="text-success">$150.00</span>
                    </div>
                    <div class="fee-description">Enrollment and registration processing</div>
                </div>

                <div class="fee-item">
                    <div class="fee-header">
                        <span><i class="fas fa-id-card"></i> Student Activity Fee</span>
                        <span class="text-success">$200.00</span>
                    </div>
                    <div class="fee-description">Student organizations, events, and facilities</div>
                </div>

                <div class="summary-row total">
                    <span>Total Amount Due</span>
                    <span class="text-danger">$5,400.00</span>
                </div>
            </div>

            <!-- Payment Options -->
            <div class="mt-4">
                <h6 class="mb-3"><i class="fas fa-credit-card"></i> Payment Options</h6>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <strong>Payment Deadline:</strong> January 15, 2026. Late payments may incur additional fees.
                </div>
                <div class="d-flex gap-3">
                    <button class="btn btn-yellow">
                        <i class="fas fa-credit-card"></i> Pay Online
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-download"></i> Download Invoice
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-calendar-check"></i> Setup Payment Plan
                    </button>
                </div>
            </div>
        </div>

        <!-- Payment History -->
        <div class="tuition-container">
            <h5 class="mb-3"><i class="fas fa-history"></i> Payment History</h5>
            
            <div class="payment-item">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <strong>Spring 2025 Tuition</strong>
                        <div class="text-muted small">Paid on: May 15, 2025</div>
                        <div class="text-muted small">Payment Method: Credit Card (**** 4532)</div>
                    </div>
                    <div class="text-end">
                        <div class="text-success font-weight-bold">$5,100.00</div>
                        <span class="status-badge status-paid">Paid</span>
                    </div>
                </div>
            </div>

            <div class="payment-item">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <strong>Fall 2024 Tuition</strong>
                        <div class="text-muted small">Paid on: December 20, 2024</div>
                        <div class="text-muted small">Payment Method: Bank Transfer</div>
                    </div>
                    <div class="text-end">
                        <div class="text-success font-weight-bold">$4,950.00</div>
                        <span class="status-badge status-paid">Paid</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Aid Information -->
        <div class="tuition-container">
            <h5 class="mb-3"><i class="fas fa-hand-holding-usd"></i> Financial Aid & Scholarships</h5>
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> 
                You may be eligible for financial aid. Visit the Financial Aid Office or check your aid status online.
            </div>
            <div class="d-flex gap-3">
                <button class="btn btn-outline-primary">
                    <i class="fas fa-graduation-cap"></i> Apply for Scholarships
                </button>
                <button class="btn btn-outline-primary">
                    <i class="fas fa-file-alt"></i> View Aid Status
                </button>
            </div>
        </div>

        <!-- Important Notes -->
        <div class="tuition-container">
            <h5 class="mb-3"><i class="fas fa-exclamation-circle"></i> Important Notes</h5>
            <ul>
                <li>All fees are subject to change without prior notice.</li>
                <li>Tuition must be paid in full before the deadline to avoid late fees.</li>
                <li>A $50 late fee will be charged for payments received after the due date.</li>
                <li>Your enrollment may be cancelled if payment is not received by the deadline.</li>
                <li>Refund policies vary based on the withdrawal date. Please consult the academic calendar.</li>
                <li>For questions about your bill, contact the Bursar's Office at bursar@university.edu</li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
