<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $portfolio->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $portfolio->slug) }}">
        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Klien</label>
        <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name', $portfolio->client_name) }}">
        @error('client_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Tanggal Proyek</label>
        <input type="date" name="project_date" class="form-control @error('project_date') is-invalid @enderror" value="{{ old('project_date', optional($portfolio->project_date)->format('Y-m-d')) }}">
        @error('project_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $portfolio->location) }}">
        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Industri</label>
        <input type="text" name="industry" class="form-control @error('industry') is-invalid @enderror" value="{{ old('industry', $portfolio->industry) }}">
        @error('industry')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Layanan Terkait</label>
        <select name="service_ids[]" class="form-select @error('service_ids') is-invalid @enderror" multiple size="5">
            @foreach($services as $id => $name)
                <option value="{{ $id }}" @selected(in_array($id, old('service_ids', $portfolio->services->pluck('id')->toArray())))>{{ $name }}</option>
            @endforeach
        </select>
        <small class="text-muted">Gunakan Ctrl/Cmd untuk memilih lebih dari satu.</small>
        @error('service_ids')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Ringkasan</label>
        <textarea name="summary" rows="3" class="form-control @error('summary') is-invalid @enderror">{{ old('summary', $portfolio->summary) }}</textarea>
        @error('summary')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi Lengkap</label>
        <textarea name="body" rows="7" class="form-control @error('body') is-invalid @enderror">{{ old('body', $portfolio->body) }}</textarea>
        @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Gambar Utama</label>
        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror">
        @if($portfolio->featured_image)
            <small class="text-muted">Saat ini: {{ $portfolio->featured_image }}</small>
        @endif
        @error('featured_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Galeri (maks 6 gambar)</label>
        <input type="file" name="gallery[]" class="form-control @error('gallery.*') is-invalid @enderror" multiple>
        @error('gallery')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @error('gallery.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label">Tandai sebagai unggulan</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_published" value="1" {{ old('is_published', $portfolio->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label">Tayang</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
