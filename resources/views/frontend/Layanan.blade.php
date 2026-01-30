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
    </style>
</head>

<body class="font-sans antialiased text-slate-800">

    {{-- Memanggil Navigasi --}}
    @include('frontend.layouts.navigation')

    <main class="min-h-screen">

        {{-- 1. HERO SECTION --}}
        <section class="relative h-[600px] overflow-hidden">
            <div class="absolute inset-0">
                <img src="{{ asset('images/kantor.png') }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-blue-950/80 via-blue-900/60 to-blue-800/40"></div>
            </div>

            <div class="container mx-auto px-6 h-full flex items-center justify-center relative z-30 pt-12">
                <div class="text-center max-w-4xl" data-aos="fade-up">
                    <div style="transform: translateY(-20px)">
                        <span class="inline-block py-1 px-3 rounded-full bg-blue-600/80 text-white text-xs font-bold tracking-wider mb-4 border border-blue-400/30 backdrop-blur-sm">
                            EXPLORE BINTAN TIMUR
                        </span>
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
                            Jelajah <span class="text-blue-200">Sungai Lekop</span>
                        </h1>
                        <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto font-light">
                            Menelusuri denyut nadi ekonomi kreatif, keramahan warga, dan potensi wilayah di gerbang Bintan Timur.
                        </p>
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
                    <a href="#umkm-lokal" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">
                        <i class="fas fa-store mr-2"></i>UMKM Lokal
                    </a>
                    <a href="#pariwisata" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">
                        <i class="fas fa-camera mr-2"></i>Pariwisata
                    </a>
                    <a href="#galeri-kegiatan" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">
                        <i class="fas fa-images mr-2"></i>Galeri Kegiatan
                    </a>
                    <a href="#potensi-wilayah" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">
                        <i class="fas fa-map-marked-alt mr-2"></i>Potensi Wilayah
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
                <div class="flex flex-col lg:flex-row items-center gap-12">

                    <div class="lg:w-1/2 order-2 lg:order-1" data-aos="fade-right">
                        <div class="flex items-center space-x-2 mb-4">
                            <i class="fas fa-certificate text-yellow-500 text-xl"></i>
                            <span class="text-blue-600 font-bold uppercase tracking-wider text-sm">Produk Unggulan Daerah</span>
                        </div>
                        <h2 class="text-4xl font-bold text-slate-900 mb-6 leading-tight">
                            Kampung Kerupuk:<br>
                            <span class="text-gradient">Legenda Rasa dari Bintan</span>
                        </h2>
                        <p class="text-slate-600 mb-6 leading-relaxed">
                            Sungai Lekop dikenal luas sebagai pusat produksi <strong>Kerupuk Ikan & Atom</strong> berbahan dasar Ikan Tenggiri dan Tamban segar. Terpusat di kawasan <strong>Perumahan Griya Indo Kencana</strong> dan sepanjang <strong>Jl. Korindo</strong>, industri rumahan ini telah menembus pasar ekspor.
                        </p>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1 mr-3">
                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                </div>
                                <span class="text-slate-700"><strong>Tugu Kerupuk:</strong> Ikon landmark yang wajib dikunjungi di simpang Jl. Korindo.</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1 mr-3">
                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                </div>
                                <span class="text-slate-700"><strong>Oleh-oleh Khas:</strong> Pilihan utama wisatawan saat berkunjung ke Bintan Timur.</span>
                            </li>
                        </ul>

                        <div class="p-4 bg-blue-50 border-l-4 border-blue-600 rounded-r-lg">
                            <p class="text-sm text-blue-800 font-medium">
                                <i class="fas fa-info-circle mr-2"></i> Lokasi Sentra: Kawasan Korindo & Griya Indo Kencana
                            </p>
                        </div>
                    </div>

                    <div class="lg:w-1/2 order-1 lg:order-2" data-aos="fade-left">
                        <div class="grid grid-cols-2 gap-4">
                            <img src="https://placehold.co/400x500/f3f4f6/333333?text=Produksi+Kerupuk" alt="Proses Pembuatan Kerupuk" class="w-full h-64 object-cover rounded-2xl shadow-lg transform translate-y-8">

                            <img src="https://placehold.co/400x500/e5e7eb/333333?text=Tugu+Kerupuk" alt="Tugu Kerupuk Bintan" class="w-full h-64 object-cover rounded-2xl shadow-lg -translate-y-8">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 4. KEUNIKAN & FASILITAS (GRID CARDS) --}}
        <section id="sudut-unik-fasilitas" class="py-20 bg-slate-100">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-slate-900">Sudut Unik & Fasilitas</h2>
                    <p class="text-slate-600 mt-2">Mengenal lebih dekat infrastruktur dan kehidupan sosial di Sungai Lekop.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="100" onclick="openModal('masjid')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/1e3a8a/FFFFFF?text=Masjid+Al-Kautsar" alt="Masjid Al-Kautsar" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Religi</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-blue-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Masjid Al-Kautsar & Al-Fattah</h3>
                            <p class="text-slate-600 text-sm mb-4">Pusat kegiatan keagamaan warga yang makmur. Terletak strategis di Perum Griya Indo Kencana dan Jl. Musi.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="200" onclick="openModal('sekolah')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/2563eb/FFFFFF?text=Pendidikan" alt="Sekolah Dasar" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-blue-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Generasi Penerus</h3>
                            <p class="text-slate-600 text-sm mb-4">Rumah bagi SDN 011 (Km. 20) dan SDN 015 (Jl. Korindo), mencetak generasi muda Sungai Lekop yang berprestasi.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="300" onclick="openModal('potensi')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/059669/FFFFFF?text=Potensi+Alam" alt="Potensi Alam" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded">Masa Depan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-blue-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Potensi Alam & Perikanan</h3>
                            <p class="text-slate-600 text-sm mb-4">Pengembangan potensi wilayah pesisir untuk budidaya perikanan dan konservasi lingkungan yang berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. UMKM LOKAL --}}
        <section id="umkm-lokal" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">
                        <i class="fas fa-store text-orange-500 mr-2"></i>UMKM Lokal
                    </h2>
                    <p class="text-slate-600 max-w-2xl mx-auto">Dukung produk-produk unggulan Usaha Mikro Kecil Menengah khas Sungai Lekop</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover group" data-aos="fade-up">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/400x300/f59e0b/FFFFFF?text=Kerupuk+Ikan" alt="Kerupuk Ikan" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Kerupuk Ikan Tenggiri</h3>
                            <p class="text-slate-600 text-sm mb-4">Produk unggulan dengan rasa khas Bintan, tersedia dalam berbagai varian</p>
                            <div class="flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 25.000 - 50.000</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Best Seller</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="100">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/400x300/059669/FFFFFF?text=Kerupuk+Atom" alt="Kerupuk Atom" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Kerupuk Atom</h3>
                            <p class="text-slate-600 text-sm mb-4">Kerupuk premium dengan tekstur renyah dan rasa gurih khas</p>
                            <div class="flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 30.000 - 60.000</span>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Premium</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/400x300/10b981/FFFFFF?text=Oleh-Oleh" alt="Oleh-Oleh Khas" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Oleh-Oleh Khas</h3>
                            <p class="text-slate-600 text-sm mb-4">Aneka makanan dan cenderamata khas Bintan Timur</p>
                            <div class="flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 10.000 - 100.000</span>
                                <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">Variatif</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="#galeri-kegiatan" class="inline-flex items-center px-6 py-3 bg-orange-500 text-white font-medium rounded-lg hover:bg-orange-600 transition">
                        <i class="fas fa-images mr-2"></i> Lihat Galeri Produksi
                    </a>
                </div>
            </div>
        </section>

        {{-- 6. GALERI KEGIATAN --}}

            <div class="container mx-auto px-6">
                  <section id="galeri-kegiatan" class="py-20 bg-white">      <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">
                        <i class="fas fa-images text-purple-500 mr-2"></i>Galeri Kegiatan
                    </h2>
                    <p class="text-slate-600 max-w-2xl mx-auto">Dokumentasi kegiatan kemasyarakatan dan pembangunan di Sungai Lekop</p>
                </div>

                <div class="flex justify-center mb-8" data-aos="fade-up">
                    <div class="bg-gray-100 rounded-lg p-1 inline-flex">
                        <button onclick="showGallery('semua')" class="gallery-tab px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-medium transition">Semua</button>
                        <button onclick="showGallery('pemerintahan')" class="gallery-tab px-4 py-2 rounded-md text-gray-600 hover:text-gray-900 text-sm font-medium transition">Pemerintahan</button>
                        <button onclick="showGallery('kemasyarakatan')" class="gallery-tab px-4 py-2 rounded-md text-gray-600 hover:text-gray-900 text-sm font-medium transition">Kemasyarakatan</button>
                        <button onclick="showGallery('pembangunan')" class="gallery-tab px-4 py-2 rounded-md text-gray-600 hover:text-gray-900 text-sm font-medium transition">Pembangunan</button>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="gallery-grid">
                    <div class="gallery-item pemerintahan" data-aos="fade-up">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/3b82f6/FFFFFF?text=Rapat+Desa" alt="Rapat Desa" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-users text-2xl mb-2"></i>
                                    <p class="text-sm">Rapat Desa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item pemerintahan" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/3b82f6/FFFFFF?text=Musrenbang" alt="Musrenbang" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-chart-line text-2xl mb-2"></i>
                                    <p class="text-sm">Musrenbang</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item kemasyarakatan" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/10b981/FFFFFF?text=Gotong+Royong" alt="Gotong Royong" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-hands-helping text-2xl mb-2"></i>
                                    <p class="text-sm">Gotong Royong</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item kemasyarakatan" data-aos="fade-up" data-aos-delay="300">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/10b981/FFFFFF?text=Pengajian" alt="Pengajian" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-mosque text-2xl mb-2"></i>
                                    <p class="text-sm">Pengajian</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item pembangunan" data-aos="fade-up" data-aos-delay="400">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/f59e0b/FFFFFF?text=Jalan+Desa" alt="Pembangunan Jalan" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-road text-2xl mb-2"></i>
                                    <p class="text-sm">Pembangunan Jalan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item pembangunan" data-aos="fade-up" data-aos-delay="500">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/f59e0b/FFFFFF?text=Drainase" alt="Pembangunan Drainase" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-water text-2xl mb-2"></i>
                                    <p class="text-sm">Drainase</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item kemasyarakatan" data-aos="fade-up" data-aos-delay="600">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/ef4444/FFFFFF?text=Produksi+Kerupuk" alt="Produksi Kerupuk" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-industry text-2xl mb-2"></i>
                                    <p class="text-sm">Produksi Kerupuk</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item kemasyarakatan" data-aos="fade-up" data-aos-delay="700">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/ef4444/FFFFFF?text=Pengemasan" alt="Pengemasan Produk" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-box text-2xl mb-2"></i>
                                    <p class="text-sm">Pengemasan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 7. POTENSI WILAYAH --}}
        <section id="potensi-wilayah" class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">
                        <i class="fas fa-map-marked-alt text-green-500 mr-2"></i>Potensi Wilayah
                    </h2>
                    <p class="text-slate-600 max-w-2xl mx-auto">Peluang pengembangan dan keunggulan kompetitif Sungai Lekop</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-md text-center card-hover" data-aos="fade-up">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-fish text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Perikanan</h3>
                        <p class="text-slate-600 text-sm">Potensi budidaya ikan dan pengolahan hasil laut</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md text-center card-hover" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-seedling text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Pertanian</h3>
                        <p class="text-slate-600 text-sm">Lahan subur untuk pertanian organik</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md text-center card-hover" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-store text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Industri</h3>
                        <p class="text-slate-600 text-sm">Sentra kerupuk terbesar di Bintan</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md text-center card-hover" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">SDM</h3>
                        <p class="text-slate-600 text-sm">Masyarakat produktif dan kreatif</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 8. STATISTIK / HIGHLIGHTS SECTION --}}
        <section class="py-16 bg-blue-900 text-white">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-blue-700/50">
                    <div data-aos="fade-up">
                        <div class="text-4xl font-bold mb-2 text-yellow-400">20+</div>
                        <div class="text-sm text-blue-200 uppercase tracking-wide">UMKM Kerupuk</div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="text-4xl font-bold mb-2 text-yellow-400">Km 20</div>
                        <div class="text-sm text-blue-200 uppercase tracking-wide">Pusat Jalan Poros</div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <div class="text-4xl font-bold mb-2 text-yellow-400">2</div>
                        <div class="text-sm text-blue-200 uppercase tracking-wide">Sekolah Dasar Utama</div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <div class="text-4xl font-bold mb-2 text-yellow-400">1</div>
                        <div class="text-sm text-blue-200 uppercase tracking-wide">Visi Desa Mandiri</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 9. PETA / CALL TO ACTION --}}
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Ingin Berkunjung atau Bekerjasama?</h2>
                <p class="text-slate-600 mb-8 max-w-2xl mx-auto">Kami terbuka untuk kunjungan wisata edukasi industri kerupuk maupun kerjasama pengembangan desa.</p>

                <div class="flex justify-center gap-4">
                    <a href="https://maps.google.com/?q=Kelurahan+Sungai+Lekop+Bintan" target="_blank" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition shadow-lg">
                        <i class="fas fa-map-marked-alt mr-2"></i> Lihat di Peta
                    </a>
                    <a href="/kontak" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 border border-blue-200 font-medium rounded-lg hover:bg-blue-50 transition shadow-sm">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </section>

    </main>

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
        function openModal(facility) {
            const modal = document.getElementById('facilityModal');
            const modalContent = document.getElementById('modalContent');

            const facilityData = {
                masjid: {
                    title: 'Fasilitas Keagamaan',
                    items: [{
                            name: 'Masjid Al-Kautsar',
                            src: 'https://placehold.co/600x400/1e3a8a/FFFFFF?text=Masjid+Al-Kautsar',
                            location: 'Perumahan Griya Indo Kencana'
                        },
                        {
                            name: 'Masjid Al-Fattah',
                            src: 'https://placehold.co/600x400/1e3a8a/FFFFFF?text=Masjid+Al-Fattah',
                            location: 'Jl. Musi'
                        }
                    ]
                },
                sekolah: {
                    title: 'Fasilitas Pendidikan',
                    items: [{
                            name: 'SDN 011 Bintan Timur',
                            src: 'https://placehold.co/600x400/2563eb/FFFFFF?text=SDN+011',
                            location: 'Km 20 (Pusat Kota)'
                        },
                        {
                            name: 'SDN 015 Bintan Timur',
                            src: 'https://placehold.co/600x400/2563eb/FFFFFF?text=SDN+015',
                            location: 'Jl. Korindo'
                        }
                    ]
                },
                potensi: {
                    title: 'Potensi Alam & Perikanan',
                    items: [{
                            name: 'Budidaya Air Tawar',
                            src: 'https://placehold.co/600x400/059669/FFFFFF?text=Area+Budidaya',
                            location: 'Kawasan Pesisir Sungai Lekop'
                        },
                        {
                            name: 'Kolam UMKM',
                            src: 'https://placehold.co/600x400/059669/FFFFFF?text=Kolam+UMKM',
                            location: 'Sentra Perikanan Terpadu'
                        }
                    ]
                }
            };

            const data = facilityData[facility];

            modalContent.innerHTML = `
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-slate-900 border-b-2 border-blue-500 inline-block pb-2">${data.title}</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-8">
                    ${data.items.map((item, index) => `
                        <div class="group">
                            <h3 class="text-lg font-bold text-slate-800 mb-2 pl-1 border-l-4 border-blue-500">${item.name}</h3>
                            <div class="relative rounded-xl overflow-hidden shadow-lg h-64 w-full">
                                <img src="${item.src}" alt="${item.name}" class="w-full h-full object-cover transform transition duration-700 group-hover:scale-110">
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                                
                                <div class="absolute bottom-0 left-0 p-4 w-full transform translate-y-0 transition-transform">
                                    <p class="text-white text-sm font-light tracking-wide flex items-center">
                                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                        ${item.location}
                                    </p>
                                </div>
                            </div>
                        </div>
                    `).join('')}
                </div>
                <div class="mt-8 pt-4 border-t border-gray-200 text-center">
                    <button onclick="closeModal()" class="px-8 py-2.5 bg-slate-800 text-white rounded-full hover:bg-slate-900 transition shadow-lg text-sm font-medium">
                        Tutup Tampilan
                    </button>
                </div>
            `;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('facilityModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('facilityModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Handle initial hash scroll on page load
        function handleInitialHashScroll() {
            const hash = window.location.hash.substring(1);
            if (hash) {
                const targetSection = document.getElementById(hash);

                if (targetSection) {
                    // Prevent default browser scroll
                    if (window.location.hash) {
                        window.history.replaceState(null, null, window.location.pathname);
                    }

                    // Wait a bit for the page to fully load and render
                    setTimeout(() => {
                        const headerHeight = document.querySelector('.modern-header')?.offsetHeight || 80;
                        const stickyNavHeight = document.querySelector('.sticky')?.offsetHeight || 60;
                        const totalOffset = headerHeight + stickyNavHeight;

                        const targetPosition = targetSection.offsetTop - totalOffset;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });

                        // Restore hash after scroll
                        setTimeout(() => {
                            window.history.replaceState(null, null, '#' + hash);
                        }, 1000);
                    }, 100);
                }
            }
        }

        // Check hash on page load
        document.addEventListener('DOMContentLoaded', handleInitialHashScroll);

        // Also check hash after window fully loads (in case of slow loading)
        window.addEventListener('load', handleInitialHashScroll);

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
                closeGalleryViewer();
            }
        });
    </script>
</body>

</html>