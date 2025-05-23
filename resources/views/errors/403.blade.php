@extends('layouts.error')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="text-center">
        <!-- Animated 403 Number -->
        <div class="position-relative mb-4" style="height: 150px;">
            <h1 class="display-1 position-absolute w-100 text-danger error-number"
                style="font-size: 150px; opacity: 0.1; font-weight: 900;">
                403
            </h1>
            <h1 class="display-1 position-absolute w-100"
                style="font-size: 100px; font-weight: 900; background: linear-gradient(45deg, #e74c3c, #c0392b);
                       -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                403
            </h1>
        </div>

        <!-- Main Content -->
        <div class="mb-5">
            <h2 class="h1 mb-4 fw-bold text-danger">Access Forbidden!</h2>
            <p class="lead text-muted mb-4">Oops! Looks like you don't have permission to access this area.</p>
            <p class="lead text-muted mb-4">KAMU HANYA USER BIASA BUKAN ADMIN PERGI KEMBALI</p>

            <!-- Animated GIF -->
            <div class="mb-5 error-image">
                <img src="https://media.tenor.com/p0G_BMFiGCYAAAAM/anime-really.gif"
                     alt="403 illustration"
                     class="img-fluid mx-auto rounded-circle shadow-lg"
                     style="max-width: 300px; border: 5px solid rgba(231, 76, 60, 0.1);">
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-danger btn-lg px-4 button-hover-slide">
                    <i class="fas fa-arrow-left me-2"></i> Go Back
                </a>
                <a href="{{ route('home') }}"
                   class="btn btn-danger btn-lg px-4 button-hover-slide">
                    <i class="fas fa-home me-2"></i> Go Home
                </a>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.error-number {
    animation: shake 0.8s ease-in-out;
}

.error-image img {
    animation: float 6s ease-in-out infinite;
    transition: all 0.3s ease;
}

.error-image img:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(231, 76, 60, 0.2);
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
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
}

/* Gradients and Shadows */
.display-1 {
    text-shadow: 2px 2px 15px rgba(231, 76, 60, 0.1);
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
        font-size: 80px !important;
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
    .error-image img {
        max-width: 200px !important;
    }
}
</style>
@endsection
