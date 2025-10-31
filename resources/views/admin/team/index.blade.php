@extends('layouts.admin')

@section('title', 'Tim')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4 mb-0">Tim Devgenfour</h2>
    <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">Tambah Anggota</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teamMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->email ?? '-' }}</td>
                        <td><span class="badge bg-{{ $member->is_active ? 'success' : 'secondary' }}">{{ $member->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus anggota ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada anggota tim.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $teamMembers->links() }}</div>
</div>
@endsection
