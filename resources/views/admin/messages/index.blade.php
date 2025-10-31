@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Diterima</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td><a href="{{ route('admin.messages.show', $message) }}" class="text-decoration-none">{{ $message->name }}</a></td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone ?? '-' }}</td>
                        <td>{{ $message->created_at->translatedFormat('d M Y H:i') }}</td>
                        <td><span class="badge bg-{{ $message->is_read ? 'secondary' : 'primary' }}">{{ $message->is_read ? 'Dibaca' : 'Baru' }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada pesan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $messages->links() }}</div>
</div>
@endsection
