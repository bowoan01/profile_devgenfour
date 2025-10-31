@extends('layouts.admin')

@section('title', 'Edit Halaman')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.pages.partials.form', ['page' => $page])
        </form>
    </div>
</div>
@endsection
