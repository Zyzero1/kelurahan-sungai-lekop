@extends('layouts.admin')

@section('title', 'Kelola Konten Beranda')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Kelola Konten Beranda</h1>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        {{ session('error') }}
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.home-content.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Hero Banner Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-home text-blue-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Hero Banner</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Hero</label>
                    <input type="text" name="hero_title" value="{{ $homeContent->hero_title ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjudul Hero</label>
                    <textarea name="hero_subtitle" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->hero_subtitle ?? '' }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Banner Image 1</label>
                    <input type="file" name="hero_banner_image_1" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Maks: 10MB (JPG, PNG)</p>
                    @if($homeContent->hero_banner_image_1)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/hero/'.$homeContent->hero_banner_image_1) }}" alt="Banner 1" class="h-20 rounded border border-gray-300">
                    </div>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Banner Image 2</label>
                    <input type="file" name="hero_banner_image_2" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Maks: 10MB (JPG, PNG)</p>
                    @if($homeContent->hero_banner_image_2)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/hero/'.$homeContent->hero_banner_image_2) }}" alt="Banner 2" class="h-20 rounded border border-gray-300">
                    </div>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Banner Image 3</label>
                    <input type="file" name="hero_banner_image_3" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Maks: 10MB (JPG, PNG)</p>
                    @if($homeContent->hero_banner_image_3)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/hero/'.$homeContent->hero_banner_image_3) }}" alt="Banner 3" class="h-20 rounded border border-gray-300">
                    </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Teks Tombol 1</label>
                    <input type="text" name="hero_button1_text" value="{{ $homeContent->hero_button1_text ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Link Tombol 1</label>
                    <input type="text" name="hero_button1_link" value="{{ $homeContent->hero_button1_link ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Teks Tombol 2</label>
                    <input type="text" name="hero_button2_text" value="{{ $homeContent->hero_button2_text ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Link Tombol 2</label>
                    <input type="text" name="hero_button2_link" value="{{ $homeContent->hero_button2_link ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Profil Singkat Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-info-circle text-blue-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Profil Singkat</h2>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tentang</label>
                    <textarea name="profil_tentang" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->profil_tentang ?? '' }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <input type="text" name="profil_alamat" value="{{ $homeContent->profil_alamat ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="profil_email" value="{{ $homeContent->profil_email ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                        <input type="text" name="profil_instagram" value="{{ $homeContent->profil_instagram ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Visi</label>
                        <textarea name="profil_visi" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->profil_visi ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Misi</label>
                        <textarea name="profil_misi" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->profil_misi ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-chart-bar text-blue-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Statistik</h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Penduduk</label>
                    <input type="number" name="statistik_penduduk" value="{{ $homeContent->statistik_penduduk ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah RT</label>
                    <input type="number" name="statistik_rt" value="{{ $homeContent->statistik_rt ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah RW</label>
                    <input type="number" name="statistik_rw" value="{{ $homeContent->statistik_rw ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Layanan</label>
                    <input type="number" name="statistik_layanan" value="{{ $homeContent->statistik_layanan ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Jelajah Lekop Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-compass text-blue-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Jelajah Lekop</h2>
            </div>

            <div class="space-y-6">
                <!-- Fasilitas -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Fasilitas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Fasilitas</label>
                            <input type="text" name="jelajah_fasilitas_title" value="{{ $homeContent->jelajah_fasilitas_title ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Fasilitas</label>
                            <textarea name="jelajah_fasilitas_desc" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->jelajah_fasilitas_desc ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- UMKM -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">UMKM Lokal</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul UMKM</label>
                            <input type="text" name="jelajah_umkm_title" value="{{ $homeContent->jelajah_umkm_title ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi UMKM</label>
                            <textarea name="jelajah_umkm_desc" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->jelajah_umkm_desc ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Wisata -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Potensi Wisata</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Wisata</label>
                            <input type="text" name="jelajah_wisata_title" value="{{ $homeContent->jelajah_wisata_title ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Wisata</label>
                            <textarea name="jelajah_wisata_desc" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->jelajah_wisata_desc ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layanan Publik Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-handshake text-blue-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Layanan Publik</h2>
            </div>

            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Pengaturan Section Layanan Publik</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Section</label>
                            <input type="text" name="layanan_publik_title" value="{{ $homeContent->layanan_publik_title ?? 'Layanan Publik' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Section</label>
                            <textarea name="layanan_publik_desc" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->layanan_publik_desc ?? 'Informasi persyaratan dan alur pengurusan administrasi kependudukan' }}</textarea>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Status Layanan (Aktif/Non-aktif)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_kk_baru" value="1" {{ $homeContent->layanan_kk_baru ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Pembuatan KK Baru</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_nikah" value="1" {{ $homeContent->layanan_nikah ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Surat Pengantar Nikah</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_akte_lahir" value="1" {{ $homeContent->layanan_akte_lahir ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Akte Kelahiran</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_akte_mati" value="1" {{ $homeContent->layanan_akte_mati ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Akte Kematian</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_uang_duka" value="1" {{ $homeContent->layanan_uang_duka ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Santunan Uang Duka</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_tambah_anak" value="1" {{ $homeContent->layanan_tambah_anak ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Penambahan Anak (KK)</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_sktm" value="1" {{ $homeContent->layanan_sktm ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">SKTM & Belum Menikah</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_bpjs" value="1" {{ $homeContent->layanan_bpjs ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Surat Pengantar BPJS</span>
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="layanan_sku" value="1" {{ $homeContent->layanan_sku ?? 'checked' }}
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Surat Keterangan Usaha</span>
                            </label>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Centang layanan yang ingin ditampilkan di halaman beranda</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Persyaratan Layanan</h3>
                    <div class="space-y-6">
                        <!-- Pembuatan KK Baru -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Pembuatan KK Baru</h4>
                            <div class="space-y-2">
                                @php
                                $kkBaruSyarat = $homeContent->layanan_kk_baru_syarat ?? 'Mengisi Formulir F1.01
                                Surat Pindah Datang/Draft KK
                                Fotocopy KTP Sekeluarga
                                Fotocopy Ijazah
                                Fotocopy Akte Kelahiran
                                Fotocopy Buku Nikah
                                Masing-masing berkas di Fotokopi rangkap 2
                                Wajib Gunakan Map';
                                $kkBaruArray = explode("\n", $kkBaruSyarat);
                                @endphp
                                @foreach($kkBaruArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_kk_baru_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_kk_baru_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- Surat Pengantar Nikah -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Surat Pengantar Nikah</h4>
                            <div class="space-y-2">
                                @php
                                $nikahSyarat = $homeContent->layanan_nikah_syarat ?? 'Pengantar RT RW
                                Foto Uk. 2x3 Latar biru (2 lembar)
                                Fotocopy KTP Catin Pria & Wanita
                                Fotocopy KK Catin Pria & Wanita
                                Fotocopy Akte Kelahiran Ybs
                                Fotocopy Ijazah Terakhir Ybs
                                Masing-masing berkas di fotokopi rangkap 1
                                Wajib Gunakan Map';
                                $nikahArray = explode("\n", $nikahSyarat);
                                @endphp
                                @foreach($nikahArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_nikah_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_nikah_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- Akte Kelahiran -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Akte Kelahiran</h4>
                            <div class="space-y-2">
                                @php
                                $akteLahirSyarat = $homeContent->layanan_akte_lahir_syarat ?? 'Form F-2.01
                                Form F-1.06
                                Fotocopy KK dan KTP Ortu
                                Fotocopy KTP Saksi 2 Orang
                                Fotocopy Surat Bidan
                                Fotocopy Surat Nikah
                                Berkas di Fotokopi rangkap
                                Wajib Gunakan Map';
                                $akteLahirArray = explode("\n", $akteLahirSyarat);
                                @endphp
                                @foreach($akteLahirArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_akte_lahir_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_akte_lahir_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- Akte Kematian -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Akte Kematian</h4>
                            <div class="space-y-2">
                                @php
                                $akteMatiSyarat = $homeContent->layanan_akte_mati_syarat ?? 'Pengantar RT RW
                                Form F2.01
                                Surat kematian dari RS (Bila Meninggal di RS)
                                Fotocopy KK dan KTP ybs
                                Fotocopy KTP Pelapor
                                Fotocopy KTP Saksi 2 Orang
                                Wajib Gunakan Map';
                                $akteMatiArray = explode("\n", $akteMatiSyarat);
                                @endphp
                                @foreach($akteMatiArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_akte_mati_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_akte_mati_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- Santunan Uang Duka -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Santunan Uang Duka</h4>
                            <div class="space-y-2">
                                @php
                                $uangDukaSyarat = $homeContent->layanan_uang_duka_syarat ?? 'KTP Asli Almarhum
                                Fotocopy KK Sebelum Penghapusan
                                Fotocopy KK Setelah Penghapusan
                                Fotocopy KK dan KTP Ahli Waris
                                SPTJM & SKTM dari Kelurahan
                                Surat Kematian & Ahli Waris dari Kelurahan
                                Akte Kematian
                                Berkas di Fotokopi Rangkap 2
                                Wajib Gunakan Map';
                                $uangDukaArray = explode("\n", $uangDukaSyarat);
                                @endphp
                                @foreach($uangDukaArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_uang_duka_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_uang_duka_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- Penambahan Anak -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Penambahan Anak (KK)</h4>
                            <div class="space-y-2">
                                @php
                                $tambahAnakSyarat = $homeContent->layanan_tambah_anak_syarat ?? 'Form F1.06
                                Surat Lahir
                                Surat Nikah
                                Fotocopy Kartu Keluarga
                                Fotocopy KTP
                                Wajib Gunakan Map';
                                $tambahAnakArray = explode("\n", $tambahAnakSyarat);
                                @endphp
                                @foreach($tambahAnakArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_tambah_anak_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_tambah_anak_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- SKTM & Belum Menikah -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">SKTM & Belum Menikah</h4>
                            <div class="space-y-2">
                                @php
                                $sktmSyarat = $homeContent->layanan_sktm_syarat ?? 'Surat Pengantar
                                Fotocopy Kartu Keluarga
                                Fotocopy KTP
                                Wajib Gunakan Map';
                                $sktmArray = explode("\n", $sktmSyarat);
                                @endphp
                                @foreach($sktmArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_sktm_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_sktm_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- Surat Pengantar BPJS -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Surat Pengantar BPJS</h4>
                            <div class="space-y-2">
                                @php
                                $bpjsSyarat = $homeContent->layanan_bpjs_syarat ?? 'Surat Pengantar
                                Surat Pernyataan Penghasilan
                                Fotocopy KK
                                Fotocopy KTP
                                Wajib Gunakan Map';
                                $bpjsArray = explode("\n", $bpjsSyarat);
                                @endphp
                                @foreach($bpjsArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_bpjs_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_bpjs_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <!-- Surat Keterangan Usaha -->
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Surat Keterangan Usaha (SKU)</h4>
                            <div class="space-y-2">
                                @php
                                $skuSyarat = $homeContent->layanan_sku_syarat ?? 'Surat Pengantar
                                Fotocopy Kartu Keluarga
                                Fotocopy KTP
                                Foto Usaha
                                Wajib Gunakan Map';
                                $skuArray = explode("\n", $skuSyarat);
                                @endphp
                                @foreach($skuArray as $index => $syarat)
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                                    <input type="text" name="layanan_sku_syarat[]" value="{{ trim($syarat) }}"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                    <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                                <button type="button" onclick="addRequirement('layanan_sku_syarat')" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Edit persyaratan setiap layanan. Gunakan tombol tambah/hapus untuk mengelola daftar persyaratan.</p>
                </div>
            </div>
        </div>

        <!-- Komitmen Pelayanan Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-handshake text-blue-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Komitmen Pelayanan</h2>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Teks Komitmen Pelayanan</label>
                    <textarea name="testimonial_text" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->testimonial_text ?? '' }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Teks ini akan muncul di bagian "Komitmen Pelayanan" di halaman beranda</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis (Opsional)</label>
                    <input type="text" name="testimonial_author" value="{{ $homeContent->testimonial_author ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Nama penulis komitmen (misal: "Pemerintah Kelurahan Sungai Lekop")</p>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

<script>
    function addRequirement(fieldName) {
        const button = event.target;
        const container = button.closest('.border').querySelector('.space-y-2');
        const index = container.children.length;

        const newRequirement = document.createElement('div');
        newRequirement.className = 'flex items-center gap-2';
        newRequirement.innerHTML = `
        <span class="text-sm text-gray-600 w-8">${index + 1}.</span>
        <input type="text" name="${fieldName}[]" value=""
            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
            placeholder="Masukkan persyaratan baru">
        <button type="button" onclick="removeRequirement(this)" class="text-red-500 hover:text-red-700 font-bold text-lg w-6 h-6 flex items-center justify-center rounded hover:bg-red-50">
            ×
        </button>
    `;

        container.insertBefore(newRequirement, button.parentElement);
        updateRequirementNumbers(container);
    }

    function removeRequirement(button) {
        const container = button.closest('.space-y-2');
        button.closest('.flex').remove();
        updateRequirementNumbers(container);
    }

    function updateRequirementNumbers(container) {
        const items = container.querySelectorAll('.flex');
        items.forEach((item, index) => {
            const numberSpan = item.querySelector('.text-sm.text-gray-600');
            if (numberSpan) {
                numberSpan.textContent = `${index + 1}.`;
            }
        });
    }
</script>