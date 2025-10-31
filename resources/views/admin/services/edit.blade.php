@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.services.partials.form', ['service' => $service])
        </form>
    </div>
</div>
@endsection
