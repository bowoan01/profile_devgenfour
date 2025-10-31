@extends('layouts.admin')

@section('title', 'Edit Metadata SEO')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.seo-metadata.update', $record) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.seo.partials.form', ['record' => $record])
        </form>
    </div>
</div>
@endsection
