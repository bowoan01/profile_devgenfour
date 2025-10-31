@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="bg-white p-4 p-md-5 shadow-sm rounded">
                <h1 class="fw-bold mb-3">{{ $page->title }}</h1>
                <p class="text-muted small mb-4">Terakhir diperbarui {{ $page->updated_at->translatedFormat('d F Y H:i') }}</p>
                <div class="content-body">
                    {!! $page->content !!}
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
