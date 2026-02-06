@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Kelola Kontak</h3>
                    @if(!$kontak)
                    <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Kontak
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if($kontak)
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Informasi Kontak</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="150">Alamat</th>
                                    <td>{{ $kontak->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{ $kontak->telepon }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $kontak->email }}</td>
                                </tr>
                                <tr>
                                    <th>Jam Operasional</th>
                                    <td>{!! nl2br($kontak->jam_operasional) !!}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Media Sosial</h5>
                            <table class="table table-bordered">
                                @if($kontak->instagram)
                                <tr>
                                    <th width="150">Instagram</th>
                                    <td>{{ $kontak->instagram }}</td>
                                </tr>
                                @endif
                                @if($kontak->facebook)
                                <tr>
                                    <th>Facebook</th>
                                    <td>{{ $kontak->facebook }}</td>
                                </tr>
                                @endif
                                @if($kontak->twitter)
                                <tr>
                                    <th>Twitter</th>
                                    <td>{{ $kontak->twitter }}</td>
                                </tr>
                                @endif
                                @if($kontak->youtube)
                                <tr>
                                    <th>YouTube</th>
                                    <td>{{ $kontak->youtube }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('admin.kontak.edit', $kontak->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Kontak
                        </a>
                        <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-address-book fa-4x text-muted mb-3"></i>
                        <h5>Belum Ada Data Kontak</h5>
                        <p class="text-muted">Silakan tambahkan data kontak untuk ditampilkan di halaman kontak.</p>
                        <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Kontak
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection