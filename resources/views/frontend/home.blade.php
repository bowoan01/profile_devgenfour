@extends('layouts.frontend')

@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container">
    <section class="row align-items-center g-4 py-5">
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold">Bangun Solusi Digital bersama CV Devgenfour</h1>
            <p class="lead text-muted">Kami membantu perusahaan tumbuh dengan teknologi Web, Mobile, dan IoT yang andal, aman, dan scalable.</p>
            <div class="d-flex gap-3">
                <a href="{{ route('contact.create') }}" class="btn btn-primary btn-lg">Konsultasi Sekarang</a>
                <a href="{{ route('portfolios.index') }}" class="btn btn-outline-primary btn-lg">Lihat Portofolio</a>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <img src="{{ asset('images/hero-teamwork.svg') }}" alt="Tim Devgenfour" class="img-fluid" onerror="this.style.display='none'">
        </div>
    </section>
</div>

<section class="bg-white py-5 border-top border-bottom">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-semibold mb-3">Tentang CV Devgenfour</h2>
                <p class="text-muted">{{ optional($page)->content ? strip_tags(Str::limit($page->content, 260)) : 'CV Devgenfour adalah software house yang berdedikasi menghadirkan solusi digital end-to-end dengan fokus pada kualitas, keamanan, dan pengalaman pengguna.' }}</p>
                <ul class="list-unstyled text-muted">
                    <li>✅ Pengalaman sejak 2022 melayani klien global</li>
                    <li>✅ Tim ahli lintas disiplin (UI/UX, Frontend, Backend, IoT)</li>
                    <li>✅ Proses agile dengan komunikasi transparan</li>
                </ul>
                <a href="{{ route('about') }}" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-4 bg-primary text-white rounded shadow-sm">
                            <h3 class="fw-bold mb-1">30+</h3>
                            <p class="mb-0">Proyek sukses</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-white text-dark rounded shadow-sm border">
                            <h3 class="fw-bold mb-1">15+</h3>
                            <p class="mb-0">Klien & partner</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-4 bg-white text-dark rounded shadow-sm border">
                            <h3 class="fw-bold mb-1">ISO-ready workflows</h3>
                            <p class="mb-0">Proses pengembangan dengan standar keamanan dan kualitas tinggi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-semibold">Layanan Kami</h2>
            <a href="{{ route('services.index') }}" class="btn btn-link">Semua layanan →</a>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="display-6 text-primary mb-3"><i class="bi {{ $service->icon ?? 'bi-code-slash' }}"></i></div>
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($service->excerpt ?? strip_tags($service->description), 120) }}</p>
                            <a href="{{ route('services.show', $service->slug) }}" class="stretched-link">Pelajari lebih lanjut</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-5 border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-semibold">Studi Kasus Terbaru</h2>
            <a href="{{ route('portfolios.index') }}" class="btn btn-link">Semua portofolio →</a>
        </div>
        <div class="row g-4">
            @foreach($portfolios as $portfolio)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($portfolio->featured_image)
                            <img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="card-img-top" alt="{{ $portfolio->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $portfolio->title }}</h5>
                            <p class="text-muted small mb-2">{{ $portfolio->client_name }} • {{ optional($portfolio->project_date)->translatedFormat('F Y') }}</p>
                            <p class="card-text">{{ Str::limit($portfolio->summary ?? strip_tags($portfolio->body), 100) }}</p>
                            <a href="{{ route('portfolios.show', $portfolio->slug) }}" class="stretched-link">Detail proyek</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <h2 class="fw-semibold">Apa kata klien kami</h2>
                <p class="text-muted">Kepercayaan dan kepuasan pelanggan menjadi prioritas utama kami dalam setiap kolaborasi.</p>
                <a href="{{ route('contact.create') }}" class="btn btn-outline-primary">Diskusi proyek</a>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    @foreach($testimonials as $testimonial)
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="mb-2 text-warning">@for($i=0;$i<$testimonial->rating;$i++)★@endfor</div>
                                    <p class="text-muted">“{{ Str::limit($testimonial->message, 140) }}”</p>
                                    <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                    <small class="text-muted">{{ $testimonial->title }} • {{ $testimonial->company }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-5 border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-semibold">Tim Inti</h2>
            <a href="{{ route('contact.create') }}" class="btn btn-link">Gabung tim kami →</a>
        </div>
        <div class="row g-4">
            @foreach($teamMembers as $member)
                <div class="col-md-4 col-lg-3">
                    <div class="card text-center border-0 shadow-sm h-100">
                        @if($member->photo)
                            <img src="{{ asset('storage/'.$member->photo) }}" class="card-img-top" alt="{{ $member->name }}">
                        @endif
                        <div class="card-body">
                            <h6 class="fw-semibold mb-0">{{ $member->name }}</h6>
                            <small class="text-muted">{{ $member->position }}</small>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-3">
                            @if($member->linkedin_url)
                                <a href="{{ $member->linkedin_url }}" class="text-primary me-2" target="_blank" rel="noopener">LinkedIn</a>
                            @endif
                            @if($member->instagram_url)
                                <a href="{{ $member->instagram_url }}" class="text-danger" target="_blank" rel="noopener">Instagram</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-semibold">Insight Terbaru</h2>
            <a href="{{ route('blog.index') }}" class="btn btn-link">Semua artikel →</a>
        </div>
        <div class="row g-4">
            @foreach($blogPosts as $post)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($post->thumbnail)
                            <img src="{{ asset('storage/'.$post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <small class="text-muted">{{ optional($post->published_at)->translatedFormat('d M Y') }}</small>
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="stretched-link">Baca selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
