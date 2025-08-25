<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECTEM Online Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0047AB; /* Blue */
            --secondary-color: #FFD700; /* Yellow */
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: var(--primary-color);
            padding: 1rem 0;
        }
        .navbar .nav-link, .navbar-brand {
            color: #fff !important;
            font-weight: 500;
        }
        .navbar .nav-link:hover {
            color: var(--secondary-color) !important;
        }
        .hero {
            background: linear-gradient(rgba(0,71,171,0.8), rgba(0,71,171,0.8)), url('https://via.placeholder.com/1920x700') center/cover no-repeat;
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 2.8rem;
            font-weight: 700;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .btn-yellow {
            background-color: var(--secondary-color);
            color: #000;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 30px;
        }
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .feature-card {
            border: none;
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            transition: 0.3s;
        }
        .feature-card:hover {
            background: #e9f2ff;
            transform: translateY(-5px);
        }
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px 0;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">RECTEM e-Learning</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>Learn Anytime, Anywhere with RECTEM Online Learning</h1>
        <p>Empowering lecturers to share knowledge and students to access materials seamlessly.</p>
        <a href="{{ url('login') }}" class="btn btn-yellow btn-lg mt-3">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Why Choose RECTEM e-Learning?</h2>
            <p class="mb-5">A smarter, faster and more flexible way to teach and learn.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center shadow-sm">
                    <div class="mb-3 fs-1 text-primary">📚</div>
                    <h5 class="fw-bold">Easy Material Upload</h5>
                    <p>Lecturers can upload notes, assignments, and resources with just a few clicks.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center shadow-sm">
                    <div class="mb-3 fs-1 text-primary">👩‍🎓</div>
                    <h5 class="fw-bold">Student-Centered Learning</h5>
                    <p>Students can access course materials anytime, anywhere — at their convenience.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center shadow-sm">
                    <div class="mb-3 fs-1 text-primary">🔒</div>
                    <h5 class="fw-bold">Secure & Reliable</h5>
                    <p>Only authorized users can upload or access content with full data protection.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-center" style="background-color: var(--secondary-color);">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to Start Learning?</h2>
        <p class="mb-4">Join RECTEM’s innovative online platform today and experience digital education.</p>
        <a href="{{ url('login') }}" class="btn btn-dark btn-lg">Login Now</a>
    </div>
</section>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <p class="mb-1">&copy; 2025 RECTEM Online Learning Platform. All Rights Reserved.</p>
       
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
