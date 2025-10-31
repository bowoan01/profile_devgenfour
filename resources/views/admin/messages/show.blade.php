@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">{{ $message->name }}</h5>
            <small class="text-muted">{{ $message->email }} • {{ $message->created_at->translatedFormat('d M Y H:i') }}</small>
        </div>
        <form action="{{ route('admin.messages.update', $message) }}" method="POST" class="d-flex align-items-center gap-2">
            @csrf
            @method('PUT')
            <input type="hidden" name="is_read" value="{{ $message->is_read ? 0 : 1 }}">
            <button class="btn btn-sm btn-outline-primary" type="submit">Tandai {{ $message->is_read ? 'Belum Dibaca' : 'Sudah Dibaca' }}</button>
        </form>
    </div>
    <div class="card-body">
        <p class="mb-2"><strong>Telepon:</strong> {{ $message->phone ?? '-' }}</p>
        <p>{{ $message->message }}</p>
        <div class="mt-4 d-flex gap-2">
            <a href="mailto:{{ $message->email }}" class="btn btn-outline-primary btn-sm">Balas Email</a>
            @if($message->phone)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}" class="btn btn-success btn-sm" target="_blank" rel="noopener">Hubungi via WhatsApp</a>
            @endif
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm" type="submit">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
