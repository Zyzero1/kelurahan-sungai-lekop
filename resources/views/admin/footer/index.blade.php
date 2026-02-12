@extends('layouts.admin')

@section('title', 'Kelola Footer')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kelola Footer</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.footer.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Konten</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($footerItems as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @php
                                        $badgeClass = 'bg-secondary text-white';
                                        switch($item->kategori) {
                                        case 'tentang':
                                        $badgeClass = 'bg-info text-white';
                                        break;
                                        case 'social':
                                        $badgeClass = 'bg-primary text-white';
                                        break;
                                        case 'tautan':
                                        $badgeClass = 'bg-success text-white';
                                        break;
                                        case 'layanan':
                                        $badgeClass = 'bg-warning text-white';
                                        break;
                                        }
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">
                                            {{ ucfirst($item->kategori) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ Str::limit($item->konten, 50) }}</td>
                                    <td>{{ $item->url }}</td>
                                    <td>
                                        @if($item->icon)
                                        <i class="{{ $item->icon }} text-primary"></i>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->urutan }}</td>
                                    <td>
                                        <span class="badge bg-{{ $item->status ? 'success' : 'danger' }} text-white">
                                            {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.footer.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.footer.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection