@extends('layouts.app')

@section('content')
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

<style>
/* Animations and Effects */
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

/* Gradients and Shadows */
.display-1 {
    text-shadow: 2px 2px 15px rgba(0,0,0,0.1);
}

.btn {
    border-radius: 50px;
    padding: 12px 30px;
    font-weight: 500;
    letter-spacing: 0.5px;
}

/* Responsive Adjustments */
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
@endsection
