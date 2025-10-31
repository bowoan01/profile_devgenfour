<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $teamMember->name) }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Posisi</label>
        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $teamMember->position) }}" required>
        @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $teamMember->email) }}">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">LinkedIn</label>
        <input type="url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}">
        @error('linkedin_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Instagram</label>
        <input type="url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url', $teamMember->instagram_url) }}">
        @error('instagram_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Urutan</label>
        <input type="number" name="order_column" class="form-control @error('order_column') is-invalid @enderror" value="{{ old('order_column', $teamMember->order_column) }}">
        @error('order_column')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Foto</label>
        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
        @if($teamMember->photo)
            <small class="text-muted">Saat ini: {{ $teamMember->photo }}</small>
        @endif
        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Bio</label>
        <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $teamMember->bio) }}</textarea>
        @error('bio')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Aktif</label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
