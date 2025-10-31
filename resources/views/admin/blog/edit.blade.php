@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.blog-posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.blog.partials.form', ['post' => $post])
        </form>
    </div>
</div>
@endsection
