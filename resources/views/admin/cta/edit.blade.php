@extends('layouts.admin')

@section('content')

<div class="container">

    <h1>Edit CTA</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.cta.update', $cta->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input
                type="text"
                name="title"
                value="{{ old('title', $cta->title) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <textarea
                name="subtitle"
                class="form-control"
                rows="4">{{ old('subtitle', $cta->subtitle) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Button Text</label>
            <input
                type="text"
                name="button_text"
                value="{{ old('button_text', $cta->button_text) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Button Link</label>
            <input
                type="text"
                name="button_link"
                value="{{ old('button_link', $cta->button_link) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Background Color</label>
            <input
                type="color"
                name="background_color"
                value="{{ $cta->background_color }}"
                class="form-control form-control-color">
        </div>

        <div class="mb-3">
            <label>Button Color</label>
            <input
                type="color"
                name="button_color"
                value="{{ $cta->button_color }}"
                class="form-control form-control-color">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

@endsection