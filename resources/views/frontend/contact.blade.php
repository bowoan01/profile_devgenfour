@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <h1 class="fw-bold mb-3">Hubungi Kami</h1>
            <p class="text-muted">Ceritakan kebutuhan bisnis Anda dan tim kami akan menghubungi dalam 1x24 jam.</p>
            <div class="bg-white rounded shadow-sm p-4 mb-4">
                <h5 class="fw-semibold">Informasi Kontak</h5>
                <ul class="list-unstyled text-muted mb-0">
                    <li>Email: hello@devgenfour.com</li>
                    <li>Telepon: +62 852-1234-5678</li>
                    <li>WhatsApp: {{ $whatsapp_number }}</li>
                    <li>Lokasi: Indramayu, Jawa Barat</li>
                </ul>
            </div>
            <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.330321652072!2d108.3223534!3d-7.2096697" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="bg-white p-4 p-md-5 shadow-sm rounded">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon / WhatsApp</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
