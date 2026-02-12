@extends('layouts.admin')

@section('title', 'Edit Footer')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Footer</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.footer.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.footer.update', $footer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori <span class="text-danger">*</span></label>
                                    <select name="kategori" id="kategori" class="form-control" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="tentang" {{ $footer->kategori == 'tentang' ? 'selected' : '' }}>Tentang</option>
                                        <option value="social" {{ $footer->kategori == 'social' ? 'selected' : '' }}>Social Media</option>
                                        <option value="tautan" {{ $footer->kategori == 'tautan' ? 'selected' : '' }}>Tautan Cepat</option>
                                        <option value="layanan" {{ $footer->kategori == 'layanan' ? 'selected' : '' }}>Layanan Publik</option>
                                        <option value="kontak" {{ $footer->kategori == 'kontak' ? 'selected' : '' }}>Kontak</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="judul">Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" id="judul" class="form-control" value="{{ $footer->judul }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="konten">Konten</label>
                                    <textarea name="konten" id="konten" class="form-control" rows="3">{{ $footer->konten }}</textarea>
                                    <small class="text-muted">Digunakan untuk kategori Tentang dan Kontak</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" name="url" id="url" class="form-control" value="{{ $footer->url }}">
                                    <small class="text-muted">Digunakan untuk kategori Social Media, Tautan, dan Layanan</small>
                                </div>

                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" name="icon" id="icon" class="form-control" value="{{ $footer->icon }}">
                                    <small class="text-muted">Contoh: fab fa-facebook-f, fas fa-map-marker-alt</small>
                                </div>

                                <div class="form-group">
                                    <label for="urutan">Urutan <span class="text-danger">*</span></label>
                                    <input type="number" name="urutan" id="urutan" class="form-control" value="{{ $footer->urutan }}" min="0" required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="1" {{ $footer->status == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $footer->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.footer.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
