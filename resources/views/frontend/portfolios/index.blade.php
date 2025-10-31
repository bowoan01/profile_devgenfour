@extends('layouts.frontend')

@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container py-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="fw-bold mb-1">Portofolio</h1>
            <p class="text-muted mb-0">Beberapa proyek terbaru yang kami banggakan.</p>
        </div>
        <form class="d-flex gap-2" method="GET" action="{{ route('portfolios.index') }}">
            <input type="text" name="service" class="form-control" placeholder="Filter berdasarkan slug layanan" value="{{ request('service') }}">
            <button class="btn btn-outline-primary" type="submit">Filter</button>
        </form>
    </div>
    <div class="row g-4">
        @foreach($portfolios as $portfolio)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    @if($portfolio->featured_image)
                        <img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="card-img-top" alt="{{ $portfolio->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $portfolio->title }}</h5>
                        <p class="text-muted small">{{ $portfolio->client_name }} • {{ optional($portfolio->project_date)->translatedFormat('F Y') }}</p>
                        <p class="card-text">{{ Str::limit($portfolio->summary ?? strip_tags($portfolio->body), 120) }}</p>
                        <a href="{{ route('portfolios.show', $portfolio->slug) }}" class="stretched-link">Detail proyek</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $portfolios->links() }}</div>
</div>
@endsection
