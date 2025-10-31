<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Admin CV Devgenfour</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.24.0/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-body-tertiary">
    <div class="d-flex">
        <aside class="bg-dark text-white p-4" style="min-width: 240px; min-height: 100vh;">
            <h5 class="fw-bold mb-4">CV Devgenfour</h5>
            <nav class="nav flex-column gap-2">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="ti ti-dashboard me-2"></i> Dashboard</a>
                <a class="nav-link text-white" href="{{ route('admin.pages.index') }}"><i class="ti ti-notes me-2"></i> Halaman</a>
                <a class="nav-link text-white" href="{{ route('admin.services.index') }}"><i class="ti ti-rocket me-2"></i> Layanan</a>
                <a class="nav-link text-white" href="{{ route('admin.portfolios.index') }}"><i class="ti ti-briefcase me-2"></i> Portofolio</a>
                <a class="nav-link text-white" href="{{ route('admin.team-members.index') }}"><i class="ti ti-users me-2"></i> Tim</a>
                <a class="nav-link text-white" href="{{ route('admin.testimonials.index') }}"><i class="ti ti-mood-happy me-2"></i> Testimoni</a>
                <a class="nav-link text-white" href="{{ route('admin.blog-posts.index') }}"><i class="ti ti-news me-2"></i> Blog</a>
                <a class="nav-link text-white" href="{{ route('admin.messages.index') }}"><i class="ti ti-mail me-2"></i> Pesan</a>
                <a class="nav-link text-white" href="{{ route('admin.seo-metadata.index') }}"><i class="ti ti-search me-2"></i> SEO</a>
                <a class="nav-link text-white" href="{{ route('admin.users.index') }}"><i class="ti ti-shield-lock me-2"></i> Pengguna</a>
                <a class="nav-link text-white" href="{{ route('admin.profile.edit') }}"><i class="ti ti-user-circle me-2"></i> Profil</a>
            </nav>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto">
                @csrf
                <button class="btn btn-outline-light w-100 mt-4" type="submit">Keluar</button>
            </form>
        </aside>
        <main class="flex-grow-1">
            <header class="bg-white border-bottom py-3">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h4 mb-0">@yield('title', 'Dashboard')</h1>
                        <p class="text-muted small mb-0">{{ config('app.name') }} Admin Panel</p>
                    </div>
                    <div class="text-end">
                        <span class="fw-semibold">{{ auth()->user()->name }}</span>
                        <div class="small text-muted">{{ auth()->user()->getRoleNames()->join(', ') }}</div>
                    </div>
                </div>
            </header>
            <section class="container-fluid py-4">
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @yield('content')
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
