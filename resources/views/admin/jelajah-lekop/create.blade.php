@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="mb-6">
        <h1 class="text-2xl font-bold mb-2">Tambah Data Jelajah Lekop</h1>
        <p class="text-gray-600">Tambahkan data baru untuk tipe: <strong>{{ ucfirst($tipe) }}</strong></p>
    </div>

    <form action="{{ route('admin.jelajah-lekop.store') }}" method="POST" enctype="multipart/form-data" onsubmit="prepareFormDataForSubmit()">
        @csrf

        {{-- Flash & Validation Messages --}}
        @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-50 border border-green-200 text-green-800">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-red-800">
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-red-800">
            <strong class="block mb-2">Terjadi kesalahan:</strong>
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Basic Information -->
        <div id="basicInfo" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6" @if($tipe==='hero' ) style="display: grid" @endif>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipe *</label>
                <select name="tipe" class="w-full border rounded-lg px-3 py-2" required onchange="updateFormFields(this.value)">
                    <option value="sentra_industri" {{ $tipe === 'sentra_industri' ? 'selected' : '' }}>Sentra Industri</option>
                    <option value="fasilitas" {{ $tipe === 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                    <option value="umkm" {{ $tipe === 'umkm' ? 'selected' : '' }}>UMKM</option>
                    <option value="galeri_kegiatan" {{ $tipe === 'galeri_kegiatan' ? 'selected' : '' }}>Galeri Kegiatan</option>
                    <option value="hero" {{ $tipe === 'hero' ? 'selected' : '' }}>Hero Banner</option>
                </select>
            </div>

            <div id="kategoriField" @if($tipe==='hero' ) style="display: none" @endif>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select name="kategori" class="w-full border rounded-lg px-3 py-2">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoriOptions as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="nameDesc" @if($tipe==='hero' ) style="display: none" @endif>
            {{-- Hidden canonical fields used for submission (always named) --}}
            <input type="hidden" name="nama" id="hiddenNama" value="{{ old('nama') }}">
            <input type="hidden" name="deskripsi" id="hiddenDeskripsi" value="{{ old('deskripsi') }}">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama *</label>
                <input type="text" id="regularNamaInput" name="nama_regular" data-form-name="nama" class="w-full border rounded-lg px-3 py-2" required placeholder="Contoh: Puskesmas Pembantu Sungai Lekop" value="{{ old('nama') }}">
                <p class="text-xs text-gray-500 mt-1">Nama yang akan ditampilkan</p>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                <textarea id="regularDeskripsiInput" name="deskripsi_regular" data-form-name="deskripsi" rows="4" class="w-full border rounded-lg px-3 py-2" required placeholder="Jelaskan secara singkat...">{{ old('deskripsi') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Deskripsi singkat yang akan muncul</p>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                <input type="text" name="lokasi" class="w-full border rounded-lg px-3 py-2" placeholder="Contoh: Jl. Korindo Km 20">
            </div>
        </div>

        <!-- Image Upload -->
        <div id="imageUpload" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6" @if($tipe==='hero' ) style="display: none" @endif>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg px-3 py-2">
                <p class="text-xs text-gray-500 mt-1">Maks: 2MB, Format: JPEG, PNG, JPG, GIF</p>
            </div>

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
                        <i class="fas fa-info-circle mr-1"></i>Pilih satu atau lebih foto (Format: JPG, PNG, GIF | Max: 2MB per file)
                    </p>
                </div>

                <!-- Preview New Gallery (from file input) -->
                <div id="newGalleryPreview" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3"></div>
            </div>
        </div>

        <!-- Hero Fields -->
        <div id="hero_fields" class="detail-fields bg-white rounded-lg border border-blue-200 p-6 mb-6" @if($tipe==='hero' ) style="display: block" @else style="display: none" @endif>
            <h2 class="text-xl font-bold text-blue-800 mb-4">
                <i class="fas fa-image text-blue-600 mr-2"></i>Konfigurasi Hero Banner
            </h2>
            <p class="text-gray-600 text-sm mb-6">Hero banner akan ditampilkan di bagian atas halaman Jelajah Lekop dengan gambar latar dan konten teks.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hero Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Hero Banner</label>
                    <input type="file" name="hero_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Maks: 2MB (JPG, PNG)</p>
                </div>

                <!-- Title/Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Hero</label>
                    <input type="text" id="heroNamaInput" name="nama_hero" data-form-name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Judul hero banner" value="{{ old('nama') }}">
                    <p class="text-xs text-gray-500 mt-1">Judul utama yang ditampilkan di banner</p>
                </div>

                <!-- Subtitle/Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjudul / Deskripsi Hero</label>
                    <textarea id="heroDeskripsiInput" name="deskripsi_hero" data-form-name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Subjudul/deskripsi hero banner">{{ old('deskripsi') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Teks deskripsi yang muncul di hero banner</p>
                </div>

                <!-- Hero Content -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten Tambahan</label>
                    <textarea name="hero_content" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Konten tambahan atau tagline (opsional)"></textarea>
                    <p class="text-xs text-gray-500 mt-1">Opsional: Konten tambahan untuk hero section</p>
                </div>
            </div>
        </div>

        <!-- Dynamic Detail Fields Based on Tipe -->
        <div id="detailFields" class="mb-6" @if($tipe==='hero' ) style="display: none" @endif>
            <!-- Sentra Industri Fields -->
            <div id="sentra_industri_fields" class="detail-fields" @if($tipe==='sentra_industri' ) style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail Sentra Industri</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome)</label>
                        <input type="text" name="detail[ikon]" class="w-full border rounded-lg px-3 py-2" placeholder="fa-industry">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Highlight/Tagline</label>
                        <input type="text" name="detail[highlight]" class="w-full border rounded-lg px-3 py-2" placeholder="Produk Unggulan Daerah">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Spesifik</label>
                        <input type="text" name="detail[lokasi_spesifik]" class="w-full border rounded-lg px-3 py-2" placeholder="Kawasan Korindo & Griya Indo Kencana">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Produk Unggulan (comma separated)</label>
                        <input type="text" name="detail[produk_unggulan]" class="w-full border rounded-lg px-3 py-2" placeholder="Kerupuk Ikan, Kerupuk Atom">
                    </div>
                </div>
            </div>

            <!-- Fasilitas Fields -->
            <div id="fasilitas_fields" class="detail-fields" @if($tipe==='fasilitas' ) style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail Fasilitas</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome)</label>
                        <input type="text" name="detail[ikon]" class="w-full border rounded-lg px-3 py-2" placeholder="fa-hospital">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Warna Label</label>
                        <select name="detail[warna_label]" class="w-full border rounded-lg px-3 py-2">
                            <option value="bg-blue-100 text-blue-800">Biru</option>
                            <option value="bg-green-100 text-green-800">Hijau</option>
                            <option value="bg-red-100 text-red-800">Merah</option>
                            <option value="bg-purple-100 text-purple-800">Ungu</option>
                            <option value="bg-orange-100 text-orange-800">Orange</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kontak</label>
                        <input type="text" name="detail[kontak]" class="w-full border rounded-lg px-3 py-2" placeholder="0812-3456-7890">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Operasional</label>
                        <input type="text" name="detail[jam_operasional]" class="w-full border rounded-lg px-3 py-2" placeholder="08:00 - 16:00">
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
            <div id="umkm_fields" class="detail-fields" @if($tipe==='umkm' ) style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail UMKM</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon (FontAwesome)</label>
                        <input type="text" name="detail[ikon]" class="w-full border rounded-lg px-3 py-2" placeholder="fa-store">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge</label>
                        <input type="text" name="detail[badge]" class="w-full border rounded-lg px-3 py-2" placeholder="Best Seller">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Color</label>
                        <select name="detail[badge_color]" class="w-full border rounded-lg px-3 py-2">
                            <option value="bg-red-500">Merah</option>
                            <option value="bg-green-500">Hijau</option>
                            <option value="bg-blue-500">Biru</option>
                            <option value="bg-purple-500">Ungu</option>
                            <option value="bg-orange-500">Orange</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Produk (comma separated)</label>
                        <input type="text" name="detail[produk]" class="w-full border rounded-lg px-3 py-2" placeholder="Kerupuk Ikan, Kerupuk Atom">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                        <input type="text" name="detail[harga]" class="w-full border rounded-lg px-3 py-2" placeholder="Rp 25.000 - 60.000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pemilik</label>
                        <input type="text" name="detail[pemilik]" class="w-full border rounded-lg px-3 py-2" placeholder="Bapak Ahmad">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                        <input type="text" name="detail[telepon]" class="w-full border rounded-lg px-3 py-2" placeholder="0812-3456-7890">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Berdiri</label>
                        <input type="text" name="detail[tahun_berdiri]" class="w-full border rounded-lg px-3 py-2" placeholder="1985">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Keunikan</label>
                        <textarea name="detail[keunikan]" rows="3" class="w-full border rounded-lg px-3 py-2" placeholder="Resep turun temurun sejak 1985, menggunakan ikan segar pilihan..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Galeri Kegiatan Fields -->
            <div id="galeri_kegiatan_fields" class="detail-fields" @if($tipe==='galeri_kegiatan' ) style="display: block" @else style="display: none" @endif>
                <h3 class="text-lg font-semibold mb-4">Detail Galeri Kegiatan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Galeri</label>
                        <select name="detail[kategori_galeri]" class="w-full border rounded-lg px-3 py-2">
                            <option value="pemerintahan">Kegiatan Pemerintahan</option>
                            <option value="kemasyarakatan">Kegiatan Kemasyarakatan</option>
                            <option value="pembangunan">Kegiatan Pembangunan</option>
                            <option value="umkm">Kegiatan UMKM</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" name="detail[tanggal]" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat</label>
                        <textarea name="detail[deskripsi_singkat]" rows="2" class="w-full border rounded-lg px-3 py-2" placeholder="Deskripsi singkat kegiatan..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status and Order -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select name="status" class="w-full border rounded-lg px-3 py-2" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Urutan</label>
                <input type="number" name="urutan" class="w-full border rounded-lg px-3 py-2" min="0" value="0">
                <p class="text-xs text-gray-500 mt-1">Nomor urutan untuk sorting (0 = default)</p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.jelajah-lekop.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function updateFormFields(tipe) {
        // Hide/Show basic info fields
        const basicInfoDiv = document.getElementById('basicInfo');
        const nameDescDiv = document.getElementById('nameDesc');
        const imageUploadDiv = document.getElementById('imageUpload');
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
            imageUploadDiv.style.display = 'grid';
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

    function prepareFormDataForSubmit(tipe) {
        // Get inputs from both sections
        const regularNamaInput = document.getElementById('regularNamaInput');
        const regularDeskripsiInput = document.getElementById('regularDeskripsiInput');
        const heroNamaInput = document.getElementById('heroNamaInput');
        const heroDeskripsiInput = document.getElementById('heroDeskripsiInput');
        const hiddenNama = document.getElementById('hiddenNama');
        const hiddenDeskripsi = document.getElementById('hiddenDeskripsi');

        if (tipe === 'hero') {
            // Use hero inputs for hero type
            if (heroNamaInput && hiddenNama) hiddenNama.value = heroNamaInput.value || '';
            if (heroDeskripsiInput && hiddenDeskripsi) hiddenDeskripsi.value = heroDeskripsiInput.value || '';
        } else {
            // Use regular inputs for non-hero types
            if (regularNamaInput && hiddenNama) hiddenNama.value = regularNamaInput.value || '';
            if (regularDeskripsiInput && hiddenDeskripsi) hiddenDeskripsi.value = regularDeskripsiInput.value || '';
        }
    }

    function updateGallerySettings(tipe) {
        const galleryInput = document.getElementById('galleryInput');
        const galleryTypeLabel = document.getElementById('galleryTypeLabel');
        const galleryHelpText = document.getElementById('galleryHelpText');

        if (tipe === 'fasilitas') {
            if (galleryTypeLabel) {
                galleryTypeLabel.textContent = '(Maks 2 foto)';
            }
            if (galleryHelpText) {
                galleryHelpText.innerHTML = '<i class="fas fa-info-circle mr-1"></i>Pilih 1 atau 2 foto untuk fasilitas (Format: JPG, PNG, GIF | Max: 2MB per file)<br><span class="text-orange-600 font-medium"><i class="fas fa-exclamation-triangle mr-1"></i>Upload foto baru akan mengganti semua foto yang ada</span>';
            }
        } else {
            if (galleryTypeLabel) {
                galleryTypeLabel.textContent = '(Multiple)';
            }
            if (galleryHelpText) {
                galleryHelpText.innerHTML = '<i class="fas fa-info-circle mr-1"></i>Pilih satu atau lebih foto (Format: JPG, PNG, GIF | Max: 2MB per file)';
            }
        }
    }

    function updateKategoriOptions(tipe) {
        const kategoriField = document.getElementById('kategoriField');
        const kategoriSelect = kategoriField.querySelector('select');

        // Clear existing options
        kategoriSelect.innerHTML = '<option value="">-- Pilih Kategori --</option>';

        let options = [];

        // Hide kategori field for certain types
        if (tipe === 'hero' || tipe === 'sentra_industri' || tipe === 'umkm') {
            kategoriField.style.display = 'none';
        } else {
            kategoriField.style.display = 'block';

            if (tipe === 'fasilitas') {
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
            } else if (tipe === 'galeri_kegiatan') {
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
            }
        }

        // Add new options
        options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.value;
            optionElement.textContent = option.label;
            kategoriSelect.appendChild(optionElement);
        });
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        const initialTipe = '{{ $tipe }}';
        updateFormFields(initialTipe);
        prepareFormDataForSubmit(initialTipe);

        // Add event listener for tipe select to update form fields and prepare data
        const tipeSelect = document.querySelector('select[name="tipe"]');
        if (tipeSelect) {
            tipeSelect.addEventListener('change', function(e) {
                const newTipe = e.target.value;
                updateFormFields(newTipe);
                prepareFormDataForSubmit(newTipe);
                console.log('Form fields updated for tipe:', newTipe);
            });
        }

        // Add real-time sync for regular inputs
        const regularNamaInput = document.getElementById('regularNamaInput');
        const regularDeskripsiInput = document.getElementById('regularDeskripsiInput');
        const hiddenNama = document.getElementById('hiddenNama');
        const hiddenDeskripsi = document.getElementById('hiddenDeskripsi');

        if (regularNamaInput && hiddenNama) {
            regularNamaInput.addEventListener('input', function() {
                const tipe = document.querySelector('select[name="tipe"]').value;
                if (tipe !== 'hero') {
                    hiddenNama.value = this.value;
                }
            });
        }

        if (regularDeskripsiInput && hiddenDeskripsi) {
            regularDeskripsiInput.addEventListener('input', function() {
                const tipe = document.querySelector('select[name="tipe"]').value;
                if (tipe !== 'hero') {
                    hiddenDeskripsi.value = this.value;
                }
            });
        }

        // Add real-time sync for hero inputs
        const heroNamaInput = document.getElementById('heroNamaInput');
        const heroDeskripsiInput = document.getElementById('heroDeskripsiInput');

        if (heroNamaInput && hiddenNama) {
            heroNamaInput.addEventListener('input', function() {
                const tipe = document.querySelector('select[name="tipe"]').value;
                if (tipe === 'hero') {
                    hiddenNama.value = this.value;
                }
            });
        }

        if (heroDeskripsiInput && hiddenDeskripsi) {
            heroDeskripsiInput.addEventListener('input', function() {
                const tipe = document.querySelector('select[name="tipe"]').value;
                if (tipe === 'hero') {
                    hiddenDeskripsi.value = this.value;
                }
            });
        }

        // Add form submission handler
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const tipe = document.querySelector('select[name="tipe"]').value;
                console.log('Form submitting with tipe:', tipe);

                // Prepare form data based on current tipe (fill hidden canonical fields)
                prepareFormDataForSubmit(tipe);

                // Debug: Log form data before submission
                const formData = new FormData(form);
                console.log('Form data before submission:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                // Validate required fields
                const namaInput = document.querySelector('input[name="nama"]');
                const deskripsiInput = document.querySelector('textarea[name="deskripsi"]');

                if (!namaInput || !namaInput.value.trim()) {
                    alert('Nama wajib diisi!');
                    e.preventDefault();
                    return false;
                }

                if (!deskripsiInput || !deskripsiInput.value.trim()) {
                    alert('Deskripsi wajib diisi!');
                    e.preventDefault();
                    return false;
                }

                // Validate fasilitas gallery limit
                const galleryInput = document.getElementById('galleryInput');
                if (tipe === 'fasilitas' && galleryInput && galleryInput.files.length > 2) {
                    alert('Maksimal 2 foto untuk fasilitas. Silakan pilih ulang.');
                    e.preventDefault();
                    return false;
                }

                console.log('Form validation passed, submitting...');
                return true;
            });
        }

        // Handle gallery file input preview
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
@endpush