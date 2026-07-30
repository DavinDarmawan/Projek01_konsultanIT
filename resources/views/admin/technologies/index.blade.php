@extends('layouts.admin')

@section('title', 'Daftar Teknologi')
@section('page-title', 'Daftar Teknologi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.technologies.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle me-2"></i> Tambah Teknologi
        </a>
        <span class="text-muted small">
            <i class="bi bi-info-circle me-1"></i> Total: {{ $technologies->count() }}
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
                        <th style="width: 50px;">#</th>
                        <th style="width: 80px;">Icon</th>
                        <th>Nama Teknologi</th>
                        <th style="width: 80px;">Warna</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($technologies as $technology)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="border-2 border-black p-2 text-center bg-white" 
                                 style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi {{ $technology->icon ?? 'bi-code' }}" 
                                   style="font-size: 1.8rem; color: {{ $technology->color ?? '#2e7d32' }};"></i>
                            </div>
                        </td>
                        <td class="fw-semibold">{{ $technology->name }}</td>
                        <td>
                            <div style="width: 40px; height: 40px; border-radius: 8px; background: {{ $technology->color ?? '#2e7d32' }}; border: 2px solid var(--black);"></div>
                        </td>
                        <td>
                            <a href="{{ route('admin.technologies.edit', $technology->id) }}" 
                               class="btn btn-warning btn-sm border-2 border-black rounded-0">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.technologies.destroy', $technology->id) }}" 
                                  method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus teknologi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm border-2 border-black rounded-0">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="bi bi-cpu" style="font-size: 2.5rem; color: #d1d5db; display: block; margin-bottom: 0.5rem;"></i>
                            <p class="text-muted mb-0">Belum ada data teknologi. Silakan tambahkan teknologi baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection