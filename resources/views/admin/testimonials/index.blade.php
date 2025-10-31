@extends('layouts.admin')

@section('title', 'Testimoni')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4 mb-0">Testimoni Klien</h2>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Tambah Testimoni</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Perusahaan</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->company ?? '-' }}</td>
                        <td>{{ $testimonial->rating }}/5</td>
                        <td><span class="badge bg-{{ $testimonial->is_active ? 'success' : 'secondary' }}">{{ $testimonial->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus testimoni ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada testimoni.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $testimonials->links() }}</div>
</div>
@endsection
