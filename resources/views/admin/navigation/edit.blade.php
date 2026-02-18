@extends('layouts.admin')

@section('title', 'Edit Navigation')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Edit Navigation: {{ $navigation->nama }}
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.navigation.update', $navigation) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Menu *</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $navigation->nama) }}" required>
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL *</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        id="url" name="url" value="{{ old('url', $navigation->url) }}"
                                        placeholder="https://example.com atau /page" required>
                                    @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="ikon" class="form-label">Ikon (FontAwesome)</label>
                                    <input type="text" class="form-control @error('ikon') is-invalid @enderror"
                                        id="ikon" name="ikon" value="{{ old('ikon', $navigation->ikon) }}"
                                        placeholder="fas fa-home">
                                    <div class="form-text">Contoh: fas fa-home, fas fa-user, dll</div>
                                    @error('ikon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="urutan" class="form-label">Urutan</label>
                                    <input type="number" class="form-control @error('urutan') is-invalid @enderror"
                                        id="urutan" name="urutan" value="{{ old('urutan', $navigation->urutan) }}" min="0">
                                    @error('urutan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="target" class="form-label">Target</label>
                                    <select class="form-select @error('target') is-invalid @enderror"
                                        id="target" name="target" required>
                                        <option value="_self" {{ old('target', $navigation->target) === '_self' ? 'selected' : '' }}>
                                            Tab Sama (_self)
                                        </option>
                                        <option value="_blank" {{ old('target', $navigation->target) === '_blank' ? 'selected' : '' }}>
                                            Tab Baru (_blank)
                                        </option>
                                    </select>
                                    @error('target')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="is_active" name="is_active" value="1"
                                            {{ old('is_active', $navigation->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.navigation.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection