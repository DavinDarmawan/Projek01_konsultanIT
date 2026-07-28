@extends('layouts.admin')
@section('title', 'Edit Hero')
@section('page-title', 'Edit Hero')
@section('content')
<div class="neo-card">
    <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control border-3 border-black rounded-0" value="{{ $hero->title }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Subtitle</label>
            <textarea name="subtitle" class="form-control border-3 border-black rounded-0" rows="3">{{ $hero->subtitle }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Button Text</label>
            <input type="text" name="button_text" class="form-control border-3 border-black rounded-0" value="{{ $hero->button_text }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Button Link</label>
            <input type="text" name="button_link" class="form-control border-3 border-black rounded-0" value="{{ $hero->button_link }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Image</label>
            @if($hero->image) <img src="{{ asset('storage/'.$hero->image) }}" width="100" class="border-3 border-black mb-2"> @endif
            <input type="file" name="image" class="form-control border-3 border-black rounded-0">
        </div>
        <button type="submit" class="neo-btn">Update</button>
    </form>
</div>
@endsection