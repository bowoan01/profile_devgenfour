@extends('layouts.frontend')

@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Blog Devgenfour</h1>
        <p class="text-muted">Insight teknologi dan update terbaru dari tim kami.</p>
    </div>
    <div class="row g-4">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/'.$post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <small class="text-muted d-block mb-2">{{ optional($post->published_at)->translatedFormat('d M Y') }}</small>
                        <h5>{{ $post->title }}</h5>
                        <p class="text-muted">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="stretched-link">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $posts->links() }}</div>
</div>
@endsection
