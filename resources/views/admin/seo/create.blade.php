@extends('layouts.admin')

@section('title', 'Tambah Metadata SEO')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.seo-metadata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.seo.partials.form', ['record' => new \App\Models\SeoMetadata()])
        </form>
    </div>
</div>
@endsection
