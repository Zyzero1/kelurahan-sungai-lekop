@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Tambah Kontak</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kontak.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Informasi Kontak</h5>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat *</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon *</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                        id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                                    @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jam_operasional" class="form-label">Jam Operasional</label>
                                    <textarea class="form-control @error('jam_operasional') is-invalid @enderror"
                                        id="jam_operasional" name="jam_operasional" rows="4"
                                        placeholder="Senin - Kamis: 08.00 - 16.00&#10;Jumat: 08.00 - 15.30&#10;Sabtu - Minggu: Tutup">{{ old('jam_operasional') }}</textarea>
                                    @error('jam_operasional')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5>Media Sosial</h5>

                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                        id="instagram" name="instagram" value="{{ old('instagram') }}"
                                        placeholder="https://www.instagram.com/kelurahan.sungailekop/">
                                    @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                        id="facebook" name="facebook" value="{{ old('facebook') }}"
                                        placeholder="https://www.facebook.com/kelurahan.sungailekop">
                                    @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                        id="twitter" name="twitter" value="{{ old('twitter') }}"
                                        placeholder="https://twitter.com/kelurahanlekop">
                                    @error('twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="youtube" class="form-label">YouTube</label>
                                    <input type="text" class="form-control @error('youtube') is-invalid @enderror"
                                        id="youtube" name="youtube" value="{{ old('youtube') }}"
                                        placeholder="https://www.youtube.com/@kelurahanlekop">
                                    @error('youtube')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h5>Google Maps Embed</h5>
                                <div class="mb-3">
                                    <label for="google_maps_embed" class="form-label">Embed Code Google Maps</label>
                                    <textarea class="form-control @error('google_maps_embed') is-invalid @enderror"
                                        id="google_maps_embed" name="google_maps_embed" rows="4"
                                        placeholder="<iframe src=&quot;...&quot; width=&quot;600&quot; height=&quot;450&quot; style=&quot;border:0;&quot; allowfullscreen=&quot;&quot; loading=&quot;lazy&quot; referrerpolicy=&quot;no-referrer-when-downgrade&quot;></iframe>">{{ old('google_maps_embed') }}</textarea>
                                    @error('google_maps_embed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Paste embed code dari Google Maps. Buka Google Maps, cari lokasi, klik "Bagikan" → "Embed a map" → "Copy HTML".</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection