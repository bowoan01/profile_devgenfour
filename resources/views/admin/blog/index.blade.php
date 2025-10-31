@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4 mb-0">Artikel Blog</h2>
    <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary">Tulis Artikel</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Diterbitkan</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author?->name }}</td>
                        <td><span class="badge bg-{{ $post->is_published ? 'success' : 'secondary' }}">{{ $post->is_published ? 'Publik' : 'Draft' }}</span></td>
                        <td>{{ optional($post->published_at)->translatedFormat('d M Y') ?? '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.blog-posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $posts->links() }}</div>
</div>
@endsection
