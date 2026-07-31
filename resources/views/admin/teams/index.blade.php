@extends('layouts.admin')

@section('title', 'Daftar Tim')
@section('page-title', 'Tim')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.teams.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle"></i> Tambah Anggota Tim
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
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>LinkedIn</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($team->image)
                                <img src="{{ asset('storage/'.$team->image) }}" width="50" height="50" style="object-fit: cover;" class="border-2 border-black">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->position }}</td>
                        <td>
                            @if($team->linkedin)
                                <a href="{{ $team->linkedin }}" target="_blank" class="text-primary">Link</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-sm btn-warning border-2 border-black rounded-0">Edit</a>
                            <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus anggota tim ini? Gambar di storage juga akan ikut dihapus.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger border-2 border-black rounded-0">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada data tim.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
