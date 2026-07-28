@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control border-3 border-black rounded-0" value="{{ $service->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Slug</label>
                <input type="text" name="slug" class="form-control border-3 border-black rounded-0" value="{{ $service->slug }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control border-3 border-black rounded-0" rows="4" required>{{ $service->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Benefits</label>
                <textarea name="benefits" class="form-control border-3 border-black rounded-0" rows="3">{{ $service->benefits }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Technologies</label>
                <input type="text" name="technologies" class="form-control border-3 border-black rounded-0" value="{{ $service->technologies }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Image</label>
                @if($service->image)
                    <div><img src="{{ asset('storage/'.$service->image) }}" width="100" class="border-3 border-black mb-2"></div>
                @endif
                <input type="file" name="image" class="form-control border-3 border-black rounded-0">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select border-3 border-black rounded-0">
                    <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="neo-btn">Update</button>
            <a href="{{ route('admin.services.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection