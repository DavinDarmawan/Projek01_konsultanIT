@extends('layouts.admin')

@section('title', 'Daftar Portfolio')
@section('page-title', 'Portfolio')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.portfolios.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle"></i> Tambah Portfolio
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
                        <th>Client</th>
                        <th>Description</th>
                        <th>Project URL</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->client }}</td>
                        <td>{{ Str::limit($portfolio->description, 50) }}</td>
                        <td><a href="{{ $portfolio->project_url }}" target="_blank">{{ $portfolio->project_url }}</a></td>
                        <td>
                            <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-warning border-2 border-black rounded-0">Edit</a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger border-2 border-black rounded-0">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada data portfolio.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection