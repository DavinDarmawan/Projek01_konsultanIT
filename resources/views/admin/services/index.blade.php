@extends('layouts.admin')

@section('title', 'Daftar Services')
@section('page-title', 'Services')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.services.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle"></i> Tambah Service
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-3 border-black rounded-0">{{ session('success') }}</div>
    @endif

    <div class="neo-card" style="padding: 0; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-neo mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->slug }}</td>
                        <td>{{ Str::limit($service->description, 50) }}</td>
                        <td><span class="badge-neo">{{ $service->status }}</span></td>
                        <td>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning border-2 border-black rounded-0">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger border-2 border-black rounded-0">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada data service.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection