@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="bg-white p-4 p-md-5 shadow-sm rounded">
                <div class="mb-3 text-primary display-6"><i class="bi {{ $service->icon ?? 'bi-code-slash' }}"></i></div>
                <h1 class="fw-bold">{{ $service->title }}</h1>
                <p class="text-muted">{{ $service->excerpt }}</p>
                <div class="content-body">
                    {!! $service->description !!}
                </div>
                <a href="{{ route('contact.create') }}" class="btn btn-primary mt-4">Diskusikan kebutuhan Anda</a>
            </article>
        </div>
    </div>
</div>
@endsection
