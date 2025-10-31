<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $post->slug) }}">
        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Thumbnail</label>
        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
        @if($post->thumbnail)
            <small class="text-muted">Saat ini: {{ $post->thumbnail }}</small>
        @endif
        @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Ringkasan</label>
        <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
        @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Konten</label>
        <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $post->content) }}</textarea>
        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
        @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check form-switch mt-4 mt-md-0">
            <input class="form-check-input" type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
            <label class="form-check-label">Terbitkan</label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
