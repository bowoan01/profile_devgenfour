@extends('layouts.admin')

@section('title', 'Portofolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4 mb-0">Portofolio Proyek</h2>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">Tambah Portofolio</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Klien</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $portfolio)
                    <tr>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->client_name ?? '-' }}</td>
                        <td>{{ optional($portfolio->project_date)->translatedFormat('d M Y') ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $portfolio->is_published ? 'success' : 'secondary' }}">{{ $portfolio->is_published ? 'Publik' : 'Draft' }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus portofolio ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada portofolio.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $portfolios->links() }}</div>
</div>
@endsection
