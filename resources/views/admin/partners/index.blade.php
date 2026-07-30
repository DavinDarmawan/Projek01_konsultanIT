@extends('layouts.admin')

@section('title', 'Daftar Partner')
@section('page-title', 'Daftar Partner')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.partners.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle me-2"></i> Tambah Partner
        </a>
        <span class="text-muted small">
            <i class="bi bi-info-circle me-1"></i> Total: {{ $partners->count() }}
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
                        <th style="width: 70px;">Logo</th>
                        <th>Perusahaan</th>
                        <th>Project</th>
                        <th>Website</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partners as $partner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($partner->image)
                                <img src="{{ asset('storage/' . $partner->image) }}" 
                                     alt="{{ $partner->company_name }}" 
                                     style="width: 50px; height: 50px; object-fit: contain; border: 2px solid var(--black); background: #fff; padding: 4px;">
                            @else
                                <div style="width: 50px; height: 50px; background: var(--gray); border: 2px solid var(--black); display: flex; align-items: center; justify-content: center; color: #999;">
                                    <i class="bi bi-building"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $partner->company_name }}</td>
                        <td>{{ $partner->project_name ?? '-' }}</td>
                        <td>
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" class="text-primary text-decoration-none">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Kunjungi
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.partners.edit', $partner->id) }}" 
                                   class="btn btn-warning btn-sm border-2 border-black rounded-0">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus partner ini?')">
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
                            <i class="bi bi-building" style="font-size: 2.5rem; color: #d1d5db; display: block; margin-bottom: 0.5rem;"></i>
                            <p class="text-muted mb-0">Belum ada data partner. Silakan tambahkan partner baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection