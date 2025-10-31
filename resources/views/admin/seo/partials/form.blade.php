<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama Route</label>
        <input type="text" name="route_name" class="form-control @error('route_name') is-invalid @enderror" value="{{ old('route_name', $record->route_name) }}" placeholder="contoh: home">
        @error('route_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Model (FQCN)</label>
        <input type="text" name="seoable_type" class="form-control @error('seoable_type') is-invalid @enderror" value="{{ old('seoable_type', $record->seoable_type) }}" placeholder="App\\Models\\Page">
        @error('seoable_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">ID Model</label>
        <input type="number" name="seoable_id" class="form-control @error('seoable_id') is-invalid @enderror" value="{{ old('seoable_id', $record->seoable_id) }}">
        @error('seoable_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $record->title) }}">
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $record->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Kata Kunci</label>
        <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" value="{{ old('keywords', $record->keywords) }}" placeholder="kata kunci, dipisah, koma">
        @error('keywords')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Gambar OpenGraph</label>
        <input type="file" name="og_image" class="form-control @error('og_image') is-invalid @enderror">
        @if($record->og_image)
            <small class="text-muted">Saat ini: {{ $record->og_image }}</small>
        @endif
        @error('og_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Extras (JSON)</label>
        <textarea name="extras" rows="3" class="form-control @error('extras') is-invalid @enderror">{{ old('extras', $record->extras ? json_encode($record->extras) : '') }}</textarea>
        @error('extras')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.seo-metadata.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
