@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="bg-white p-4 p-md-5 shadow-sm rounded">
                <h1 class="fw-bold mb-2">{{ $post->title }}</h1>
                <p class="text-muted mb-4">{{ $post->author?->name }} • {{ optional($post->published_at)->translatedFormat('d F Y') }}</p>
                @if($post->thumbnail)
                    <img src="{{ asset('storage/'.$post->thumbnail) }}" class="img-fluid rounded mb-4" alt="{{ $post->title }}">
                @endif
                <div class="content-body">
                    {!! $post->content !!}
                </div>
                <div class="mt-4">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">← Kembali ke blog</a>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
