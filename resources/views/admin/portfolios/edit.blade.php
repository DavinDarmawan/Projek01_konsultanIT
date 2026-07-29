@extends('layouts.admin')

@section('title', 'Edit Portfolio')
@section('page-title', 'Edit Portfolio')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control border-3 border-black rounded-0" value="{{ $portfolio->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Client</label>
                <input type="text" name="client" class="form-control border-3 border-black rounded-0" value="{{ $portfolio->client }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control border-3 border-black rounded-0" rows="4" required>{{ $portfolio->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Image</label>
                @if($portfolio->image)
                    <div><img src="{{ asset('storage/'.$portfolio->image) }}" width="100" class="border-3 border-black mb-2"></div>
                @endif
                <input type="file" name="image" class="form-control border-3 border-black rounded-0">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Project URL</label>
                <input type="url" name="project_url" class="form-control border-3 border-black rounded-0" value="{{ $portfolio->project_url }}">
            </div>
            <button type="submit" class="neo-btn">Update</button>
            <a href="{{ route('admin.portfolios.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection