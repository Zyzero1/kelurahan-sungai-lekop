@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Kelola Konten Beranda</h1>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.home-content.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Hero Banner Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-home text-blue-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Hero Banner</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Utama</label>
                    <input type="text" name="hero_title" value="{{ $homeContent->hero_title ?? 'Selamat Datang di Kelurahan Sungai Lekop' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjudul/Deskripsi</label>
                    <textarea name="hero_subtitle" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->hero_subtitle ?? 'Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera.' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Banner Image 1</label>
                    <input type="file" name="hero_banner_image_1" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                    @if($homeContent->hero_banner_image_2)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/hero/'.$homeContent->hero_banner_image_2) }}" alt="Banner 2" class="h-20 rounded border border-gray-300">
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Berita Utama Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-newspaper text-green-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Berita Utama</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Section</label>
                    <input type="text" name="berita_title" value="{{ $homeContent->berita_title ?? 'Berita Utama' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Text Link "Lihat Semua"</label>
                    <input type="text" name="berita_link_text" value="{{ $homeContent->berita_link_text ?? 'Lihat Semua' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tab "Terkini"</label>
                    <input type="text" name="berita_tab_terkini" value="{{ $homeContent->berita_tab_terkini ?? 'Terkini' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tab "Populer"</label>
                    <input type="text" name="berita_tab_populer" value="{{ $homeContent->berita_tab_populer ?? 'Populer' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                <p class="text-sm text-blue-800">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Catatan:</strong> Daftar berita diambil dari data berita yang ada di menu "Berita".
                    Anda dapat menambah/edit berita melalui menu Berita di sidebar.
                </p>
            </div>
        </div>

        <!-- Profil Singkat Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-info-circle text-green-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Profil Singkat</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tentang Kami</label>
                    <textarea name="profil_tentang" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->profil_tentang ?? 'Kelurahan Sungai Lekop adalah salah satu kelurahan yang terletak di Kecamatan Bintan Timur, Kabupaten Bintan. Kami berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat dalam berbagai aspek administrasi dan pembangunan.' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <input type="text" name="profil_alamat" value="{{ $homeContent->profil_alamat ?? 'Jl. Korindo Km. 22 No. 1A, Sungai Lekop' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="profil_email" value="{{ $homeContent->profil_email ?? 'kelurahan@sungailekop.id' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                    <input type="text" name="profil_instagram" value="{{ $homeContent->profil_instagram ?? '@Kelurahansungailekop' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Visi</label>
                    <textarea name="profil_visi" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->profil_visi ?? 'Terwujudnya Kelurahan Sungai Lekop yang maju, mandiri, dan sejahtera berbasis pelayanan prima.' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Misi</label>
                    <textarea name="profil_misi" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->profil_misi ?? '• Memberikan pelayanan administrasi yang cepat dan transparan
• Meningkatkan partisipasi masyarakat dalam pembangunan
• Menjaga kebersihan dan keindahan lingkungan' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Statistik Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-chart-bar text-purple-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Statistik</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Total Penduduk</label>
                    <input type="number" name="statistik_penduduk" value="{{ $homeContent->statistik_penduduk ?? 15203 }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah RT</label>
                    <input type="number" name="statistik_rt" value="{{ $homeContent->statistik_rt ?? 32 }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah RW</label>
                    <input type="number" name="statistik_rw" value="{{ $homeContent->statistik_rw ?? 9 }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Layanan Publik</label>
                    <input type="number" name="statistik_layanan" value="{{ $homeContent->statistik_layanan ?? 12 }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Jelajah Lekop Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-compass text-orange-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Jelajah Lekop</h2>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fasilitas - Judul</label>
                        <input type="text" name="jelajah_fasilitas_title" value="{{ $homeContent->jelajah_fasilitas_title ?? 'Sudut Unik & Fasilitas' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fasilitas - Deskripsi</label>
                        <textarea name="jelajah_fasilitas_desc" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->jelajah_fasilitas_desc ?? 'Mengenal lebih dekat infrastruktur dan kehidupan sosial di Sungai Lekop.' }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">UMKM - Judul</label>
                        <input type="text" name="jelajah_umkm_title" value="{{ $homeContent->jelajah_umkm_title ?? 'UMKM Lokal' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">UMKM - Deskripsi</label>
                        <textarea name="jelajah_umkm_desc" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->jelajah_umkm_desc ?? 'Dukung dan kenalkan produk Usaha Mikro Kecil Menengah khas Sungai Lekop.' }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Wisata - Judul</label>
                        <input type="text" name="jelajah_wisata_title" value="{{ $homeContent->jelajah_wisata_title ?? 'Potensi Wisata' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Wisata - Deskripsi</label>
                        <textarea name="jelajah_wisata_desc" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->jelajah_wisata_desc ?? 'Eksplorasi keindahan alam dan destinasi wisata di wilayah Sungai Lekop.' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-quote-left text-indigo-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Komitmen Pelayanan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial/Quote</label>
                    <textarea name="testimonial_text" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $homeContent->testimonial_text ?? 'Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera.' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                    <input type="text" name="testimonial_author" value="{{ $homeContent->testimonial_author ?? 'Pemerintah Kelurahan Sungai Lekop' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Social Media Links Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-share-alt text-pink-600 text-xl mr-3"></i>
                <h2 class="text-xl font-bold text-gray-800">Social Media Links</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                    <input type="text" name="social_facebook" value="{{ $homeContent->social_facebook ?? 'https://facebook.com' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                    <input type="text" name="social_instagram" value="{{ $homeContent->social_instagram ?? 'https://instagram.com' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">YouTube</label>
                    <input type="text" name="social_youtube" value="{{ $homeContent->social_youtube ?? 'https://youtube.com' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition flex items-center">
                <i class="fas fa-save mr-2"></i>
                Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>
@endsection