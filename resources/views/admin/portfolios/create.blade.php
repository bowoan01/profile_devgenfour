@extends('layouts.admin')

@section('title', 'Tambah Portofolio')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.portfolios.partials.form', ['portfolio' => new \App\Models\Portfolio(), 'services' => $services])
        </form>
    </div>
</div>
@endsection
