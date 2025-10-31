@extends('layouts.admin')

@section('title', 'Edit Portofolio')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.portfolios.partials.form', ['portfolio' => $portfolio, 'services' => $services])
        </form>
    </div>
</div>
@endsection
