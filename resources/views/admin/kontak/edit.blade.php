@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0">Edit Kontak</h2>
            <p class="text-muted mb-0">Perbarui informasi kontak Kelurahan Sungai Lekop</p>
        </div>
        <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <!-- Edit Form -->
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Left Column - Basic Info -->
                    <div class="col-lg-6">
                        <div class="border-end pe-lg-4">
                            <h5 class="text-primary mb-4">
                                <i class="fas fa-info-circle me-2"></i>Informasi Dasar
                            </h5>

                            <!-- Alamat -->
                            <div class="mb-4">
                                <label for="alamat" class="form-label fw-semibold">
                                    <i class="fas fa-map-marker-alt text-danger me-1"></i> Alamat *
                                </label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                          id="alamat" name="alamat" rows="3" required
                                          placeholder="Jl. Sungai Lekop No. 123, Kelurahan Sungai Lekop...">{{ old('alamat', $kontak->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Telepon -->
                            <div class="mb-4">
                                <label for="telepon" class="form-label fw-semibold">
                                    <i class="fas fa-phone text-success me-1"></i> Telepon *
                                </label>
                                <input type="tel" class="form-control @error('telepon') is-invalid @enderror" 
                                       id="telepon" name="telepon" required
                                       value="{{ old('telepon', $kontak->telepon) }}"
                                       placeholder="(0771) 123456">
                                @error('telepon')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="fas fa-envelope text-warning me-1"></i> Email *
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" required
                                       value="{{ old('email', $kontak->email) }}"
                                       placeholder="kelurahan.sungailekop@domain.go.id">
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Jam Operasional -->
                            <div class="mb-4">
                                <label for="jam_operasional" class="form-label fw-semibold">
                                    <i class="fas fa-clock text-info me-1"></i> Jam Operasional
                                </label>
                                <textarea class="form-control @error('jam_operasional') is-invalid @enderror" 
                                          id="jam_operasional" name="jam_operasional" rows="4"
                                          placeholder="Senin - Kamis: 08.00 - 16.00&#10;Jumat: 08.00 - 15.30&#10;Sabtu - Minggu: Tutup">{{ old('jam_operasional', $kontak->jam_operasional) }}</textarea>
                                <div class="form-text">Gunakan Enter untuk baris baru</div>
                                @error('jam_operasional')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Social Media & Maps -->
                    <div class="col-lg-6">
                        <div class="ps-lg-4">
                            <h5 class="text-primary mb-4">
                                <i class="fas fa-share-alt me-2"></i>Media Sosial
                            </h5>

                            <!-- Instagram -->
                            <div class="mb-3">
                                <label for="instagram" class="form-label fw-semibold">
                                    <i class="fab fa-instagram text-danger me-1"></i> Instagram
                                </label>
                                <input type="url" class="form-control @error('instagram') is-invalid @enderror" 
                                       id="instagram" name="instagram"
                                       value="{{ old('instagram', $kontak->instagram) }}"
                                       placeholder="https://www.instagram.com/kelurahan.sungailekop/">
                                @error('instagram')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Facebook -->
                            <div class="mb-3">
                                <label for="facebook" class="form-label fw-semibold">
                                    <i class="fab fa-facebook text-primary me-1"></i> Facebook
                                </label>
                                <input type="url" class="form-control @error('facebook') is-invalid @enderror" 
                                       id="facebook" name="facebook"
                                       value="{{ old('facebook', $kontak->facebook) }}"
                                       placeholder="https://www.facebook.com/kelurahan.sungailekop">
                                @error('facebook')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Twitter -->
                            <div class="mb-3">
                                <label for="twitter" class="form-label fw-semibold">
                                    <i class="fab fa-twitter text-info me-1"></i> Twitter
                                </label>
                                <input type="url" class="form-control @error('twitter') is-invalid @enderror" 
                                       id="twitter" name="twitter"
                                       value="{{ old('twitter', $kontak->twitter) }}"
                                       placeholder="https://twitter.com/kelurahanlekop">
                                @error('twitter')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- YouTube -->
                            <div class="mb-4">
                                <label for="youtube" class="form-label fw-semibold">
                                    <i class="fab fa-youtube text-danger me-1"></i> YouTube
                                </label>
                                <input type="url" class="form-control @error('youtube') is-invalid @enderror" 
                                       id="youtube" name="youtube"
                                       value="{{ old('youtube', $kontak->youtube) }}"
                                       placeholder="https://www.youtube.com/@kelurahanlekop">
                                @error('youtube')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Google Maps -->
                            <h5 class="text-primary mb-3 mt-4">
                                <i class="fas fa-map me-2"></i>Peta Lokasi
                            </h5>
                            <div class="mb-4">
                                <label for="google_maps_embed" class="form-label fw-semibold">
                                    <i class="fas fa-code text-secondary me-1"></i> Google Maps Embed
                                </label>
                                <textarea class="form-control @error('google_maps_embed') is-invalid @enderror" 
                                          id="google_maps_embed" name="google_maps_embed" rows="4"
                                          placeholder="<iframe src=&quot;...&quot; width=&quot;600&quot; height=&quot;450&quot; style=&quot;border:0;&quot; allowfullscreen=&quot;&quot; loading=&quot;lazy&quot; referrerpolicy=&quot;no-referrer-when-downgrade&quot;></iframe>">{{ old('google_maps_embed', $kontak->google_maps_embed) }}</textarea>
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Buka Google Maps → cari lokasi → klik "Bagikan" → "Embed a map" → "Copy HTML"
                                </div>
                                @error('google_maps_embed')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i> Batal
                            </a>
                            <div>
                                <button type="reset" class="btn btn-outline-warning me-2">
                                    <i class="fas fa-undo me-2"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Update Kontak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.form-label {
    color: #495057;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.invalid-feedback {
    font-size: 0.875rem;
}

.border-end {
    border-color: #dee2e6 !important;
}

@media (max-width: 991.98px) {
    .border-end {
        border-right: none !important;
        border-bottom: 1px solid #dee2e6 !important;
        padding-bottom: 2rem !important;
        margin-bottom: 2rem !important;
    }
}
</style>
@endsection
