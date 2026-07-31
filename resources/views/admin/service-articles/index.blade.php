@extends('layouts.admin')

@section('title', 'Daftar Artikel Layanan')
@section('page-title', 'Daftar Artikel Layanan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.service-articles.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle me-2"></i> Tambah Artikel
        </a>
        <span class="text-muted small">
            <i class="bi bi-info-circle me-1"></i> Total: {{ $articles->total() }}
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
                        <th style="width: 60px;">Gambar</th>
                        <th>Judul</th>
                        <th>Layanan</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 130px;">Tanggal</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                     alt="{{ $article->title }}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border: 2px solid var(--black);">
                            @else
                                <div style="width: 50px; height: 50px; background: var(--gray); border: 2px solid var(--black); display: flex; align-items: center; justify-content: center; color: #999;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ Str::limit($article->title, 40) }}</td>
                        <td>{{ $article->service->title ?? '-' }}</td>
                        <td>
                            <span class="badge-neo" style="background: {{ $article->status == 'published' ? 'var(--green)' : 'var(--yellow)' }}; color: {{ $article->status == 'published' ? 'white' : 'var(--black)' }};">
                                {{ $article->status == 'published' ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td style="font-size: 0.8rem; color: #6b7280;">
                            {{ $article->created_at->format('d M Y') }}
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.service-articles.edit', $article->id) }}" 
                                   class="btn btn-warning btn-sm border-2 border-black rounded-0">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.service-articles.destroy', $article->id) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm border-2 border-black rounded-0">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('service.article', $article->slug) }}" 
                                   target="_blank" 
                                   class="btn btn-primary btn-sm border-2 border-black rounded-0">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="bi bi-file-text" style="font-size: 2.5rem; color: #d1d5db; display: block; margin-bottom: 0.5rem;"></i>
                            <p class="text-muted mb-0">Belum ada artikel layanan. Silakan tambahkan artikel baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $articles->links() }}
    </div>
@endsection