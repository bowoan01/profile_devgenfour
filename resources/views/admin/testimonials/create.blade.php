@extends('layouts.admin')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.testimonials.store') }}" method="POST">
            @csrf
            @include('admin.testimonials.partials.form', ['testimonial' => new \App\Models\Testimonial()])
        </form>
    </div>
</div>
@endsection
