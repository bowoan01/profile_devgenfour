@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.testimonials.partials.form', ['testimonial' => $testimonial])
        </form>
    </div>
</div>
@endsection
