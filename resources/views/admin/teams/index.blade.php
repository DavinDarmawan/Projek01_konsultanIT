@extends('layouts.admin')

@section('title', 'Daftar Tim')
@section('page-title', 'Daftar Tim')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.teams.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle me-2"></i> Tambah Anggota Tim
        </a>
        <span class="text-muted small">
            <i class="bi bi-info-circle me-1"></i> Total: {{ $teams->count() }}
        </span>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-3 border-black rounded-0 d-flex align-items-center gap-2">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="neo-card" style="padding: 0; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-neo mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th style="width: 70px;">Foto</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th style="width: 120px;">Sosial Media</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($team->image)
                                <img src="{{ asset('storage/' . $team->image) }}" 
                                     alt="{{ $team->name }}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border: 2px solid var(--black); border-radius: 50%;">
                            @else
                                <div style="width: 50px; height: 50px; background: var(--gray); border: 2px solid var(--black); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #999; font-size: 1.5rem;">
                                    <i class="bi bi-person"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $team->name }}</td>
                        <td>{{ $team->position }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                @if($team->linkedin)
                                    <a href="{{ $team->linkedin }}" target="_blank" class="text-primary"><i class="bi bi-linkedin"></i></a>
                                @endif
                                @if($team->instagram)
                                    <a href="{{ $team->instagram }}" target="_blank" class="text-danger"><i class="bi bi-instagram"></i></a>
                                @endif
                                @if($team->github)
                                    <a href="{{ $team->github }}" target="_blank" class="text-dark"><i class="bi bi-github"></i></a>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.teams.edit', $team->id) }}" 
                                   class="btn btn-warning btn-sm border-2 border-black rounded-0">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.teams.destroy', $team->id) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus anggota tim ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm border-2 border-black rounded-0">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="bi bi-people" style="font-size: 2.5rem; color: #d1d5db; display: block; margin-bottom: 0.5rem;"></i>
                            <p class="text-muted mb-0">Belum ada anggota tim. Silakan tambahkan anggota baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
