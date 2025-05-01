<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduSmart')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e7df9;
            --primary-dark: #3a64d8;
            --secondary-color: #38b2ac;
            --accent-color: #f6ad55;
            --light-gray: #e2e8f0;
            --dark-gray: #2d3748;
            --error-color: #e53e3e;
            --success-color: #38a169;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #FDFDFC;
            min-height: 100vh;
            color: #1b1b18;
        }

        .dark-mode body {
            background-color: #0a0a0a;
            color: #f7fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .dark-mode .card {
            background-color: #1a202c;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3), 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark-gray);
        }

        .dark-mode label {
            color: #e2e8f0;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(78, 125, 249, 0.2);
        }

        .dark-mode input[type="text"],
        .dark-mode input[type="email"],
        .dark-mode input[type="password"],
        .dark-mode select,
        .dark-mode textarea {
            background-color: #2d3748;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline:hover {
            background-color: rgba(78, 125, 249, 0.1);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: #2c9a94;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: var(--error-color);
            border-left: 4px solid var(--error-color);
        }

        .alert-success {
            background-color: #f0fff4;
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .dark-mode .alert-danger {
            background-color: rgba(229, 62, 62, 0.1);
        }

        .dark-mode .alert-success {
            background-color: rgba(56, 161, 105, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            border-radius: 10px;
        }

        .dark-mode .navbar {
            background-color: #1a202c;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar-brand svg {
            margin-right: 0.5rem;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .navbar-menu a {
            color: var(--dark-gray);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .dark-mode .navbar-menu a {
            color: #e2e8f0;
        }

        .navbar-menu a:hover {
            color: var(--primary-color);
        }

        .theme-toggle {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--dark-gray);
            font-size: 1.25rem;
        }

        .dark-mode .theme-toggle {
            color: #e2e8f0;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .navbar {
                flex-direction: column;
                padding: 1rem;
            }

            .navbar-brand {
                margin-bottom: 1rem;
            }

            .navbar-menu {
                flex-direction: column;
                gap: 1rem;
                width: 100%;
            }
        }

        /* Decoration elements */
        .decoration {
            position: fixed;
            z-index: -1;
            opacity: 0.5;
        }

        .decoration-1 {
            bottom: 5%;
            left: 5%;
            color: var(--secondary-color);
        }

        .decoration-2 {
            top: 10%;
            right: 8%;
            color: var(--accent-color);
        }

        .decoration-3 {
            bottom: 15%;
            right: 5%;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="decoration decoration-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
    </div>
    <div class="decoration decoration-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
        </svg>
    </div>
    <div class="decoration decoration-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 17l-2 2 2 2m0-4l2 2-2 2"></path>
            <path d="M12 2l-2 2 2 2m0-4l2 2-2 2"></path>
            <path d="M12 12l-2-2-2 2 2 2 2-2z"></path>
            <path d="M12 12l2-2 2 2-2 2-2-2z"></path>
            <path d="M12 12l-2 2-2-2 2-2 2 2z"></path>
            <path d="M12 12l2 2 2-2-2-2-2 2z"></path>
        </svg>
    </div>

    <div class="container">
        @if(isset($showNavbar) && $showNavbar)
        <nav class="navbar">
            <a href="{{ route('welcome') }}" class="navbar-brand">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                </svg>
                EduSmart
            </a>
            <div class="navbar-menu">
                @auth
                    @if(Auth::user()->role == 'student')
                        <a href="{{ route('student.dashboard') }}">Dashboard</a>
                        <a href="{{ route('student.courses') }}">My Courses</a>
                    @elseif(Auth::user()->role == 'teacher')
                        <a href="{{ route('teacher.dashboard') }}">Dashboard</a>
                        <a href="{{ route('teacher.courses') }}">My Courses</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                @else
                    <a href="{{ route('welcome') }}">Home</a>
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
                <button class="theme-toggle" id="theme-toggle">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
        </nav>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        
        // Check for saved theme preference or default to light
        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') {
            body.classList.add('dark-mode');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
        
        // Toggle theme when button is clicked
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            
            // Update theme icon
            if (body.classList.contains('dark-mode')) {
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>
</html>