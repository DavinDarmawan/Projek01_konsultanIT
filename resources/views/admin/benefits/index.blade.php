@extends('layouts.admin')
@section('title', 'Benefits')
@section('page-title', 'Benefits')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('admin.benefits.create') }}" class="neo-btn"><i class="bi bi-plus-circle"></i> Tambah Benefit</a>
</div>
<div class="neo-card" style="padding:0;">
    <table class="table table-neo mb-0">
        <thead><tr><th>#</th><th>Icon</th><th>Title</th><th>Description</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($benefits as $b)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><i class="bi {{ $b->icon }}"></i></td>
                <td>{{ $b->title }}</td>
                <td>{{ Str::limit($b->description, 50) }}</td>
                <td>
                    <a href="{{ route('admin.benefits.edit', $b->id) }}" class="btn btn-sm btn-warning border-2 border-black rounded-0">Edit</a>
                    <form action="{{ route('admin.benefits.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger border-2 border-black rounded-0">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty <tr><td colspan="5" class="text-center">Belum ada benefit.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection