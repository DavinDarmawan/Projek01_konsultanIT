@extends('layouts.admin')

@section('title', 'Daftar Partner')
@section('page-title', 'Partner')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.partners.create') }}" class="neo-btn">
            <i class="bi bi-plus-circle"></i> Tambah Partner
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
                        <th>Logo</th>
                        <th>Perusahaan</th>
                        <th>Proyek</th>
                        <th>Website</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partners as $partner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($partner->image)
                                <img src="{{ asset('storage/'.$partner->image) }}" width="50" height="50" style="object-fit: contain;" class="border-2 border-black p-1">
                            @elseif($partner->icon)
                                <img src="{{ asset('storage/'.$partner->icon) }}" width="40" height="40" style="object-fit: contain;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $partner->company_name }}</td>
                        <td>{{ $partner->project_name ?? '-' }}</td>
                        <td>
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" class="text-primary">Link</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-sm btn-warning border-2 border-black rounded-0">Edit</a>
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus partner ini? Gambar & icon di storage juga akan ikut dihapus.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger border-2 border-black rounded-0">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada data partner.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
