@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            @include('admin.services.partials.form', ['service' => new \App\Models\Service()])
        </form>
    </div>
</div>
@endsection
