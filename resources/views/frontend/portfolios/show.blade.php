@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <article class="bg-white p-4 p-md-5 shadow-sm rounded">
                <h1 class="fw-bold mb-2">{{ $portfolio->title }}</h1>
                <p class="text-muted mb-4">{{ $portfolio->client_name }} • {{ optional($portfolio->project_date)->translatedFormat('d F Y') }}</p>
                @if($portfolio->featured_image)
                    <img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="img-fluid rounded mb-4" alt="{{ $portfolio->title }}">
                @endif
                <div class="content-body">
                    {!! $portfolio->body !!}
                </div>
                @if($portfolio->services->isNotEmpty())
                    <div class="mt-4">
                        <h6 class="fw-semibold">Layanan yang terlibat</h6>
                        <ul class="list-inline text-muted">
                            @foreach($portfolio->services as $service)
                                <li class="list-inline-item badge bg-primary-subtle text-primary">{{ $service->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($portfolio->images->isNotEmpty())
                    <div class="mt-4">
                        <h6 class="fw-semibold">Galeri Proyek</h6>
                        <div class="row g-3">
                            @foreach($portfolio->images as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/'.$image->path) }}" class="img-fluid rounded" alt="{{ $image->caption }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <a href="{{ route('contact.create') }}" class="btn btn-primary mt-4">Ingin proyek serupa?</a>
            </article>
        </div>
    </div>
</div>
@endsection
