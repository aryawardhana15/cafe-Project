@extends('/layouts/auth')

@push('css-dependencies')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/landing.css" rel="stylesheet">
<style>
    /* Custom Styling */
    .masthead {
        background: url('/images/coffee-bg.jpg') no-repeat center center;
        background-size: cover;
        height: 100vh;
        position: relative;
    }
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }
    .masthead .container {
        position: relative;
        z-index: 2;
    }
    .masthead h1 {
        font-size: 3rem;
        font-weight: bold;
        color: #fff;
    }
    .masthead h2 {
        font-size: 1.5rem;
        color: rgba(255, 255, 255, 0.8);
    }
    .btn-primary {
        background-color: #c99c33;
        border-color: #c99c33;
        padding: 12px 24px;
        font-size: 1.2rem;
    }
    .btn-primary:hover {
        background-color: #a67c28;
        border-color: #a67c28;
    }
</style>
@endpush

@push('scripts-dependencies')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/landing.js"></script>
@endpush

@section("content")
<header class="masthead d-flex align-items-center justify-content-center">
    <div class="overlay"></div>
    <div class="container text-center">
        <h1 class="text-uppercase">Projectcoffe</h1>
        <h2 class="mt-2 mb-4">New way to enjoy quality coffee</h2>
        <a class="btn btn-primary" href="auth">Get Started</a>
    </div>
</header>
@endsection
