@extends('layouts.admin')

@section('title', 'Tambah Anggota Tim')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.team.partials.form', ['teamMember' => new \App\Models\TeamMember()])
        </form>
    </div>
</div>
@endsection
