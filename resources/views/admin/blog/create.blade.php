@extends('layouts.admin')

@section('title', 'Tulis Artikel')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.blog.partials.form', ['post' => new \App\Models\BlogPost()])
        </form>
    </div>
</div>
@endsection
