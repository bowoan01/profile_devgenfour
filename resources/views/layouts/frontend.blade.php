<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @seo
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-light" style="font-family: 'Poppins', sans-serif;">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">CV Devgenfour</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('portfolios.index') }}">Portofolio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
                <li class="nav-item"><a class="btn btn-primary ms-lg-3" href="{{ route('contact.create') }}">Kontak Kami</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-5">
    @if(session('status'))
        <div class="container">
            <div class="alert alert-success shadow-sm">{{ session('status') }}</div>
        </div>
    @endif

    @yield('content')
</main>

<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-4">
                <h5 class="fw-semibold">CV Devgenfour</h5>
                <p>Solusi digital terpercaya untuk pengembangan aplikasi Web, Mobile, dan IoT.</p>
                <p class="small mb-0">Indramayu, Jawa Barat</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold">Kontak</h6>
                <ul class="list-unstyled small">
                    <li>Email: hello@devgenfour.com</li>
                    <li>Telepon: +62 852-1234-5678</li>
                    <li>WhatsApp: {{ config('company.whatsapp') }}</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold">Ikuti Kami</h6>
                <div class="d-flex gap-3">
                    <a class="text-white" href="https://www.linkedin.com" aria-label="LinkedIn">LinkedIn</a>
                    <a class="text-white" href="https://www.instagram.com" aria-label="Instagram">Instagram</a>
                    <a class="text-white" href="https://www.youtube.com" aria-label="YouTube">YouTube</a>
                </div>
            </div>
        </div>
        <div class="text-center small mt-4">&copy; {{ now()->year }} CV Devgenfour. All rights reserved.</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
