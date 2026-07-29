@extends('layouts.admin')

@section('title', 'Tambah Service')
@section('page-title', 'Tambah Service')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control border-3 border-black rounded-0" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Slug</label>
                <input type="text" name="slug" class="form-control border-3 border-black rounded-0" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control border-3 border-black rounded-0" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Benefits (opsional)</label>
                <textarea name="benefits" class="form-control border-3 border-black rounded-0" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Technologies (opsional)</label>
                <input type="text" name="technologies" class="form-control border-3 border-black rounded-0" placeholder="Contoh: Laravel, Vue.js">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Image</label>
                <input type="file" name="image" class="form-control border-3 border-black rounded-0">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select border-3 border-black rounded-0">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="neo-btn">Simpan</button>
            <a href="{{ route('admin.services.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection