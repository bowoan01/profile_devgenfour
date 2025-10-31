@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            @include('admin.users.partials.form', ['user' => new \App\Models\User(), 'availableRoles' => $availableRoles])
        </form>
    </div>
</div>
@endsection
