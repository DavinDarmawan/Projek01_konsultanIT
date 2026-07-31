@extends('layouts.admin')

@section('title', 'Daftar Artikel Service')
@section('page-title', 'Artikel Service')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.service-articles.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle"></i> Tambah Artikel
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
                        <th>Judul</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($article->title, 40) }}</td>
                        <td>{{ $article->service->title ?? '-' }}</td>
                        <td>
                            @if($article->status === 'published')
                                <span class="badge-neo">Published</span>
                            @else
                                <span class="badge bg-secondary border-2 border-black rounded-0 fw-bold">Draft</span>
                            @endif
                        </td>
                        <td>{{ $article->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.service-articles.edit', $article->id) }}" class="btn btn-sm btn-warning border-2 border-black rounded-0">Edit</a>
                            <form action="{{ route('admin.service-articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus artikel ini? Gambar di storage juga akan ikut dihapus.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger border-2 border-black rounded-0">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada artikel.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
