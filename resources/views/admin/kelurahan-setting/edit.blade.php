@extends('layouts.admin')

@section('title', 'Pengaturan Kelurahan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cog text-primary mr-2"></i>
                        Pengaturan Kelurahan
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.kelurahan-setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kelurahan" class="form-label">
                                        <i class="fas fa-building mr-1"></i>
                                        Nama Kelurahan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('nama_kelurahan') is-invalid @enderror"
                                        id="nama_kelurahan"
                                        name="nama_kelurahan"
                                        value="{{ old('nama_kelurahan', $setting->nama_kelurahan) }}"
                                        placeholder="Contoh: Sungai Lekop"
                                        required>
                                    @error('nama_kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="form-text text-muted">Nama kelurahan akan muncul di navigation dan footer</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo" class="form-label">
                                        <i class="fas fa-image mr-1"></i>
                                        Logo Kelurahan
                                    </label>
                                    <input type="file"
                                        class="form-control @error('logo') is-invalid @enderror"
                                        id="logo"
                                        name="logo"
                                        accept="image/*">
                                    @error('logo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="form-text text-muted">Format: JPG, PNG, GIF | Max: 2MB</small>
                                </div>
                            </div>
                        </div>

                        {{-- Current Logo Preview --}}
                        @if($setting->logo_path)
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Logo Saat Ini:</label>
                                    <div class="d-flex align-items-center gap-3">
                                        @if(file_exists(public_path($setting->logo_path)))
                                        <img src="{{ asset($setting->logo_path) }}"
                                            alt="Logo {{ $setting->nama_kelurahan }}"
                                            class="img-thumbnail"
                                            style="max-height: 80px;">
                                        @else
                                        <div class="alert alert-warning d-inline-block">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            File logo tidak ditemukan
                                        </div>
                                        @endif
                                        <small class="text-muted">{{ $setting->logo_path }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    <strong>Informasi:</strong> Logo dan nama kelurahan akan muncul secara otomatis di:
                                    <ul class="mb-0 mt-2">
                                        <li>Navigation (header) di bagian atas website</li>
                                        <li>Footer di bagian bawah website</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    Simpan Pengaturan
                                </button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview logo when selected
        const logoInput = document.getElementById('logo');
        if (logoInput) {
            logoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Create or update preview
                        let preview = document.getElementById('logoPreview');
                        if (!preview) {
                            preview = document.createElement('div');
                            preview.id = 'logoPreview';
                            preview.className = 'mt-3';
                            logoInput.parentNode.appendChild(preview);
                        }
                        preview.innerHTML = `
                        <label class="form-label">Preview Logo Baru:</label>
                        <img src="${e.target.result}" class="img-thumbnail" style="max-height: 80px;">
                        <small class="d-block text-muted mt-1">${file.name}</small>
                    `;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
@endsection
@endsection