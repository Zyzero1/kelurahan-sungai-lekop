@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="mb-6">
        <h1 class="text-2xl font-bold mb-2">Edit Data Jelajah Lekop</h1>
        <p class="text-gray-600">Edit data untuk: <strong>{{ $jelajahLekop->nama }}</strong></p>
    </div>

    <form action="{{ route('admin.jelajah-lekop.update', $jelajahLekop->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <!-- Basic Information -->
        <div id="basicInfo" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6" @if($jelajahLekop->tipe === 'hero') style="display: grid" @endif>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipe *</label>
                <select name="tipe" class="w-full border rounded-lg px-3 py-2" required onchange="updateFormFields(this.value)">
                    <option value="sentra_industri" @if($jelajahLekop->tipe === 'sentra_industri') selected @endif>Sentra Industri</option>
                    <option value="fasilitas" @if($jelajahLekop->tipe === 'fasilitas') selected @endif>Fasilitas</option>
                    <option value="umkm" @if($jelajahLekop->tipe === 'umkm') selected @endif>UMKM</option>
                    <option value="galeri_kegiatan" @if($jelajahLekop->tipe === 'galeri_kegiatan') selected @endif>Galeri Kegiatan</option>
                    <option value="hero" @if($jelajahLekop->tipe === 'hero') selected @endif>Hero Banner</option>
                </select>
            </div>

            <div id="kategoriField" @if($jelajahLekop->tipe === 'hero') style="display: none" @endif>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select name="kategori" class="w-full border rounded-lg px-3 py-2">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoriOptions as $value => $label)
                    <option value="{{ $value }}" @if($jelajahLekop->kategori === $value) selected @endif>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="nameDesc" @if($jelajahLekop->tipe === 'hero') style="display: none" @endif>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama *</label>
                <input type="text" name="nama" value="{{ $jelajahLekop->nama }}" class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                <textarea name="deskripsi" rows="4" class="w-full border rounded-lg px-3 py-2" required>{{ $jelajahLekop->deskripsi }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                <input type="text" name="lokasi" value="{{ $jelajahLekop->lokasi }}" class="w-full border rounded-lg px-3 py-2" placeholder="Contoh: Jl. Korindo Km 20">
            </div>
        </div>

        <!-- Image Upload -->
        <div id="imageUpload" class="mb-6" @if($jelajahLekop->tipe === 'hero') style="display: none" @endif>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg px-3 py-2">
                <p class="text-xs text-gray-500 mt-1">Maks: 10MB, Format: JPEG, PNG, JPG, GIF</p>
                @if($jelajahLekop->gambar)
                <div class="mt-2">
                    <p class="text-xs text-gray-600">Gambar saat ini:</p>
                    <img src="{{ $jelajahLekop->gambar_url }}" alt="{{ $jelajahLekop->nama }}" class="h-20 rounded mt-1">
                </div>
                @endif
            </div>
        </div>

        <div id="galleryUpload" class="grid grid-cols-1 gap-6 mb-6" @if($jelajahLekop->tipe === 'hero') style="display: none" @endif>
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                <div class="flex items-center mb-4">
                    <i class="fas fa-images text-blue-600 text-lg mr-2"></i>
                    <label class="block text-sm font-medium text-gray-700">
                        Galeri / Album Foto
                        <span id="galleryTypeLabel" class="text-gray-500 font-normal"></span>
                    </label>
                </div>

                <!-- Upload Input -->
                <div class="mb-4">
                    <input type="file" name="galeri[]" accept="image/*" multiple class="w-full border rounded-lg px-3 py-2 bg-white" id="galleryInput">
                    <p class="text-xs text-gray-500 mt-2" id="galleryHelpText">
                        <i class="fas fa-info-circle mr-1"></i>Pilih satu atau lebih foto (Format: JPG, PNG, GIF | Max: 10MB per file)
                    </p>
                </div>

                <!-- Preview Existing Gallery -->
                @if($jelajahLekop->galeri && count($jelajahLekop->galeri) > 0)
                <div class="mb-6">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Foto Existing ({{ count($jelajahLekop->galeri) }} foto)</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        @foreach($jelajahLekop->galeri as $index => $image)
                        <div class="relative group">
                            <img src="{{ asset('uploads/jelajah-lekop/' . $image) }}" alt="Gallery {{ $index + 1 }}" class="w-full h-32 object-cover rounded-lg border border-gray-300">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition rounded-lg flex items-center justify-center">
                                <button type="button" onclick="removeGalleryImage('{{ $image }}', event)" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-medium transition">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <input type="hidden" id="removeImages" name="remove_images" value="">
                </div>
                @endif

                <!-- Preview New Gallery (from file input) -->
                <div id="newGalleryPreview" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3"></div>
            </div>
        </div>

        <!-- Hero Fields - SIMPLIFIED -->
        <div id="hero_fields" class="detail-fields bg-white rounded-lg border border-blue-200 p-6 mb-6" @if($jelajahLekop->tipe === 'hero') style="display: block" @else style="display: none" @endif>
            <h2 class="text-xl font-bold text-blue-800 mb-4">
                <i class="fas fa-image text-blue-600 mr-2"></i>Konfigurasi Hero Banner
            </h2>
            <p class="text-gray-600 text-sm mb-6">Hero banner akan ditampilkan di bagian atas halaman Jelajah Lekop dengan gambar latar dan konten teks.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hero Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Hero Banner</label>
                    <input type="file" name="hero_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Maks: 10MB (JPG, PNG)</p>
                    @if($jelajahLekop->hero_image)
                    <div class="mt-2">
                        <img src="{{ $jelajahLekop->hero_image_url }}" alt="Banner" class="h-24 rounded border border-gray-300">
                    </div>
                    @endif
                </div>

                <!-- Title/Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Hero</label>
                    <input type="text" id="heroTitleInput" name="nama" value="{{ $jelajahLekop->nama }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Judul hero banner">
                    <p class="text-xs text-gray-500 mt-1">Judul utama yang ditampilkan di banner</p>
                </div>

                <!-- Subtitle/Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjudul / Deskripsi Hero</label>
                    <textarea id="heroSubtitleInput" name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Subjudul/deskripsi hero banner">{{ $jelajahLekop->deskripsi }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Teks deskripsi yang muncul di hero banner</p>
                </div>

                <!-- Hero Content -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten Tambahan</label>
                    <textarea name="hero_content" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Konten tambahan atau tagline (opsional)">{{ $jelajahLekop->hero_content ?? '' }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Opsional: Konten tambahan untuk hero section</p>
                </div>
            </div>
        </div>

        <!-- Hidden inputs for nama dan deskripsi when hero type - ONLY for hero type -->
        <!-- Removed: Using direct name attributes on hero fields instead -->

        <!-- Dynamic Detail Fields Based on Tipe -->
        <div id="detailFields" class="mb-6" @if($jelajahLekop->tipe === 'hero') style="display: none" @endif>
            <!-- Sentra Industri Fields -->
            <div id="sentra_industri_fields" class="detail-fields" @if($jelajahLekop->tipe === 'sentra_industri') style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail Sentra Industri</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome)</label>
                        <input type="text" name="detail[ikon]" value="{{ $jelajahLekop->detail['ikon'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="fa-industry">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Highlight/Tagline</label>
                        <input type="text" name="detail[highlight]" value="{{ $jelajahLekop->detail['highlight'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="Produk Unggulan Daerah">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Spesifik</label>
                        <input type="text" name="detail[lokasi_spesifik]" value="{{ $jelajahLekop->detail['lokasi_spesifik'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="Kawasan Korindo & Griya Indo Kencana">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Produk Unggulan (comma separated)</label>
                        <input type="text" name="detail[produk_unggulan]" value="{{ isset($jelajahLekop->detail['produk_unggulan']) ? (is_array($jelajahLekop->detail['produk_unggulan']) ? implode(', ', $jelajahLekop->detail['produk_unggulan']) : $jelajahLekop->detail['produk_unggulan']) : '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="Kerupuk Ikan, Kerupuk Atom">
                    </div>
                </div>
            </div>

            <!-- Fasilitas Fields -->
            <div id="fasilitas_fields" class="detail-fields" @if($jelajahLekop->tipe === 'fasilitas') style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail Fasilitas</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome)</label>
                        <input type="text" name="detail[ikon]" value="{{ $jelajahLekop->detail['ikon'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="fa-hospital">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Warna Label</label>
                        <select name="detail[warna_label]" class="w-full border rounded-lg px-3 py-2">
                            <option value="bg-blue-100 text-blue-800" @if(($jelajahLekop->detail['warna_label'] ?? '') === 'bg-blue-100 text-blue-800') selected @endif>Biru</option>
                            <option value="bg-green-100 text-green-800" @if(($jelajahLekop->detail['warna_label'] ?? '') === 'bg-green-100 text-green-800') selected @endif>Hijau</option>
                            <option value="bg-red-100 text-red-800" @if(($jelajahLekop->detail['warna_label'] ?? '') === 'bg-red-100 text-red-800') selected @endif>Merah</option>
                            <option value="bg-purple-100 text-purple-800" @if(($jelajahLekop->detail['warna_label'] ?? '') === 'bg-purple-100 text-purple-800') selected @endif>Ungu</option>
                            <option value="bg-orange-100 text-orange-800" @if(($jelajahLekop->detail['warna_label'] ?? '') === 'bg-orange-100 text-orange-800') selected @endif>Orange</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kontak</label>
                        <input type="text" name="detail[kontak]" value="{{ $jelajahLekop->detail['kontak'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="0812-3456-7890">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Operasional</label>
                        <input type="text" name="detail[jam_operasional]" value="{{ $jelajahLekop->detail['jam_operasional'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="08:00 - 16:00">
                    </div>
                </div>

                <!-- Fasilitas Gallery Notice -->
                <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-yellow-600 mt-1 mr-3"></i>
                        <div>
                            <h4 class="text-sm font-semibold text-yellow-800 mb-1">Upload Foto Fasilitas</h4>
                            <p class="text-xs text-yellow-700 mb-2">Gunakan field "Galeri / Album Foto" di bawah untuk upload foto fasilitas. Maksimal 2 foto untuk tipe Fasilitas.</p>
                            <p class="text-xs text-yellow-600 font-medium"><i class="fas fa-exclamation-triangle mr-1"></i>Perhatian: Upload foto baru akan mengganti semua foto yang ada.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UMKM Fields -->
            <div id="umkm_fields" class="detail-fields" @if($jelajahLekop->tipe === 'umkm') style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail UMKM</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome)</label>
                        <input type="text" name="detail[ikon]" value="{{ $jelajahLekop->detail['ikon'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="fa-store">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge</label>
                        <input type="text" name="detail[badge]" value="{{ $jelajahLekop->detail['badge'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="Best Seller">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Color</label>
                        <select name="detail[badge_color]" class="w-full border rounded-lg px-3 py-2">
                            <option value="bg-red-500" @if(($jelajahLekop->detail['badge_color'] ?? '') === 'bg-red-500') selected @endif>Merah</option>
                            <option value="bg-green-500" @if(($jelajahLekop->detail['badge_color'] ?? '') === 'bg-green-500') selected @endif>Hijau</option>
                            <option value="bg-blue-500" @if(($jelajahLekop->detail['badge_color'] ?? '') === 'bg-blue-500') selected @endif>Biru</option>
                            <option value="bg-purple-500" @if(($jelajahLekop->detail['badge_color'] ?? '') === 'bg-purple-500') selected @endif>Ungu</option>
                            <option value="bg-orange-500" @if(($jelajahLekop->detail['badge_color'] ?? '') === 'bg-orange-500') selected @endif>Orange</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Produk (comma separated)</label>
                        <input type="text" name="detail[produk]" value="{{ isset($jelajahLekop->detail['produk']) ? (is_array($jelajahLekop->detail['produk']) ? implode(', ', $jelajahLekop->detail['produk']) : $jelajahLekop->detail['produk']) : '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="Kerupuk Ikan, Kerupuk Atom">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                        <input type="text" name="detail[harga]" value="{{ $jelajahLekop->detail['harga'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="Rp 25.000 - 60.000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pemilik</label>
                        <input type="text" name="detail[pemilik]" value="{{ $jelajahLekop->detail['pemilik'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="Bapak Ahmad">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                        <input type="text" name="detail[telepon]" value="{{ $jelajahLekop->detail['telepon'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="0812-3456-7890">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Berdiri</label>
                        <input type="text" name="detail[tahun_berdiri]" value="{{ $jelajahLekop->detail['tahun_berdiri'] ?? '' }}" class="w-full border rounded-lg px-3 py-2" placeholder="1985">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Keunikan</label>
                        <textarea name="detail[keunikan]" rows="3" class="w-full border rounded-lg px-3 py-2" placeholder="Resep turun temurun sejak 1985, menggunakan ikan segar pilihan...">{{ $jelajahLekop->detail['keunikan'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Galeri Kegiatan Fields -->
            <div id="galeri_kegiatan_fields" class="detail-fields" @if($jelajahLekop->tipe === 'galeri_kegiatan') style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail Galeri Kegiatan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Galeri</label>
                        <select name="detail[kategori_galeri]" class="w-full border rounded-lg px-3 py-2">
                            <option value="pemerintahan" @if(($jelajahLekop->detail['kategori_galeri'] ?? '') === 'pemerintahan') selected @endif>Kegiatan Pemerintahan</option>
                            <option value="kemasyarakatan" @if(($jelajahLekop->detail['kategori_galeri'] ?? '') === 'kemasyarakatan') selected @endif>Kegiatan Kemasyarakatan</option>
                            <option value="pembangunan" @if(($jelajahLekop->detail['kategori_galeri'] ?? '') === 'pembangunan') selected @endif>Kegiatan Pembangunan</option>
                            <option value="umkm" @if(($jelajahLekop->detail['kategori_galeri'] ?? '') === 'umkm') selected @endif>Kegiatan UMKM</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" name="detail[tanggal]" value="{{ $jelajahLekop->detail['tanggal'] ?? '' }}" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat</label>
                        <textarea name="detail[deskripsi_singkat]" rows="2" class="w-full border rounded-lg px-3 py-2" placeholder="Deskripsi singkat kegiatan...">{{ $jelajahLekop->detail['deskripsi_singkat'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status and Order -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select name="status" class="w-full border rounded-lg px-3 py-2" required>
                    <option value="aktif" @if($jelajahLekop->status === 'aktif') selected @endif>Aktif</option>
                    <option value="nonaktif" @if($jelajahLekop->status === 'nonaktif') selected @endif>Nonaktif</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Urutan</label>
                <input type="number" name="urutan" value="{{ $jelajahLekop->urutan ?? 0 }}" class="w-full border rounded-lg px-3 py-2" min="0">
                <p class="text-xs text-gray-500 mt-1">Nomor urutan untuk sorting (0 = default)</p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.jelajah-lekop.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Update Data
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function updateFormFields(tipe) {
        // Get all form sections
        const basicInfoDiv = document.getElementById('basicInfo');
        const nameDescDiv = document.getElementById('nameDesc');
        const imageUploadDiv = document.getElementById('imageUpload');
        const galleryUploadDiv = document.getElementById('galleryUpload');
        const detailFieldsDiv = document.getElementById('detailFields');

        // Hide all detail fields first
        document.querySelectorAll('.detail-fields').forEach(field => {
            field.style.display = 'none';
        });

        if (tipe === 'hero') {
            // For hero, show only basic info and hero fields
            basicInfoDiv.style.display = 'grid';
            nameDescDiv.style.display = 'none';
            imageUploadDiv.style.display = 'none';
            galleryUploadDiv.style.display = 'none';
            detailFieldsDiv.style.display = 'none';

            // Show hero fields
            const heroFields = document.getElementById('hero_fields');
            if (heroFields) {
                heroFields.style.display = 'block';
            }
        } else {
            // For other types
            basicInfoDiv.style.display = 'grid';
            nameDescDiv.style.display = 'block';
            imageUploadDiv.style.display = 'block';
            galleryUploadDiv.style.display = 'grid';
            detailFieldsDiv.style.display = 'block';

            // Show the specific detail fields
            const selectedField = document.getElementById(tipe + '_fields');
            if (selectedField) {
                selectedField.style.display = 'block';
            }
        }

        // Update gallery settings based on type
        updateGallerySettings(tipe);

        // Update kategori options
        updateKategoriOptions(tipe);
    }

    function updateGallerySettings(tipe) {
        const galleryInput = document.getElementById('galleryInput');
        const galleryTypeLabel = document.getElementById('galleryTypeLabel');
        const galleryHelpText = document.getElementById('galleryHelpText');
        const newGalleryPreview = document.getElementById('newGalleryPreview');

        if (tipe === 'fasilitas') {
            // Set max 2 files for fasilitas
            if (galleryInput) {
                galleryInput.max = '2';
            }
            if (galleryTypeLabel) {
                galleryTypeLabel.textContent = '(Maks 2 foto)';
            }
            if (galleryHelpText) {
                if (tipe === 'fasilitas') {
                    galleryHelpText.innerHTML = '<i class="fas fa-info-circle mr-1"></i>Pilih 1 atau 2 foto untuk fasilitas (Format: JPG, PNG, GIF | Max: 10MB per file)<br><span class="text-orange-600 font-medium"><i class="fas fa-exclamation-triangle mr-1"></i>Upload foto baru akan mengganti semua foto yang ada</span>';
                } else {
                    galleryHelpText.innerHTML = '<i class="fas fa-info-circle mr-1"></i>Pilih satu atau lebih foto (Format: JPG, PNG, GIF | Max: 10MB per file)';
                }
            }
        } else {
            // No limit for other types
            if (galleryInput) {
                galleryInput.removeAttribute('max');
            }
            if (galleryTypeLabel) {
                galleryTypeLabel.textContent = '(Multiple)';
            }
            if (galleryHelpText) {
                galleryHelpText.innerHTML = '<i class="fas fa-info-circle mr-1"></i>Pilih satu atau lebih foto (Format: JPG, PNG, GIF | Max: 10MB per file)';
            }
        }
    }

    function updateKategoriOptions(tipe) {
        const kategoriField = document.getElementById('kategoriField');
        const kategoriSelect = kategoriField.querySelector('select');

        // Save current selection
        const currentValue = kategoriSelect.value;

        // Clear existing options
        kategoriSelect.innerHTML = '<option value="">-- Pilih Kategori --</option>';

        let options = [];

        switch (tipe) {
            case 'fasilitas':
                options = [{
                        value: 'puskesmas',
                        label: 'Puskesmas'
                    },
                    {
                        value: 'posyandu',
                        label: 'Posyandu'
                    },
                    {
                        value: 'sd',
                        label: 'SD'
                    },
                    {
                        value: 'smp',
                        label: 'SMP'
                    },
                    {
                        value: 'sma',
                        label: 'SMA/SMK/MAN'
                    },
                    {
                        value: 'masjid',
                        label: 'Masjid'
                    },
                    {
                        value: 'surau',
                        label: 'Surau'
                    },
                    {
                        value: 'tpa',
                        label: 'TPA/TPQ'
                    }
                ];
                kategoriField.style.display = 'block';
                break;
            case 'galeri_kegiatan':
                options = [{
                        value: 'pemerintahan',
                        label: 'Kegiatan Pemerintahan'
                    },
                    {
                        value: 'kemasyarakatan',
                        label: 'Kegiatan Kemasyarakatan'
                    },
                    {
                        value: 'pembangunan',
                        label: 'Kegiatan Pembangunan'
                    },
                    {
                        value: 'umkm',
                        label: 'Kegiatan UMKM'
                    }
                ];
                kategoriField.style.display = 'block';
                break;
            case 'hero':
            case 'sentra_industri':
            case 'umkm':
            default:
                kategoriField.style.display = 'none';
        }

        // Add new options
        options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.value;
            optionElement.textContent = option.label;
            if (option.value === currentValue) {
                optionElement.selected = true;
            }
            kategoriSelect.appendChild(optionElement);
        });
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateFormFields('{{ $jelajahLekop->tipe }}');

        // Add form submission handler - removed sync function as it's no longer needed
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                console.log('Form submission detected');
                console.log('Form data before submit:', new FormData(form));

                // Debug: Log hero fields specifically
                const tipe = document.querySelector('select[name="tipe"]').value;
                console.log('Current tipe:', tipe);

                if (tipe === 'hero') {
                    const heroTitle = document.getElementById('heroTitleInput')?.value;
                    const heroSubtitle = document.getElementById('heroSubtitleInput')?.value;
                    console.log('Hero Title:', heroTitle);
                    console.log('Hero Subtitle:', heroSubtitle);
                }

                // Debug: Log gallery fields
                const removeImagesInput = document.getElementById('removeImages');
                if (removeImagesInput) {
                    console.log('Remove images value:', removeImagesInput.value);
                }

                const galleryInput = document.getElementById('galleryInput');
                if (galleryInput && galleryInput.files.length > 0) {
                    console.log('Gallery files to upload:', galleryInput.files.length);
                    for (let i = 0; i < galleryInput.files.length; i++) {
                        console.log('File ' + i + ':', galleryInput.files[i].name);
                    }
                } else {
                    console.log('No new gallery files to upload');
                }

                // Validate fasilitas gallery limit
                if (tipe === 'fasilitas' && galleryInput && galleryInput.files.length > 2) {
                    alert('Maksimal 2 foto untuk fasilitas. Silakan pilih ulang.');
                    e.preventDefault();
                    return false;
                }

                // Let the form submit normally
                return true;
            });
        }
    });

    // Handle gallery image removal
    function removeGalleryImage(imageName, event) {
        console.log('Removing gallery image:', imageName);
        console.log('Event:', event);

        const removeImagesInput = document.getElementById('removeImages');
        if (!removeImagesInput) {
            console.error('removeImages input not found');
            return;
        }

        const currentValue = removeImagesInput.value;
        const imagesToRemove = currentValue ? currentValue.split(',') : [];
        console.log('Current images to remove:', imagesToRemove);

        if (!imagesToRemove.includes(imageName)) {
            imagesToRemove.push(imageName);
            removeImagesInput.value = imagesToRemove.join(',');
            console.log('Updated remove_images value:', removeImagesInput.value);
        }

        // Hide image from view with better error handling
        const imageContainer = event ? event.target.closest('.relative') : document.querySelector(`img[src*="${imageName}"]`).closest('.relative');
        if (imageContainer) {
            imageContainer.style.display = 'none';
            console.log('Hidden image container for:', imageName);
        } else {
            console.error('Could not find image container to hide');
        }
    }

    // Handle gallery file input preview
    document.addEventListener('DOMContentLoaded', function() {
        const galleryInput = document.getElementById('galleryInput');
        if (galleryInput) {
            galleryInput.addEventListener('change', function(e) {
                const preview = document.getElementById('newGalleryPreview');
                preview.innerHTML = '';

                // Get current tipe
                const tipe = document.querySelector('select[name="tipe"]').value;

                // Limit to 2 files for fasilitas
                let files = Array.from(this.files);
                if (tipe === 'fasilitas' && files.length > 2) {
                    files = files.slice(0, 2);
                    alert('Maksimal 2 foto untuk fasilitas. Hanya 2 foto pertama yang akan diupload.');
                }

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const div = document.createElement('div');
                        div.className = 'relative group';
                        const borderColor = tipe === 'fasilitas' ? 'border-green-400' : 'border-blue-400';
                        const badgeColor = tipe === 'fasilitas' ? 'bg-green-500' : 'bg-blue-500';
                        const badgeText = tipe === 'fasilitas' ? `Foto ${index + 1}` : 'New';

                        div.innerHTML = `
                            <img src="${event.target.result}" alt="${tipe === 'fasilitas' ? 'Fasilitas ' + (index + 1) : 'New Gallery ' + (index + 1)}" class="w-full h-32 object-cover rounded-lg border-2 ${borderColor}">
                            <div class="absolute top-1 right-1 ${badgeColor} text-white px-2 py-1 rounded text-xs font-bold">
                                ${badgeText}
                            </div>
                        `;
                        preview.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }
    });
</script>

<!-- Gallery Modal -->
<div id="galleryModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center">
    <div class="relative max-w-4xl max-h-[90vh] mx-4">
        <button onclick="closeGalleryModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300 text-3xl font-bold">
            <i class="fas fa-times"></i>
        </button>
        <img id="galleryModalImage" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg">
    </div>
</div>

<script>
    function openGalleryModal(imageSrc) {
        const modal = document.getElementById('galleryModal');
        const modalImage = document.getElementById('galleryModalImage');
        if (modal && modalImage) {
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeGalleryModal() {
        const modal = document.getElementById('galleryModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // Add click handlers for existing gallery images
    document.addEventListener('DOMContentLoaded', function() {
        const galleryImages = document.querySelectorAll('[onclick*="removeGalleryImage"]');
        galleryImages.forEach(img => {
            const container = img.closest('.relative');
            if (container) {
                container.style.cursor = 'pointer';
                container.addEventListener('click', function(e) {
                    if (!e.target.closest('button')) {
                        const img = this.querySelector('img');
                        if (img && img.src) {
                            openGalleryModal(img.src);
                        }
                    }
                });
            }
        });
    });
</script>
@endpush