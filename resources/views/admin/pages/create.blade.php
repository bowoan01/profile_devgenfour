@extends('layouts.admin')

@section('title', 'Tambah Halaman')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf
            @include('admin.pages.partials.form', ['page' => new \App\Models\Page()])
        </form>
    </div>
</div>
@endsection
