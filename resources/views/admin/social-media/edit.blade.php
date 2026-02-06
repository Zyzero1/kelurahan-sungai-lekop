@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Edit Media Sosial</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.social-media.update', $socialMedia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="platform" class="form-label">Platform *</label>
                                    <input type="text" class="form-control @error('platform') is-invalid @enderror" 
                                        id="platform" name="platform" value="{{ old('platform', $socialMedia->platform) }}" required>
                                    @error('platform')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="url" class="form-label">URL *</label>
                                    <input type="url" class="form-control @error('url') is-invalid @enderror" 
                                        id="url" name="url" value="{{ old('url', $socialMedia->url) }}" required>
                                    @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="icon_class" class="form-label">Icon Class *</label>
                                    <input type="text" class="form-control @error('icon_class') is-invalid @enderror" 
                                        id="icon_class" name="icon_class" value="{{ old('icon_class', $socialMedia->icon_class) }}" required
                                        placeholder="contoh: fab fa-instagram">
                                    @error('icon_class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text">Gunakan Font Awesome class. Contoh: fab fa-instagram, fab fa-facebook</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color_class" class="form-label">Color Class *</label>
                                    <input type="text" class="form-control @error('color_class') is-invalid @enderror" 
                                        id="color_class" name="color_class" value="{{ old('color_class', $socialMedia->color_class) }}" required
                                        placeholder="contoh: bg-gradient-to-r from-purple-500 to-pink-500">
                                    @error('color_class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text">Gunakan Tailwind CSS class. Contoh: bg-gradient-to-r from-purple-500 to-pink-500</small>
                                </div>

                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Urutan</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                        id="sort_order" name="sort_order" value="{{ old('sort_order', $socialMedia->sort_order) }}" min="0">
                                    @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text">Angka kecil akan tampil lebih dulu</small>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                            {{ old('is_active', $socialMedia->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="{{ route('admin.social-media.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
