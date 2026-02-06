@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Kelola Media Sosial</h3>
                    <a href="{{ route('admin.social-media.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Media Sosial
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if($socialMedia->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Platform</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th>Color Class</th>
                                    <th>Status</th>
                                    <th>Urutan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($socialMedia as $index => $sm)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $sm->platform }}</td>
                                    <td>
                                        <a href="{{ $sm->url }}" target="_blank" class="text-primary">
                                            {{ Str::limit($sm->url, 30) }}
                                        </a>
                                    </td>
                                    <td><i class="{{ $sm->icon_class }}"></i></td>
                                    <td><code>{{ $sm->color_class }}</code></td>
                                    <td>
                                        @if($sm->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Non-aktif</span>
                                        @endif
                                    </td>
                                    <td>{{ $sm->sort_order }}</td>
                                    <td>
                                        <a href="{{ route('admin.social-media.edit', $sm->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.social-media.destroy', $sm->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus media sosial ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-share-alt fa-4x text-muted mb-3"></i>
                        <h5>Belum Ada Media Sosial</h5>
                        <p class="text-muted">Silakan tambahkan media sosial untuk ditampilkan di halaman kontak.</p>
                        <a href="{{ route('admin.social-media.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Media Sosial
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
