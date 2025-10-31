@component('mail::message')
# Pesan Kontak Baru

Anda menerima pesan baru dari formulir kontak CV Devgenfour.

@component('mail::panel')
**Nama:** {{ $messageModel->name }}  
**Email:** {{ $messageModel->email }}  
**Telepon:** {{ $messageModel->phone ?? '-' }}
@endcomponent

{{ $messageModel->message }}

@component('mail::button', ['url' => config('app.url').'/admin/messages'])
Buka Pesan
@endcomponent

Terima kasih,
{{ config('app.name') }}
@endcomponent
