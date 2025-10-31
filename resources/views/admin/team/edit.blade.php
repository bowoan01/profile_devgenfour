@extends('layouts.admin')

@section('title', 'Edit Anggota Tim')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.team.partials.form', ['teamMember' => $teamMember])
        </form>
    </div>
</div>
@endsection
