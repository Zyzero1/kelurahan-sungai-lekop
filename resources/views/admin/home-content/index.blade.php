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