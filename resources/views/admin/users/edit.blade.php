@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.users.partials.form', ['user' => $user, 'availableRoles' => $availableRoles])
        </form>
    </div>
</div>
@endsection
