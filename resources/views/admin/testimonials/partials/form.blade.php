<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $testimonial->name) }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Jabatan / Posisi</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $testimonial->title) }}">
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Perusahaan</label>
        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company', $testimonial->company) }}">
        @error('company')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Rating</label>
        <input type="number" min="1" max="5" name="rating" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating', $testimonial->rating ?? 5) }}">
        @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Pesan</label>
        <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror" required>{{ old('message', $testimonial->message) }}</textarea>
        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Urutan</label>
        <input type="number" name="order_column" class="form-control @error('order_column') is-invalid @enderror" value="{{ old('order_column', $testimonial->order_column) }}">
        @error('order_column')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Tampilkan di situs</label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
