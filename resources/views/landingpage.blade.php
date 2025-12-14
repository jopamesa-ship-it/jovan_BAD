<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration System</title>
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
            --success-color: #10b981;
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
        
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .navbar-brand {
            font-weight: 700;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 1.6rem;
            letter-spacing: -0.5px;
        }
        
        .nav-link {
            color: #64748b !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 16px !important;
            border-radius: 8px;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
            background: rgba(251, 191, 36, 0.1);
        }
        
        .btn-yellow {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: #333;
            border: none;
            padding: 12px 32px;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.4);
        }
        
        .btn-yellow:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--secondary-dark) 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.5);
            color: #333;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            padding: 120px 0;
            min-height: 95vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .hero-title {
            font-size: 3.8rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 24px;
            line-height: 1.2;
            letter-spacing: -1px;
        }
        
        .hero-subtitle {
            font-size: 1.35rem;
            color: #1f2937;
            margin-bottom: 40px;
            line-height: 1.6;
        }
        
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--card-shadow);
            height: 100%;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .feature-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: var(--hover-shadow);
            border-color: var(--primary-color);
        }
        
        .feature-icon {
            width: 85px;
            height: 85px;
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.15) 0%, rgba(245, 158, 11, 0.15) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2.2rem;
            color: var(--primary-dark);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--gradient-end) 100%);
            color: #333;
            transform: scale(1.1) rotate(5deg);
        }
        
        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 20px;
            text-align: center;
            letter-spacing: -1px;
        }
        
        .section-subtitle {
            font-size: 1.2rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 60px;
            line-height: 1.6;
        }
        
        .features-section {
            padding: 80px 0;
            background: white;
        }
        
        .cta-section {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .cta-title {
            font-size: 3rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 24px;
            letter-spacing: -1px;
        }
        
        .btn-white {
            background: white;
            color: #333;
            border: none;
            padding: 14px 45px;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.25);
            color: var(--primary-dark);
        }
        
        .footer {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            padding: 50px 0;
            text-align: center;
            border-top: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .stats {
            background: linear-gradient(to bottom, transparent, rgba(251, 191, 36, 0.05));
            padding: 80px 0;
            position: relative;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
            transition: all 0.3s ease;
        }
        
        .stat-item:hover {
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -2px;
        }
        
        .stat-label {
            font-size: 1.15rem;
            color: #64748b;
            margin-top: 12px;
            font-weight: 500;
        }
        
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        .modal-header {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%);
            border-radius: 20px 20px 0 0;
            border-bottom: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .modal-title {
            color: var(--primary-dark);
            font-weight: 700;
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(251, 191, 36, 0.2);
            background: rgba(251, 191, 36, 0.03);
        }
        
        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap"></i> CourseReg
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-3">
                        <button class="btn btn-outline-primary btn-sm me-2" style="border-radius: 10px; padding: 8px 20px; border-width: 2px;" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
                        <button class="btn btn-yellow btn-sm" style="border-radius: 10px; padding: 8px 24px;" data-bs-toggle="modal" data-bs-target="#registerModal">Get Started</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="loginModalLabel"><i class="fas fa-sign-in-alt"></i> Log In to CourseReg</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Login Failed!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="loginEmail" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="loginPassword" name="password" placeholder="Enter your password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-yellow w-100 mb-3">Log In</button>
                        <div class="text-center">
                            <a href="#" class="text-decoration-none" style="color: var(--dark-yellow);">Forgot Password?</a>
                        </div>
                        <hr class="my-4">
                        <div class="d-grid mb-3">
                            <a href="{{ route('google.login') }}" class="btn btn-outline-dark">
                                <i class="fab fa-google me-2"></i>Continue with Google
                            </a>
                        </div>
                        <p class="text-center mb-0">Don't have an account? <a href="#" class="text-decoration-none" style="color: var(--dark-yellow);" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="registerModalLabel"><i class="fas fa-user-plus"></i> Create Your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Google OAuth Button -->
                    <div class="d-grid mb-4">
                        <a href="{{ route('google.login') }}" class="btn btn-outline-dark btn-lg">
                            <i class="fab fa-google me-2"></i>Continue with Google
                        </a>
                    </div>
                    
                    <div class="text-center mb-4">
                        <span class="text-muted">or register with email</span>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="registerPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Create a password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm your password" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Register as</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="">Select your role</option>
                                <option value="student" selected>Student</option>
                                <option value="instructor">Instructor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                            <label class="form-check-label" for="agreeTerms">
                                I agree to the <a href="#" style="color: var(--dark-yellow);">Terms & Conditions</a>
                            </label>
                        </div>
                        <input type="hidden" name="name" id="fullName">
                        <button type="submit" class="btn btn-yellow w-100 mb-3" onclick="document.getElementById('fullName').value = document.getElementById('firstName').value + ' ' + document.getElementById('lastName').value;">Create Account</button>
                        <p class="text-center mb-0">Already have an account? <a href="#" class="text-decoration-none" style="color: var(--dark-yellow);" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Log in here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">Register for Your Dream Courses</h1>
                    <p class="hero-subtitle">Simplified course registration for students. Browse, select, and enroll in seconds with our modern platform.</p>
                    <button class="btn btn-yellow btn-lg me-3" data-bs-toggle="modal" data-bs-target="#registerModal">Start Registration</button>
                    <button class="btn btn-white btn-lg">Learn More</button>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-book-reader" style="font-size: 15rem; color: rgba(255, 255, 255, 0.4); opacity: 1;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Active Students</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Available Courses</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="section-title">Why Choose CourseReg?</h2>
            <p class="section-subtitle">Experience hassle-free course registration with powerful features</p>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4>Easy Search</h4>
                        <p>Find courses quickly with our advanced search and filter system. Browse by department, time, or instructor.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>Real-Time Updates</h4>
                        <p>See seat availability instantly. Get notified when spots open up in your desired courses.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4>Smart Scheduling</h4>
                        <p>Automatically detect schedule conflicts and get personalized course recommendations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Mobile Friendly</h4>
                        <p>Register on the go with our fully responsive design that works on any device.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Secure & Safe</h4>
                        <p>Your data is protected with industry-standard security measures and encryption.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Support</h4>
                        <p>Our dedicated support team is always ready to help you with any questions or issues.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="about">
        <div class="container">
            <h2 class="cta-title">Ready to Get Started?</h2>
            <p style="font-size: 1.25rem; color: #1f2937; margin-bottom: 35px; line-height: 1.6;">Join thousands of students who have simplified their registration process</p>
            <button class="btn btn-white btn-lg" data-bs-toggle="modal" data-bs-target="#registerModal">Register Now</button>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-md-start text-center mb-3">
                    <h5><i class="fas fa-graduation-cap"></i> CourseReg</h5>
                    <p>Making course registration simple and efficient</p>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <p>© 2025 CourseReg. All rights reserved.</p>
                    <div>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @if ($errors->any() && old('email'))
    <script>
        // Automatically reopen login modal if there are errors
        document.addEventListener('DOMContentLoaded', function() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });
    </script>
    @endif
</body>
</html>