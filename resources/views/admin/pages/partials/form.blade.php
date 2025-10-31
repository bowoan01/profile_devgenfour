<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $page->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $page->slug) }}">
        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Template</label>
        <select name="template" class="form-select @error('template') is-invalid @enderror">
            <option value="default" @selected(old('template', $page->template) === 'default')>Default</option>
            <option value="landing" @selected(old('template', $page->template) === 'landing')>Landing</option>
        </select>
        @error('template')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
            <option value="draft" @selected(old('status', $page->status) === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $page->status) === 'published')>Published</option>
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Meta Data (JSON)</label>
        <textarea name="meta" rows="3" class="form-control @error('meta') is-invalid @enderror">{{ old('meta', $page->meta ? json_encode($page->meta) : '') }}</textarea>
        <small class="text-muted">Opsional, gunakan format JSON.</small>
        @error('meta')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Konten</label>
        <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content', $page->content) }}</textarea>
        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
