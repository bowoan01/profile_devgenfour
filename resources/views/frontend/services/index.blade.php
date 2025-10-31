@extends('layouts.frontend')

@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Layanan Kami</h1>
        <p class="text-muted">Solusi menyeluruh dari strategi hingga implementasi untuk bisnis Anda.</p>
    </div>
    <div class="row g-4">
        @foreach($services as $service)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="display-5 text-primary mb-3"><i class="bi {{ $service->icon ?? 'bi-code-slash' }}"></i></div>
                        <h4>{{ $service->title }}</h4>
                        <p class="text-muted">{{ Str::limit($service->excerpt ?? strip_tags($service->description), 140) }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="stretched-link">Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
