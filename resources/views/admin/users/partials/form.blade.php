<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Kata Sandi</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @if($user->exists)
            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah.</small>
        @endif
        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Peran</label>
        @php $selectedRoles = old('roles', $user->getRoleNames()->toArray()); @endphp
        @if(empty($availableRoles))
            <div class="alert alert-warning mb-2">
                Belum ada data peran. Tambahkan peran melalui seeder atau panel manajemen peran sebelum membuat pengguna baru.
            </div>
        @else
            <select name="roles[]" class="form-select @error('roles') is-invalid @enderror" multiple required>
                @foreach($availableRoles as $role)
                    <option value="{{ $role }}" @selected(in_array($role, (array) $selectedRoles, true))>{{ ucwords(str_replace('-', ' ', $role)) }}</option>
                @endforeach
            </select>
            <small class="text-muted">Tahan Ctrl/Cmd untuk memilih lebih dari satu.</small>
        @endif
        @error('roles')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
