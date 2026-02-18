@extends('layouts.admin')

@section('title', 'Manajemen Navigation')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-bars me-2"></i>
                        Manajemen Navigation
                    </h5>
                    <a href="{{ route('admin.navigation.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Tambah Navigation
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if($navigations->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama</th>
                                    <th>URL</th>
                                    <th>Ikon</th>
                                    <th>Urutan</th>
                                    <th>Target</th>
                                    <th>Status</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($navigations as $index => $navigation)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $navigation->nama }}</strong>
                                    </td>
                                    <td>
                                        <code>{{ $navigation->url }}</code>
                                    </td>
                                    <td>
                                        @if($navigation->ikon)
                                        <i class="fas {{ $navigation->ikon }} me-1"></i>
                                        <small>{{ $navigation->ikon }}</small>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $navigation->urutan }}</span>
                                    </td>
                                    <td>
                                        @if($navigation->target === '_blank')
                                        <span class="badge bg-warning">New Tab</span>
                                        @else
                                        <span class="badge bg-success">Same Tab</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($navigation->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.navigation.edit', $navigation) }}"
                                                class="btn btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.navigation.destroy', $navigation) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus navigation ini?')">
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
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-bars fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada data navigation</h5>
                        <p class="text-muted">Tambahkan navigation pertama untuk memulai.</p>
                        <a href="{{ route('admin.navigation.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                            Tambah Navigation
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection