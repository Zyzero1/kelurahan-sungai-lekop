<!DOCTYPE html>

<html lang="id">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jelajah Lekop - Kelurahan Sungai Lekop</title>



    {{-- Library Pihak Ketiga --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>



    <style>
        :root {

            --primary-900: #1e3a8a;

            --primary-600: #2563eb;

            --accent-500: #f59e0b;

        }



        html {

            scroll-behavior: smooth;

        }



        body {

            font-family: 'Inter', system-ui, sans-serif;

            background-color: #f8fafc;

            overflow-x: hidden;

        }



        /* Header Asli */

        .modern-header {

            position: fixed;

            top: 0;

            left: 0;

            width: 100%;

            z-index: 1000;

            background: rgba(15, 23, 42, 0.1);

            backdrop-filter: blur(10px);

            border-bottom: 1px solid rgba(255, 255, 255, 0.1);

            transition: all 0.3s ease;

        }



        .modern-header.scrolled {

            background: var(--primary-900) !important;

            backdrop-filter: none !important;

            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);

        }



        /* Custom Styles */

        .card-hover {

            transition: all 0.3s ease;

        }



        .card-hover:hover {

            transform: translateY(-5px);

            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);

        }



        .text-gradient {

            background-clip: text;

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;

            background-image: linear-gradient(to right, #1e3a8a, #2563eb);

        }



        /* Custom Scrollbar for Modal */

        .modal-scroll::-webkit-scrollbar {

            width: 8px;

        }



        .modal-scroll::-webkit-scrollbar-track {

            background: #f1f1f1;

            border-radius: 4px;

        }



        .modal-scroll::-webkit-scrollbar-thumb {

            background: #888;

            border-radius: 4px;

        }



        .modal-scroll::-webkit-scrollbar-thumb:hover {

            background: #555;

        }



        /* Floating Animation for Photos - DISABLED to fix layout issues */

        /* @keyframes float-up {
            0%,
            100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        } */



        @keyframes float-down {



            0%,

            100% {

                transform: translateY(0px);

            }



            50% {

                transform: translateY(10px);

            }

        }



        .float-up {

            animation: float-up 4s ease-in-out infinite;

        }



        .float-down {

            animation: float-down 4s ease-in-out infinite;

            animation-delay: 2s;

        }



        /* Override for positioned elements */

        .transform.translate-y-12 {

            animation: float-down-positioned 4s ease-in-out infinite;

            animation-delay: 2s;

        }



        @keyframes float-down-positioned {



            0%,

            100% {

                transform: translateY(48px);

            }



            50% {

                transform: translateY(58px);

            }

        }



        /* Photo Cards - DISABLED floating animation to fix layout */

        /* .photo-card {
            transition: all 0.7s ease;
        }
        
        .photo-card:hover {
            animation-play-state: paused;
        } */
    </style>

</head>



<body class="font-sans antialiased text-slate-800">



    {{-- Memanggil Navigasi --}}

    @include('frontend.layouts.navigation')



    <main class="min-h-screen">



        {{-- 1. HERO SECTION --}}

        <section class="relative h-[600px] overflow-hidden">

            <div class="absolute inset-0">

                @if($heroData && $heroData->hero_image)
                <img src="{{ $heroData->hero_image_url }}" alt="{{ $heroData->nama }}" class="w-full h-full object-cover" style="object-position: center;">
                @else
                <img src="{{ asset('images/kantor.png') }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                @endif

                <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-blue-950/80 via-blue-900/60 to-blue-800/40"></div>

            </div>



            <div class="container mx-auto px-6 h-full flex items-center justify-center relative z-30 pt-12">

                <div class="text-center max-w-4xl" data-aos="fade-up">

                    <div style="transform: translateY(-20px)">

                        @if($heroData && $heroData->nama)
                        <span class="inline-block py-1 px-3 rounded-full bg-blue-600/80 text-white text-xs font-bold tracking-wider mb-4 border border-blue-400/30 backdrop-blur-sm">
                            {{ strtoupper($heroData->nama) }}
                        </span>
                        @else
                        <span class="inline-block py-1 px-3 rounded-full bg-blue-600/80 text-white text-xs font-bold tracking-wider mb-4 border border-blue-400/30 backdrop-blur-sm">
                            EXPLORE BINTAN TIMUR
                        </span>
                        @endif

                        @if($heroData && $heroData->deskripsi)
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
                            {!! $heroData->deskripsi !!}
                        </h1>
                        @else
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
                            Jelajah <span class="text-blue-200">Sungai Lekop</span>
                        </h1>
                        @endif

                        @if($heroData && $heroData->hero_content)
                        <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto font-light">
                            {{ $heroData->hero_content }}
                        </p>
                        @else
                        <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto font-light">
                            Menelusuri denyut nadi ekonomi kreatif, keramahan warga, dan potensi wilayah di gerbang Bintan Timur.
                        </p>
                        @endif

                    </div>

                    <a href="#sentra-industri" class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-blue-900 bg-blue-100/80 rounded-full hover:bg-blue-200/90 transition duration-300 shadow-lg" style="transform: translateY(80px)">

                        Mulai Menjelajah <i class="fas fa-arrow-down ml-2 animate-bounce"></i>

                    </a>

                </div>

            </div>



            <div class="absolute bottom-0 left-0 right-0 z-20" style="transform: translateY(85px)">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">

                    <path fill="#f8fafc" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>

                </svg>

            </div>

        </section>



        {{-- 2. NAVIGASI SUB-MENU --}}

        <section class="sticky top-20 z-40 bg-white shadow-md border-b border-gray-200">

            <div class="container mx-auto px-6">

                <div class="flex flex-wrap justify-center gap-2 py-4">

                    <a href="#sentra-industri" class="px-4 py-2 rounded-full bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">

                        <i class="fas fa-industry mr-2"></i>Sentra Industri

                    </a>

                    <a href="#sudut-unik-fasilitas" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">

                        <i class="fas fa-th mr-2"></i>Fasilitas

                    </a>

                    <a href="#umkm-lokal" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">

                        <i class="fas fa-store mr-2"></i>UMKM Lokal

                    </a>

                    <a href="#galeri-kegiatan" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">

                        <i class="fas fa-images mr-2"></i>Galeri Kegiatan

                    </a>

                </div>

            </div>

        </section>



        {{-- 3. INTRODUCTION SECTION --}}

        <section class="py-16 bg-slate-50 relative">

            <div class="container mx-auto px-6">

                <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">

                    <h2 class="text-3xl font-bold text-slate-900 mb-6">Wajah Baru Desa Mandiri</h2>

                    <div class="w-24 h-1 bg-blue-600 mx-auto mb-8 rounded-full"></div>

                    <p class="text-lg text-slate-600 leading-relaxed italic">

                        "Selamat datang di Sungai Lekop. Bukan sekadar pemukiman, kelurahan kami adalah rumah bagi <strong class="text-blue-700">Sentra Industri Kerupuk Ikan</strong> terbesar di Bintan. Dari Kampung Purwodadi hingga Griya Indo Kencana, kami menyambut Anda dengan inovasi UMKM dan kehangatan masyarakat yang harmonis."

                    </p>

                </div>

            </div>

        </section>



        {{-- 3. PRIMADONA WILAYAH (SENTRA KERUPUK) --}}

        <section id="sentra-industri" class="py-20 bg-white relative overflow-hidden">

            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50"></div>



            <div class="container mx-auto px-6 relative z-10">

                @if($sentraIndustri->count() > 0)
                @foreach($sentraIndustri as $index => $sentra)
                <div class="flex flex-col lg:flex-row items-center gap-12 {{ $index > 0 ? 'mt-16' : '' }}">

                    <div class="lg:w-1/2 order-2 lg:order-1" data-aos="fade-right">
                        @if($sentra->detail['highlight'] ?? false)
                        <div class="flex items-center space-x-2 mb-4">
                            <i class="fas fa-certificate text-yellow-500 text-xl"></i>
                            <span class="text-blue-600 font-bold uppercase tracking-wider text-sm">{{ $sentra->detail['highlight'] }}</span>
                        </div>
                        @endif

                        <h2 class="text-4xl font-bold text-slate-900 mb-6 leading-tight">
                            {!! $sentra->nama !!}
                        </h2>

                        <p class="text-slate-600 mb-6 leading-relaxed">
                            {!! $sentra->deskripsi !!}
                        </p>

                        @if($sentra->detail['produk_unggulan'] ?? false)
                        <ul class="space-y-4 mb-8">
                            @foreach($sentra->detail['produk_unggulan'] as $produk)
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1 mr-3">
                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                </div>
                                <span class="text-slate-700">{{ $produk }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        @if($sentra->detail['lokasi_spesifik'] ?? false)
                        <div class="p-4 bg-blue-50 border-l-4 border-blue-600 rounded-r-lg">
                            <p class="text-sm text-blue-800 font-medium">
                                <i class="fas fa-map-marker-alt mr-2"></i> {{ $sentra->detail['lokasi_spesifik'] }}
                            </p>
                        </div>
                        @endif

                    </div>



                    <div class="lg:w-1/2 order-1 lg:order-2" data-aos="fade-left">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Gambar utama selalu ditampilkan pertama -->
                            <div class="relative group photo-card">
                                <img src="{{ $sentra->gambar_url ?? 'https://placehold.co/400x500/f3f4f6/333333?text=' . urlencode($sentra->nama) }}" alt="{{ $sentra->nama }}" class="w-full h-64 object-cover rounded-2xl shadow-lg transition-all duration-700 group-hover:scale-105 group-hover:shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl flex items-end">
                                    <div class="p-4 text-white">
                                        <p class="text-sm font-semibold">{{ $sentra->nama }}</p>
                                        <p class="text-xs opacity-90">Gambar Utama</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Galeri tambahan -->
                            @if($sentra->galeri && count($sentra->galeri) > 0)
                            @foreach($sentra->galeri as $galeriItem)
                            <div class="relative group photo-card translate-y-8">
                                <img src="{{ asset('uploads/jelajah-lekop/' . $galeriItem) }}" alt="{{ $sentra->nama }}" class="w-full h-64 object-cover rounded-2xl shadow-lg transition-all duration-700 group-hover:scale-105 group-hover:shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl flex items-end">
                                    <div class="p-4 text-white">
                                        <p class="text-sm font-semibold">{{ $sentra->nama }}</p>
                                        <p class="text-xs opacity-90">{{ $sentra->detail['highlight'] ?? 'Produk unggulan' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <!-- Placeholder jika tidak ada galeri -->
                            <div class="relative group photo-card translate-y-8">
                                <img src="https://placehold.co/400x500/f3f4f6/333333?text={{ urlencode('Galeri ' . $sentra->nama) }}" alt="{{ $sentra->nama }}" class="w-full h-64 object-cover rounded-2xl shadow-lg transition-all duration-700 group-hover:scale-105 group-hover:shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl flex items-end">
                                    <div class="p-4 text-white">
                                        <p class="text-sm font-semibold">{{ $sentra->nama }}</p>
                                        <p class="text-xs opacity-90">Tambahkan Galeri</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                @endforeach
                @else
                <!-- Fallback jika tidak ada data -->
                <div class="text-center py-12">
                    <i class="fas fa-industry text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data Sentra Industri</h3>
                    <p class="text-gray-500">Data sentra industri akan segera tersedia.</p>
                </div>
                @endif

            </div>

        </section>




        {{-- 4. KEUNIKAN & FASILITAS (GRID CARDS) --}}

        <section id="sudut-unik-fasilitas" class="py-20 bg-slate-100">

            <div class="container mx-auto px-6">

                <div class="text-center mb-16" data-aos="fade-up">

                    <h2 class="text-3xl font-bold text-slate-900">Fasilitas</h2>

                    <p class="text-slate-600 mt-2">Mengenal lebih dekat infrastruktur dan kehidupan sosial di Sungai Lekop.</p>

                </div>



                @if($fasilitas->count() > 0)
                <div id="facilities-grid" class="grid md:grid-cols-3 gap-8">
                    @foreach($fasilitas as $index => $fasilitasItem)
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-category="{{ $fasilitasItem->kategori ?? 'all' }}" onclick="openModal('{{ $fasilitasItem->id }}')" data-gallery='@json($fasilitasItem->galeri_urls ?? [$fasilitasItem->gambar_url ?? asset(' images/default-fasilitas.jpg')])'>
                        <div class="h-48 overflow-hidden">
                            <img src="{{ $fasilitasItem->gambar_url ?? asset('images/default-fasilitas.jpg') }}" alt="{{ $fasilitasItem->nama }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="{{ $fasilitasItem->detail['warna_label'] ?? 'bg-blue-100 text-blue-800' }} text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $fasilitasItem->getLabelKategori() }}
                                </span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-blue-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $fasilitasItem->nama }}</h3>
                            <p class="text-slate-600 text-sm mb-4">{{ $fasilitasItem->deskripsi }}</p>
                            @if($fasilitasItem->detail['lokasi'] ?? false)
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-map-marker-alt mr-1"></i> {{ $fasilitasItem->detail['lokasi'] }}
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Fallback jika tidak ada data -->
                <div class="text-center py-12">
                    <i class="fas fa-building text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data Fasilitas</h3>
                    <p class="text-gray-500">Data fasilitas akan segera tersedia setelah ditambahkan melalui admin panel.</p>
                </div>
                @endif

            </div>

        </section>




        {{-- 5. UMKM LOKAL --}}

        <section id="umkm-lokal" class="py-20 bg-white">

            <div class="container mx-auto px-6">

                <div class="text-center mb-16" data-aos="fade-up">

                    <h2 class="text-3xl font-bold text-slate-900 mb-4">
                        <i class="fas fa-store text-orange-500 mr-2"></i>UMKM Lokal
                    </h2>

                    <p class="text-slate-600 max-w-2xl mx-auto">Dukung produk-produk unggulan Usaha Mikro Kecil Menengah khas Sungai Lekop, Bintan</p>

                </div>

                @if($umkm->count() > 0)
                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
                    @foreach($umkm as $index => $umkmItem)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" onclick="openUMKMModal('umkm-{{ $umkmItem->id }}')"
                        data-name="{{ $umkmItem->nama }}"
                        data-category="{{ $umkmItem->detail['kategori'] ?? 'UMKM' }}"
                        data-image="{{ $umkmItem->gambar_url ?? asset('images/default-umkm.jpg') }}"
                        data-description="{{ $umkmItem->deskripsi ?? 'Deskripsi tidak tersedia' }}"
                        data-produk="{{ isset($umkmItem->detail['produk']) && is_array($umkmItem->detail['produk']) ? implode(', ', $umkmItem->detail['produk']) : ($umkmItem->detail['produk'] ?? '') }}"
                        data-harga="{{ $umkmItem->detail['harga'] ?? 'Hubungi' }}"
                        data-pemilik="{{ $umkmItem->detail['pemilik'] ?? 'Informasi tidak tersedia' }}"
                        data-telepon="{{ $umkmItem->detail['telepon'] ?? 'Informasi tidak tersedia' }}"
                        data-tahun-berdiri="{{ $umkmItem->detail['tahun_berdiri'] ?? 'Informasi tidak tersedia' }}"
                        data-keunikan="{{ $umkmItem->detail['keunikan'] ?? 'Produk berkualitas dengan bahan lokal pilihan' }}"
                        data-lokasi="{{ $umkmItem->lokasi ?? 'Sungai Lekop, Bintan' }}"
                        data-badge="{{ $umkmItem->detail['badge'] ?? '' }}"
                        data-badge-color="{{ $umkmItem->detail['badge_color'] ?? 'bg-red-500' }}">
                        <div class="relative">
                            <div class="h-40 overflow-hidden">
                                <img src="{{ $umkmItem->gambar_url ?? asset('images/default-umkm.jpg') }}" alt="{{ $umkmItem->nama }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            @if($umkmItem->detail['badge'] ?? false)
                            <div class="absolute top-2 right-2 {{ $umkmItem->detail['badge_color'] ?? 'bg-red-500' }} text-white px-2 py-1 rounded-full text-xs font-bold">
                                @if($umkmItem->detail['badge'] === 'Best Seller')
                                <i class="fas fa-fire mr-1"></i>{!! $umkmItem->detail['badge'] !!}
                                @elseif($umkmItem->detail['badge'] === 'Organik')
                                <i class="fas fa-leaf mr-1"></i>{!! $umkmItem->detail['badge'] !!}
                                @else
                                {!! $umkmItem->detail['badge'] !!}
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <div class="flex items-center mb-2">
                                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mr-2">
                                    <i class="fas fa-{{ $umkmItem->detail['ikon'] ?? 'store' }} text-orange-600 text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900">{{ $umkmItem->nama }}</h3>
                                    <p class="text-xs text-gray-500">{{ $umkmItem->detail['kategori'] ?? 'UMKM' }}</p>
                                </div>
                            </div>
                            @if($umkmItem->detail['produk'] ?? false)
                            <div class="flex flex-wrap gap-1 mb-3">
                                @foreach($umkmItem->detail['produk'] as $produk)
                                <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">{{ $produk }}</span>
                                @endforeach
                            </div>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-orange-600 font-bold text-sm">{{ $umkmItem->detail['harga'] ?? 'Hubungi' }}</span>
                                <button class="text-orange-500 hover:text-orange-600 transition">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Fallback jika tidak ada data -->
                <div class="text-center py-12">
                    <i class="fas fa-store text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data UMKM</h3>
                    <p class="text-gray-500">Data UMKM lokal akan segera tersedia setelah ditambahkan melalui admin panel.</p>
                </div>
                @endif


                {{-- 6. GALERI KEGIATAN --}}

                <div class="container mx-auto px-6">

                    <section id="galeri-kegiatan" class="py-20 bg-white">

                        <div class="text-center mb-16" data-aos="fade-up">

                            <h2 class="text-3xl font-bold text-slate-900 mb-4">
                                <i class="fas fa-images text-purple-500 mr-2"></i>Galeri Kegiatan
                            </h2>

                            <p class="text-slate-600 max-w-2xl mx-auto">Dokumentasi kegiatan kemasyarakatan dan pembangunan di Sungai Lekop</p>

                        </div>

                        @if($galeriKegiatan->count() > 0)
                        <div class="flex justify-center mb-8" data-aos="fade-up">
                            <div class="bg-gray-100 rounded-lg p-1 inline-flex">
                                <button onclick="showGallery('semua')" class="gallery-tab px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-medium transition">Semua</button>
                                @foreach($galeriByCategory as $kategori => $items)
                                @if($kategori && $items->count() > 0)
                                <button onclick="showGallery('{{ $kategori }}')" class="gallery-tab px-4 py-2 rounded-md text-gray-600 hover:text-gray-900 text-sm font-medium transition">
                                    {{ ucfirst($kategori) }}
                                </button>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="gallery-grid">
                            @foreach($galeriKegiatan as $index => $galeriItem)
                            <div class="gallery-item {{ $galeriItem->detail['kategori_galeri'] ?? 'umum' }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer" onclick="openGalleryViewer('{{ $galeriItem->id }}')">
                                    @if($galeriItem->galeri && count($galeriItem->galeri) > 0)
                                    <img src="{{ asset('uploads/jelajah-lekop/' . $galeriItem->galeri[0]) }}" alt="{{ $galeriItem->nama }}" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                                    @else
                                    <img src="{{ $galeriItem->gambar_url ?? asset('images/default-galeri.jpg') }}" alt="{{ $galeriItem->nama }}" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                                    @endif
                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                        <div class="text-white text-center">
                                            <i class="fas fa-{{ $galeriItem->detail['ikon'] ?? 'images' }} text-2xl mb-2"></i>
                                            <p class="text-sm">{{ $galeriItem->nama }}</p>
                                            @if($galeriItem->detail['tanggal'] ?? false)
                                            <p class="text-xs opacity-75">{{ $galeriItem->detail['tanggal'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <!-- Fallback jika tidak ada data -->
                        <div class="text-center py-12">
                            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data Galeri</h3>
                            <p class="text-gray-500">Dokumentasi kegiatan akan segera tersedia setelah ditambahkan melalui admin panel.</p>
                        </div>
                        @endif

                    </section>

                </div>



                {{-- Modal Popup untuk Detail Fasilitas --}}

                <div id="facilityModal" class="fixed inset-0 bg-black bg-opacity-70 z-50 hidden flex items-center justify-center p-4">

                    <div class="bg-white rounded-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto modal-scroll">

                        <div class="relative">

                            <button onclick="closeModal()" class="absolute top-4 right-4 z-10 bg-white/90 backdrop-blur-sm rounded-full p-2 hover:bg-white transition shadow-lg">

                                <i class="fas fa-times text-gray-600 text-lg"></i>

                            </button>

                            <div id="modalContent" class="p-8">

                            </div>

                        </div>

                    </div>

                </div>



                {{-- UMKM Modal --}}

                <div id="umkmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">

                    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto modal-scroll">

                        <div class="relative">

                            <div class="h-64 overflow-hidden relative">

                                <div id="modalImageContainer" class="relative h-full">

                                    <img id="modalImage" src="" alt="" class="w-full h-full object-cover">

                                    <!-- Additional images will be added here -->

                                </div>




                                <!-- Navigation Arrows -->

                                <button id="prevImage" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm rounded-full p-2 hover:bg-white transition opacity-0 pointer-events-none">

                                    <i class="fas fa-chevron-left text-gray-700"></i>

                                </button>

                                <button id="nextImage" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm rounded-full p-2 hover:bg-white transition opacity-0 pointer-events-none">

                                    <i class="fas fa-chevron-right text-gray-700"></i>

                                </button>




                                <!-- Dot Indicators -->

                                <div id="imageDots" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">

                                    <!-- Dots will be added dynamically -->

                                </div>




                                <div id="modalBadge" class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">

                                    <!-- Badge content -->

                                </div>

                            </div>

                            <button onclick="closeUMKMModal()" class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-full p-2 hover:bg-white transition z-10">

                                <i class="fas fa-arrow-left text-gray-700"></i>

                            </button>

                        </div>



                        <div class="p-6">

                            <div class="flex items-center mb-4">

                                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mr-4">

                                    <i class="fas fa-store text-orange-600 text-2xl"></i>

                                </div>

                                <div>

                                    <h3 id="modalTitle" class="text-2xl font-bold text-slate-900"></h3>

                                    <p id="modalCategory" class="text-gray-500"></p>

                                </div>

                            </div>



                            <p id="modalDescription" class="text-slate-600 mb-6"></p>




                            <div class="mb-6">

                                <h4 class="font-semibold text-slate-800 mb-2">Produk Unggulan:</h4>

                                <div id="modalProducts" class="flex flex-wrap gap-2">

                                    <!-- Products will be inserted here -->

                                </div>

                            </div>



                            <div class="mb-6">

                                <h4 class="font-semibold text-slate-800 mb-2">

                                    <i class="fas fa-star text-yellow-500 mr-1"></i>Keunikan Produk:

                                </h4>

                                <p id="modalUniqueness" class="text-slate-600 text-sm"></p>

                            </div>



                            <div class="border-t pt-4 space-y-2">

                                <div class="flex items-center text-sm">

                                    <i class="fas fa-calendar text-gray-400 mr-2 w-4"></i>

                                    <span class="text-gray-600">Berdiri: <span id="modalEstablished"></span></span>

                                </div>


                                <div class="flex items-center text-sm">

                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2 w-4"></i>

                                    <span class="text-gray-600">Alamat: <span id="modalAddress"></span></span>

                                </div>

                            </div>



                            <div class="mt-6 flex items-center justify-between bg-gray-50 p-4 rounded-lg">

                                <span id="modalPrice" class="text-orange-600 font-bold text-lg"></span>

                                <button onclick="contactUMKM()" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">

                                    <i class="fas fa-phone-alt mr-2"></i>Hubungi Sekarang

                                </button>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- Advanced Gallery Viewer Modal --}}

                <div id="galleryViewerModal" class="hidden fixed inset-0 z-[9999] bg-black/90 backdrop-blur-sm">

                    <div class="relative w-full h-full p-4 md:p-8 flex flex-col lg:flex-row">

                        <!-- Header Controls -->

                        <div class="absolute top-4 left-4 right-4 flex justify-between items-start z-50">

                            <h2 id="galleryViewerAlbumTitle" class="text-white text-xl md:text-2xl font-bold bg-black/50 px-4 py-2 rounded-lg backdrop-blur-sm"></h2>

                            <button id="galleryViewerClose" class="text-white text-4xl hover:text-gray-300 transition-colors">

                                <i class="fas fa-times"></i>

                            </button>

                        </div>



                        <!-- Main Image Area -->

                        <div id="galleryViewerMain" class="flex-grow h-full flex flex-col justify-center items-center relative lg:mr-4">

                            <h3 id="galleryViewerTitle" class="text-white text-lg md:text-xl font-normal mb-4 text-center"></h3>



                            <div id="galleryViewerMainImageContainer" class="relative w-full flex-grow flex items-center justify-center overflow-hidden">

                                <img id="galleryViewerMainImage" src="" alt="" class="max-w-full max-h-full object-contain transition-opacity duration-300">



                                <!-- Loading Spinner -->

                                <div id="galleryViewerLoader" class="absolute inset-0 flex items-center justify-center bg-black/50 hidden">

                                    <div class="w-12 h-12 border-4 border-white border-t-transparent rounded-full animate-spin"></div>

                                </div>

                            </div>



                            <!-- Navigation Buttons -->

                            <button id="galleryViewerPrev" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white w-12 h-12 rounded-full text-2xl flex items-center justify-center transition-all duration-300 hover:scale-110">

                                <i class="fas fa-chevron-left"></i>

                            </button>

                            <button id="galleryViewerNext" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white w-12 h-12 rounded-full text-2xl flex items-center justify-center transition-all duration-300 hover:scale-110">

                                <i class="fas fa-chevron-right"></i>

                            </button>



                            <!-- Image Counter -->

                            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-black/50 backdrop-blur-sm px-4 py-2 rounded-full">

                                <span id="galleryViewerCounter" class="text-white text-sm font-medium"></span>

                            </div>

                        </div>



                        <!-- Thumbnails Sidebar -->

                        <div id="galleryViewerThumbnails" class="lg:w-48 xl:w-56 flex-shrink-0 h-full overflow-y-auto flex lg:flex-col gap-3 pr-2 pt-20 pb-4 lg:pt-20 lg:pb-4">

                            <!-- Thumbnails will be dynamically added here -->

                        </div>

                    </div>

                </div>
            </div>
        </section>
        
        {{-- Memanggil Footer --}}
        @include('frontend.layouts.footer')

                <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

                <script>
                    AOS.init({

                        duration: 800,

                        once: true,

                        offset: 100

                    });



                    // Header Scroll Effect

                    const header = document.querySelector(".modern-header");

                    if (header) {

                        window.addEventListener("scroll", () => {

                            if (window.scrollY > 50) header.classList.add("scrolled");

                            else header.classList.remove("scrolled");

                        });

                    }



                    // Gallery Data

                    const galleryData = {

                        pemerintahan: {

                            title: 'Kegiatan Pemerintahan',

                            images: [{

                                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954074_bcd67607ce3600415d76.jpg',

                                    caption: 'Rapat Desa'

                                },

                                {

                                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954056_d8ad3ecfe0494c04463f.jpg',

                                    caption: 'Musrenbang'

                                },

                                {

                                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954022_0bf4e65d09285d943a44.jpg',

                                    caption: 'Pembahasan APBDes'

                                }

                            ]

                        },

                        kemasyarakatan: {

                            title: 'Kegiatan Kemasyarakatan',

                            images: [{

                                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954005_f747783895551781b02e.jpg',

                                    caption: 'Gotong Royong'

                                },

                                {

                                    src: 'https://placehold.co/600x400/10b981/FFFFFF?text=Pengajian',

                                    caption: 'Pengajian Rutin'

                                },

                                {

                                    src: 'https://placehold.co/600x400/10b981/FFFFFF?text=Posyandu',

                                    caption: 'Kegiatan Posyandu'

                                }

                            ]

                        },

                        pembangunan: {

                            title: 'Kegiatan Pembangunan',

                            images: [{

                                    src: 'https://placehold.co/600x400/f59e0b/FFFFFF?text=Jalan+Desa',

                                    caption: 'Pembangunan Jalan Desa'

                                },

                                {

                                    src: 'https://placehold.co/600x400/f59e0b/FFFFFF?text=Drainase',

                                    caption: 'Perbaikan Drainase'

                                },

                                {

                                    src: 'https://placehold.co/600x400/f59e0b/FFFFFF?text=MCK',

                                    caption: 'Pembangunan MCK'

                                }

                            ]

                        }

                    };



                    // Gallery Filter Function

                    function showGallery(category) {

                        const items = document.querySelectorAll('.gallery-item');

                        const tabs = document.querySelectorAll('.gallery-tab');



                        // Update tab styles

                        tabs.forEach(tab => {

                            tab.classList.remove('bg-blue-600', 'text-white');

                            tab.classList.add('text-gray-600');

                        });

                        event.target.classList.remove('text-gray-600');

                        event.target.classList.add('bg-blue-600', 'text-white');



                        // Filter gallery items

                        items.forEach(item => {

                            if (category === 'semua') {

                                item.style.display = 'block';

                            } else {

                                item.style.display = item.classList.contains(category) ? 'block' : 'none';

                            }

                        });

                    }



                    // Gallery Viewer Functions

                    const viewerModal = document.getElementById('galleryViewerModal');

                    const viewerMainImage = document.getElementById('galleryViewerMainImage');

                    const viewerImageTitle = document.getElementById('galleryViewerTitle');

                    const viewerAlbumTitle = document.getElementById('galleryViewerAlbumTitle');

                    const viewerThumbnailsContainer = document.getElementById('galleryViewerThumbnails');

                    const viewerPrevBtn = document.getElementById('galleryViewerPrev');

                    const viewerNextBtn = document.getElementById('galleryViewerNext');

                    const viewerCloseBtn = document.getElementById('galleryViewerClose');

                    const viewerCounter = document.getElementById('galleryViewerCounter');

                    const viewerLoader = document.getElementById('galleryViewerLoader');



                    let viewerCurrentImages = [];

                    let viewerCurrentIndex = 0;



                    function openGalleryViewer(category) {

                        const album = galleryData[category];

                        if (!album || !album.images || album.images.length === 0) {

                            console.error("Album not found or is empty:", category);

                            return;

                        }



                        viewerCurrentImages = album.images;

                        viewerCurrentIndex = 0;



                        viewerAlbumTitle.textContent = album.title;



                        // Generate thumbnails

                        viewerThumbnailsContainer.innerHTML = '';

                        album.images.forEach((img, index) => {

                            const thumb = document.createElement('img');

                            thumb.src = img.src;

                            thumb.alt = img.caption;

                            thumb.className = 'viewer-thumbnail w-full h-24 object-cover rounded-lg cursor-pointer opacity-60 hover:opacity-100 transition-opacity duration-300 border-2 border-transparent hover:border-white';

                            thumb.dataset.index = index;

                            viewerThumbnailsContainer.appendChild(thumb);

                        });



                        updateGalleryView();

                        viewerModal.classList.remove('hidden');

                        document.body.style.overflow = 'hidden';

                    }



                    function closeGalleryViewer() {

                        viewerModal.classList.add('hidden');

                        document.body.style.overflow = 'auto';

                    }



                    function updateGalleryView() {

                        if (viewerCurrentImages.length === 0) return;



                        const image = viewerCurrentImages[viewerCurrentIndex];



                        // Show loader

                        viewerLoader.classList.remove('hidden');

                        viewerMainImage.style.opacity = '0';



                        // Load new image

                        const tempImg = new Image();

                        tempImg.onload = function() {

                            viewerMainImage.src = image.src;

                            viewerMainImage.alt = image.caption;

                            viewerImageTitle.textContent = image.caption;

                            viewerMainImage.style.opacity = '1';

                            viewerLoader.classList.add('hidden');



                            // Update counter

                            viewerCounter.textContent = `${viewerCurrentIndex + 1} / ${viewerCurrentImages.length}`;

                        };

                        tempImg.src = image.src;



                        // Update thumbnails

                        document.querySelectorAll('.viewer-thumbnail').forEach(thumb => {

                            thumb.classList.toggle('opacity-100', parseInt(thumb.dataset.index) === viewerCurrentIndex);

                            thumb.classList.toggle('opacity-60', parseInt(thumb.dataset.index) !== viewerCurrentIndex);

                            thumb.classList.toggle('border-white', parseInt(thumb.dataset.index) === viewerCurrentIndex);

                            thumb.classList.toggle('border-transparent', parseInt(thumb.dataset.index) !== viewerCurrentIndex);

                        });



                        // Scroll active thumbnail into view

                        const activeThumbnail = document.querySelector(`.viewer-thumbnail[data-index='${viewerCurrentIndex}']`);

                        if (activeThumbnail) {

                            activeThumbnail.scrollIntoView({

                                behavior: 'smooth',

                                block: 'center'

                            });

                        }

                    }



                    function showNextGalleryImage() {

                        viewerCurrentIndex = (viewerCurrentIndex + 1) % viewerCurrentImages.length;

                        updateGalleryView();

                    }



                    function showPrevGalleryImage() {

                        viewerCurrentIndex = (viewerCurrentIndex - 1 + viewerCurrentImages.length) % viewerCurrentImages.length;

                        updateGalleryView();

                    }



                    // Gallery click handlers

                    document.addEventListener('click', (e) => {

                        const galleryItem = e.target.closest('.gallery-item');

                        if (galleryItem) {

                            e.preventDefault();

                            const category = Array.from(galleryItem.classList).find(cls => ['pemerintahan', 'kemasyarakatan', 'pembangunan'].includes(cls));

                            if (category) {

                                openGalleryViewer(category);

                            }

                        }

                    });



                    // Gallery viewer controls

                    viewerThumbnailsContainer.addEventListener('click', (e) => {

                        if (e.target.matches('.viewer-thumbnail')) {

                            viewerCurrentIndex = parseInt(e.target.dataset.index);

                            updateGalleryView();

                        }

                    });



                    viewerPrevBtn.addEventListener('click', showPrevGalleryImage);

                    viewerNextBtn.addEventListener('click', showNextGalleryImage);

                    viewerCloseBtn.addEventListener('click', closeGalleryViewer);



                    viewerModal.addEventListener('click', (e) => {

                        if (e.target === viewerModal) {

                            closeGalleryViewer();

                        }

                    });



                    document.addEventListener('keydown', (e) => {

                        if (viewerModal.classList.contains('hidden')) return;

                        if (e.key === 'ArrowRight') showNextGalleryImage();

                        if (e.key === 'ArrowLeft') showPrevGalleryImage();

                        if (e.key === 'Escape') closeGalleryViewer();

                    });



                    // Active navigation highlighting

                    const sections = document.querySelectorAll('section[id]');

                    const navLinks = document.querySelectorAll('.sticky a[href^="#"]');



                    window.addEventListener('scroll', () => {

                        let current = '';

                        const scrollPosition = window.scrollY + 80;



                        sections.forEach(section => {

                            const sectionTop = section.offsetTop;

                            const sectionHeight = section.offsetHeight;



                            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {

                                current = section.getAttribute('id');

                            }

                        });



                        navLinks.forEach(link => {

                            link.classList.remove('bg-blue-600', 'text-white');

                            link.classList.add('bg-gray-100', 'text-gray-700');

                            if (link.getAttribute('href') === '#' + current) {

                                link.classList.remove('bg-gray-100', 'text-gray-700');

                                link.classList.add('bg-blue-600', 'text-white');

                            }

                        });

                    });



                    // Smooth scroll

                    navLinks.forEach(link => {

                        link.addEventListener('click', function(e) {

                            e.preventDefault();

                            const targetId = this.getAttribute('href').substring(1);

                            const targetSection = document.getElementById(targetId);



                            if (targetSection) {

                                const headerHeight = document.querySelector('.modern-header')?.offsetHeight || 80;

                                const stickyNavHeight = document.querySelector('.sticky')?.offsetHeight || 60;

                                const totalOffset = headerHeight + stickyNavHeight;



                                const targetPosition = targetSection.offsetTop - totalOffset;



                                window.scrollTo({

                                    top: targetPosition,

                                    behavior: 'smooth'

                                });

                            }

                        });

                    });

                    // Modal Functions

                    function openModal(facilityId) {
                        const modal = document.getElementById('facilityModal');
                        const modalContent = document.getElementById('modalContent');

                        if (!modal || !modalContent) {
                            console.error('Modal elements not found');
                            return;
                        }

                        // Find facility data from page
                        const facilityCard = document.querySelector(`[onclick*="openModal('${facilityId}')"]`);
                        if (!facilityCard) {
                            console.error('Facility card not found');
                            return;
                        }

                        // Extract data from card with fallbacks
                        const facilityName = facilityCard.querySelector('h3')?.textContent || 'Tidak ada nama';
                        const facilityDesc = facilityCard.querySelector('p')?.textContent || 'Tidak ada deskripsi';
                        const facilityImg = facilityCard.querySelector('img')?.src || '{{ asset("images/default-fasilitas.jpg") }}';
                        const facilityKategori = facilityCard.querySelector('span')?.textContent || 'Tidak ada kategori';

                        // Get gallery images from data attribute or use single image
                        let galleryImages = [];
                        const galleryData = facilityCard.getAttribute('data-gallery');
                        if (galleryData) {
                            try {
                                galleryImages = JSON.parse(galleryData);
                            } catch (e) {
                                galleryImages = [facilityImg];
                            }
                        } else {
                            galleryImages = [facilityImg];
                        }

                        // Store current gallery and index for navigation
                        window.currentFacilityGallery = galleryImages;
                        window.currentFacilityIndex = 0;

                        // Build modal content with dynamic layout
                        let imageSection = '';
                        if (galleryImages.length === 1) {
                            // Single image layout
                            imageSection = `
                                <div class="relative rounded-xl overflow-hidden shadow-lg max-w-2xl mx-auto group">
                                    <img src="${galleryImages[0]}" alt="${facilityName}" class="w-full h-96 object-cover transition duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                        <div class="text-white">
                                            <p class="text-sm font-semibold mb-2">${facilityName}</p>
                                            <div class="flex items-center text-sm">
                                                <i class="fas fa-map-marker-alt text-red-400 mr-2"></i>
                                                <span>Lokasi: Sungai Lekop</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        } else if (galleryImages.length === 2) {
                            // Two images side by side layout
                            imageSection = `
                                <div class="grid grid-cols-2 gap-4 rounded-xl overflow-hidden shadow-lg max-w-4xl mx-auto">
                                    <div class="relative group rounded-xl overflow-hidden">
                                        <img src="${galleryImages[0]}" alt="${facilityName} - Gambar 1" class="w-full h-80 object-cover transition duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                                        <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <div class="text-white">
                                                <p class="text-xs font-semibold">${facilityName}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative group rounded-xl overflow-hidden">
                                        <img src="${galleryImages[1]}" alt="${facilityName} - Gambar 2" class="w-full h-80 object-cover transition duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                                        <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <div class="text-white">
                                                <p class="text-xs font-semibold">${facilityName}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        } else {
                            // Three or more images with carousel navigation
                            imageSection = `
                                <div class="relative rounded-xl overflow-hidden shadow-lg max-w-4xl mx-auto">
                                    <div class="relative h-96">
                                        <img id="facilityCarouselImage" src="${galleryImages[0]}" alt="${facilityName}" class="w-full h-full object-cover transition duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent rounded-xl"></div>
                                        <div class="absolute bottom-0 left-0 right-0 p-6">
                                            <div class="text-white">
                                                <p class="text-sm font-semibold mb-2">${facilityName}</p>
                                                <div class="flex items-center text-sm">
                                                    <i class="fas fa-map-marker-alt text-red-400 mr-2"></i>
                                                    <span>Lokasi: Sungai Lekop</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Navigation Arrows -->
                                    <button onclick="navigateFacilityGallery(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm rounded-full p-3 hover:bg-white transition shadow-lg">
                                        <i class="fas fa-chevron-left text-gray-800"></i>
                                    </button>
                                    <button onclick="navigateFacilityGallery(1)" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm rounded-full p-3 hover:bg-white transition shadow-lg">
                                        <i class="fas fa-chevron-right text-gray-800"></i>
                                    </button>
                                    <!-- Image Indicators -->
                                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                                        ${galleryImages.map((_, index) => `
                                            <button onclick="goToFacilityImage(${index})" class="w-2 h-2 rounded-full transition ${index === 0 ? 'bg-white' : 'bg-white/50'}"></button>
                                        `).join('')}
                                    </div>
                                </div>
                            `;
                        }

                        // Build modal content
                        modalContent.innerHTML = `
                            <div class="text-center">
                                <h2 class="text-3xl font-bold text-slate-900 border-b-2 border-blue-500 inline-block pb-2 mb-8">${facilityName}</h2>
                                <div class="relative group">
                                    ${imageSection}
                                </div>
                                <div class="mt-8 pt-4 border-t border-gray-200 text-center">
                                    <button onclick="closeModal()" class="px-8 py-2.5 bg-slate-800 text-white rounded-full hover:bg-slate-900 transition shadow-lg text-sm font-medium">
                                        Tutup Tampilan
                                    </button>
                                </div>
                            </div>
                        `;

                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        document.body.style.overflow = 'hidden';
                    }

                    function closeModal() {
                        const modal = document.getElementById('facilityModal');
                        if (modal) {
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                            document.body.style.overflow = 'auto';
                        }
                    }

                    // Facility gallery navigation functions
                    function navigateFacilityGallery(direction) {
                        if (!window.currentFacilityGallery || window.currentFacilityGallery.length <= 2) return;

                        window.currentFacilityIndex += direction;
                        if (window.currentFacilityIndex < 0) {
                            window.currentFacilityIndex = window.currentFacilityGallery.length - 1;
                        } else if (window.currentFacilityIndex >= window.currentFacilityGallery.length) {
                            window.currentFacilityIndex = 0;
                        }

                        updateFacilityCarouselImage();
                    }

                    function goToFacilityImage(index) {
                        if (!window.currentFacilityGallery || window.currentFacilityGallery.length <= 2) return;

                        window.currentFacilityIndex = index;
                        updateFacilityCarouselImage();
                    }

                    function updateFacilityCarouselImage() {
                        const carouselImage = document.getElementById('facilityCarouselImage');
                        if (carouselImage && window.currentFacilityGallery) {
                            carouselImage.src = window.currentFacilityGallery[window.currentFacilityIndex];

                            // Update indicators
                            const indicators = document.querySelectorAll('[onclick^="goToFacilityImage"]');
                            indicators.forEach((indicator, index) => {
                                indicator.className = `w-2 h-2 rounded-full transition ${index === window.currentFacilityIndex ? 'bg-white' : 'bg-white/50'}`;
                            });
                        }
                    }

                    // --- UMKM MODAL FUNCTIONS ---

                    let currentImageIndex = 0;

                    let currentImages = [];

                    let currentUMKMPhone = '';

                    function contactUMKM() {
                        if (currentUMKMPhone && currentUMKMPhone !== 'Informasi tidak tersedia') {
                            // Remove non-digit characters for WhatsApp
                            const cleanPhone = currentUMKMPhone.replace(/\D/g, '');

                            // Try to open WhatsApp first
                            const whatsappUrl = `https://wa.me/${cleanPhone}`;
                            window.open(whatsappUrl, '_blank');
                        } else {
                            // Fallback: show alert
                            alert('Maaf, nomor telepon tidak tersedia untuk UMKM ini.');
                        }
                    }

                    function openUMKMModal(umkmId) {

                        const modal = document.getElementById('umkmModal');

                        if (!modal) {

                            console.error('UMKM Modal not found');

                            return;

                        }




                        // Find UMKM data from page

                        const umkmCard = document.querySelector(`[onclick*="openUMKMModal('${umkmId}')"]`);

                        if (!umkmCard) {

                            console.error('UMKM card not found');

                            return;

                        }



                        // Extract data from card using data attributes

                        const umkmName = umkmCard.dataset.name || 'Tidak ada nama';

                        const umkmCategory = umkmCard.dataset.category || 'UMKM';

                        const umkmImg = umkmCard.dataset.image || '{{ asset("images/default-umkm.jpg") }}';

                        const umkmDesc = umkmCard.dataset.description || 'Deskripsi tidak tersedia';

                        const umkmProduk = umkmCard.dataset.produk || '';

                        const umkmHarga = umkmCard.dataset.harga || 'Hubungi';

                        const umkmPemilik = umkmCard.dataset.pemilik || 'Informasi tidak tersedia';

                        const umkmTelepon = umkmCard.dataset.telepon || 'Informasi tidak tersedia';

                        const umkmTahunBerdiri = umkmCard.dataset.tahunBerdiri || 'Informasi tidak tersedia';

                        const umkmKeunikan = umkmCard.dataset.keunikan || 'Produk berkualitas dengan bahan lokal pilihan';

                        const umkmLokasi = umkmCard.dataset.lokasi || 'Sungai Lekop, Bintan';

                        const umkmBadge = umkmCard.dataset.badge || '';

                        const umkmBadgeColor = umkmCard.dataset.badgeColor || 'bg-red-500';



                        // Store phone number for contact function

                        currentUMKMPhone = umkmTelepon;



                        // Update modal elements directly

                        document.getElementById('modalTitle').textContent = umkmName;

                        document.getElementById('modalCategory').textContent = umkmCategory;

                        document.getElementById('modalImage').src = umkmImg;

                        document.getElementById('modalImage').alt = umkmName;

                        document.getElementById('modalDescription').textContent = umkmDesc;



                        // Update additional UMKM details

                        const modalProducts = document.getElementById('modalProducts');

                        const modalUniqueness = document.getElementById('modalUniqueness');

                        const modalEstablished = document.getElementById('modalEstablished');

                        const modalOwner = document.getElementById('modalOwner');

                        const modalPhone = document.getElementById('modalPhone');

                        const modalAddress = document.getElementById('modalAddress');

                        const modalPrice = document.getElementById('modalPrice');

                        const modalBadge = document.getElementById('modalBadge');



                        // Set products

                        if (modalProducts) {

                            if (umkmProduk) {

                                const produkArray = umkmProduk.split(',').map(p => p.trim());

                                modalProducts.innerHTML = produkArray.map(produk =>

                                    `<span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">${produk}</span>`

                                ).join('');

                            } else {

                                modalProducts.innerHTML = '<span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Produk Lokal</span>';

                            }

                        }



                        // Set other fields

                        if (modalUniqueness) {

                            modalUniqueness.textContent = umkmKeunikan;

                        }

                        if (modalEstablished) {

                            modalEstablished.textContent = umkmTahunBerdiri;

                        }

                        if (modalOwner) {

                            modalOwner.textContent = umkmPemilik;

                        }

                        if (modalPhone) {

                            modalPhone.textContent = umkmTelepon;

                        }

                        if (modalAddress) {

                            modalAddress.textContent = umkmLokasi;

                        }

                        if (modalPrice) {

                            modalPrice.textContent = umkmHarga;

                        }

                        if (modalBadge) {

                            if (umkmBadge) {

                                let badgeIcon = '';

                                if (umkmBadge === 'Best Seller') {

                                    badgeIcon = '<i class="fas fa-fire mr-1"></i>';

                                } else if (umkmBadge === 'Organik') {

                                    badgeIcon = '<i class="fas fa-leaf mr-1"></i>';

                                }

                                modalBadge.className = `absolute top-4 right-4 ${umkmBadgeColor} text-white px-3 py-1 rounded-full text-xs font-bold`;

                                modalBadge.innerHTML = badgeIcon + umkmBadge;

                            } else {

                                modalBadge.style.display = 'none';

                            }

                        }



                        modal.classList.remove('hidden');

                        modal.classList.add('flex');

                        document.body.style.overflow = 'hidden';

                    }

                    function showImage(index) {
                        currentImageIndex = index;
                        const mainImg = document.querySelector('#modalContent img');
                        if (mainImg) {
                            mainImg.src = currentImages[index];
                        }
                    }

                    function closeUMKMModal() {

                        const modal = document.getElementById('umkmModal');

                        if (modal) {

                            modal.classList.add('hidden');

                            modal.classList.remove('flex');

                            document.body.style.overflow = 'auto';

                        }

                    }

                    // Close modal with Escape key
                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape') {
                            closeModal();
                            closeGalleryViewer();
                            closeUMKMModal();
                        }
                    });

                    // Close modal when clicking outside
                    document.addEventListener('click', function(event) {
                        const facilityModal = document.getElementById('facilityModal');
                        const umkmModal = document.getElementById('umkmModal');

                        if (facilityModal && event.target === facilityModal) {
                            closeModal();
                        }

                        if (umkmModal && event.target === umkmModal) {
                            closeUMKMModal();
                        }
                    });
                </script>

</body>

</html>