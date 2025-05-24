<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Blog & Book') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
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
        .footer {
            background-color: #2c3e50;
            color: #ffffff;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,.05);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .dropdown-item {
            padding: 0.5rem 1rem;
            font-weight: 500;
        }
        .dropdown-item i {
            width: 1.25rem;
            margin-right: 0.5rem;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
        .btn-link {
            text-decoration: none;
            font-weight: 500;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-book-reader me-2"></i>Blog & Book
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">
                            <i class="fas fa-book"></i> Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">
                            <i class="fas fa-blog"></i> Blog
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Sign In to Access
                        </a>
                    </li>
                @endauth
            </ul>

            @auth
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if(Auth::user()->is_admin)
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger w-100 text-start px-3">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
</nav>

<main class="py-4">
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mb-3">About Blog & Book</h5>
                <p class="text-light">Discover amazing books and engaging blog posts all in one place. Your go-to platform for reading and sharing knowledge.</p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Connect With Us</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
            </div>
        </div>
        <hr class="mt-4 border-light">
        <div class="text-center text-light">
            <small>&copy; {{ date('Y') }} Blog & Book. All rights reserved.</small>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
