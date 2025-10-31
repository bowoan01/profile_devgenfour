@extends('layouts.admin')

@section('title', 'Metadata SEO')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4 mb-0">Pengaturan SEO</h2>
    <a href="{{ route('admin.seo-metadata.create') }}" class="btn btn-primary">Tambah Metadata</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Route / Model</th>
                    <th>Judul</th>
                    <th>Diperbarui</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($records as $record)
                    <tr>
                        <td>
                            @if($record->route_name)
                                <span class="badge bg-info text-dark">Route</span> {{ $record->route_name }}
                            @elseif($record->seoable)
                                <span class="badge bg-secondary">Model</span> {{ class_basename($record->seoable_type) }} #{{ $record->seoable_id }}
                            @endif
                        </td>
                        <td>{{ $record->title ?? '-' }}</td>
                        <td>{{ $record->updated_at->translatedFormat('d M Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.seo-metadata.edit', $record) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.seo-metadata.destroy', $record) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus metadata ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada metadata.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $records->links() }}</div>
</div>
@endsection
