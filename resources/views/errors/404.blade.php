<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | {{ config('app.name', 'Blog & Book') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #2c3e50;
        }
        .nav-link {
            font-weight: 500;
            color: #2c3e50;
            margin: 0 1rem;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #3498db;
        }
        .dropdown-item {
            padding: 0.5rem 1rem;
            font-weight: 500;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .button-hover-slide {
            position: relative;
            transition: all 0.3s ease;
            overflow: hidden;
            z-index: 1;
        }
        .button-hover-slide:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            z-index: -1;
        }
        .button-hover-slide:hover:before {
            width: 100%;
        }
        .button-hover-slide:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        img {
            animation: float 6s ease-in-out infinite;
        }
        .display-1 {
            text-shadow: 2px 2px 15px rgba(0,0,0,0.1);
        }
        .btn {
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        @media (max-width: 576px) {
            .display-1 {
                font-size: 100px !important;
            }
            .h1 {
                font-size: 1.8rem;
            }
            .lead {
                font-size: 1rem;
            }
            .d-flex {
                flex-direction: column;
            }
            .btn {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-book-reader me-2"></i>
            {{ config('app.name', 'Blog & Book') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">
                            <i class="fas fa-book me-1"></i> Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">
                            <i class="fas fa-newspaper me-1"></i> Posts
                        </a>
                    </li>

                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-cog me-1"></i> Admin Panel
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="text-center">
        <!-- Animated 404 Number -->
        <div class="position-relative mb-4" style="height: 150px;">
            <h1 class="display-1 position-absolute w-100 text-primary"
                style="font-size: 150px; opacity: 0.1; font-weight: 900;">
                404
            </h1>
            <h1 class="display-1 position-absolute w-100"
                style="font-size: 100px; font-weight: 900; background: linear-gradient(45deg, #3498db, #2ecc71);
                       -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                404
            </h1>
        </div>

        <!-- Main Content -->
        <div class="mb-5">
            <h2 class="h1 mb-4">Page Not Found</h2>
            <p class="lead text-muted mb-4">Oops! The page you're looking for seems to have vanished into thin air.</p>

            <!-- Animated SVG Illustration -->
            <div class="mb-5">
                <img src="https://media.tenor.com/UsggMuRixo0AAAAM/baka-anime.gif"
                     alt="404 illustration"
                     class="img-fluid mx-auto"
                     style="max-width: 400px;">
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary btn-lg px-4 button-hover-slide">
                    <i class="fas fa-arrow-left me-2"></i> Go Back
                </a>
                <a href="{{ route('home') }}"
                   class="btn btn-primary btn-lg px-4 button-hover-slide">
                    <i class="fas fa-home me-2"></i> Go Home
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
