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
                    <a href="#sudut-unik-fasilitas" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">
                        <i class="fas fa-th mr-2"></i>Sudut Unik & Fasilitas
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

                {{-- Category Filter Buttons --}}
                <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up" data-aos-delay="100">
                    <button class="category-filter px-6 py-2.5 rounded-full bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition-all duration-300 shadow-md border border-blue-700" data-filter="all">
                        <i class="fas fa-th mr-2"></i>Semua
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="puskesmas">
                        <i class="fas fa-hospital mr-2"></i>Puskesmas
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="posyandu">
                        <i class="fas fa-baby mr-2"></i>Posyandu
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="sd">
                        <i class="fas fa-school mr-2"></i>SD
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="smp">
                        <i class="fas fa-graduation-cap mr-2"></i>SMP
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="sma">
                        <i class="fas fa-university mr-2"></i>SMA/SMK/MAN
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="masjid">
                        <i class="fas fa-mosque mr-2"></i>Masjid
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="surau">
                        <i class="fas fa-pray mr-2"></i>Surau
                    </button>
                    <button class="category-filter px-6 py-2.5 rounded-full bg-white text-gray-700 text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-gray-200" data-filter="tpa">
                        <i class="fas fa-book-open mr-2"></i>TPA/TPQ
                    </button>
                </div>

                {{-- Search Bar --}}
                <div class="max-w-2xl mx-auto mb-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative">
                        <input type="text" id="facility-search" placeholder="Cari fasilitas..." class="w-full px-12 py-3 rounded-full border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all duration-300 shadow-sm">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <button id="clear-search" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 hidden">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="facilities-grid" class="grid md:grid-cols-3 gap-8">
                    {{-- Puskesmas --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="100" data-category="puskesmas" onclick="openModal('puskesmas')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/ef4444/FFFFFF?text=Puskesmas" alt="Puskesmas" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Kesehatan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-red-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Puskesmas Pembantu</h3>
                            <p class="text-slate-600 text-sm mb-4">Fasilitas kesehatan utama melayani kebutuhan medis dasar warga Sungai Lekop.</p>
                        </div>
                    </div>

                    {{-- Posyandu --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="200" data-category="posyandu" onclick="openModal('posyandu')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/10b981/FFFFFF?text=Posyandu" alt="Posyandu" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Kesehatan Anak</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-green-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Posyandu Melati</h3>
                            <p class="text-slate-600 text-sm mb-4">Pelayanan kesehatan ibu dan balita, pemantauan tumbuh kembang anak.</p>
                        </div>
                    </div>

                    {{-- SD --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="300" data-category="sd" onclick="openModal('sd')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/3b82f6/FFFFFF?text=SDN+011" alt="SDN 011" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-blue-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">SDN 011 Bintan Timur</h3>
                            <p class="text-slate-600 text-sm mb-4">Sekolah dasar unggulan di Km 20, mencetak generasi berkualitas dan berprestasi.</p>
                        </div>
                    </div>

                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="400" data-category="sd" onclick="openModal('sd')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/3b82f6/FFFFFF?text=SDN+015" alt="SDN 015" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-blue-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">SDN 015 Bintan Timur</h3>
                            <p class="text-slate-600 text-sm mb-4">Sekolah dasar di Jl. Korindo, dekat dengan sentra industri kerupuk.</p>
                        </div>
                    </div>

                    {{-- SMP --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="500" data-category="smp" onclick="openModal('smp')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/8b5cf6/FFFFFF?text=SMP+Negeri" alt="SMP Negeri" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-purple-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">SMP Negeri 1 Bintan Timur</h3>
                            <p class="text-slate-600 text-sm mb-4">Sekolah menengah pertama terdekat dengan fasilitas lengkap dan berkualitas.</p>
                        </div>
                    </div>

                    {{-- SMA/SMK/MAN --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="600" data-category="sma" onclick="openModal('sma')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/f59e0b/FFFFFF?text=SMK+Negeri" alt="SMK Negeri" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-orange-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">SMK Negeri 1 Bintan</h3>
                            <p class="text-slate-600 text-sm mb-4">Sekolah menengah kejuruan dengan berbagai program keahlian terkini.</p>
                        </div>
                    </div>

                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="700" data-category="sma" onclick="openModal('sma')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/06b6d4/FFFFFF?text=MAN" alt="MAN" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-cyan-100 text-cyan-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-cyan-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">MAN 1 Bintan</h3>
                            <p class="text-slate-600 text-sm mb-4">Madrasah aliyah negeri dengan pendidikan Islam dan umum yang terpadu.</p>
                        </div>
                    </div>

                    {{-- Masjid --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="800" data-category="masjid" onclick="openModal('masjid')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/059669/FFFFFF?text=Masjid+Al-Kautsar" alt="Masjid Al-Kautsar" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded">Religi</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-emerald-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Masjid Al-Kautsar</h3>
                            <p class="text-slate-600 text-sm mb-4">Masjid utama di Perumahan Griya Indo Kencana, pusat kegiatan keagamaan.</p>
                        </div>
                    </div>

                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="900" data-category="masjid" onclick="openModal('masjid')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/059669/FFFFFF?text=Masjid+Al-Fattah" alt="Masjid Al-Fattah" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded">Religi</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-emerald-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Masjid Al-Fattah</h3>
                            <p class="text-slate-600 text-sm mb-4">Masjid di Jl. Musi, melayani kegiatan spiritual warga sekitar.</p>
                        </div>
                    </div>

                    {{-- Surau --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="1000" data-category="surau" onclick="openModal('surau')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/6366f1/FFFFFF?text=Surau+Al-Ikhlas" alt="Surau Al-Ikhlas" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded">Religi</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-indigo-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Surau Al-Ikhlas</h3>
                            <p class="text-slate-600 text-sm mb-4">Surau kecil untuk sholat berjamaah dan kegiatan keagamaan harian.</p>
                        </div>
                    </div>

                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="1100" data-category="surau" onclick="openModal('surau')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/6366f1/FFFFFF?text=Surau+At-Taubah" alt="Surau At-Taubah" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded">Religi</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-indigo-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Surau At-Taubah</h3>
                            <p class="text-slate-600 text-sm mb-4">Surau di kawasan perumahan, tempat ibadah yang nyaman dan damai.</p>
                        </div>
                    </div>

                    {{-- TPA/TPQ --}}
                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="1200" data-category="tpa" onclick="openModal('tpa')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/a855f7/FFFFFF?text=TPA+Al-Hikmah" alt="TPA Al-Hikmah" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-violet-100 text-violet-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan Islam</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-violet-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">TPA Al-Hikmah</h3>
                            <p class="text-slate-600 text-sm mb-4">Taman pendidikan Al-Qur'an untuk anak usia dini belajar dasar Islam.</p>
                        </div>
                    </div>

                    <div class="facility-card bg-white rounded-2xl overflow-hidden shadow-md card-hover group cursor-pointer" data-aos="fade-up" data-aos-delay="1300" data-category="tpa" onclick="openModal('tpa')">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x400/a855f7/FFFFFF?text=TPQ+Nurul+Iman" alt="TPQ Nurul Iman" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-violet-100 text-violet-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendidikan Islam</span>
                                <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-violet-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">TPQ Nurul Iman</h3>
                            <p class="text-slate-600 text-sm mb-4">Taman pendidikan Al-Qur'an dengan metode pembelajaran modern.</p>
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
                    <p class="text-slate-600 max-w-2xl mx-auto">Dukung produk-produk unggulan Usaha Mikro Kecil Menengah khas Sungai Lekop, Bintan</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    {{-- UMKM 1: Kerupuk Pak Haji --}}
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group" data-aos="fade-up">
                        <div class="relative">
                            <div class="h-56 overflow-hidden">
                                <img src="https://placehold.co/400x300/f59e0b/FFFFFF?text=Kerupuk+Pak+Haji" alt="Kerupuk Pak Haji" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-fire mr-1"></i>Best Seller
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-store text-orange-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">Kerupuk Pak Haji</h3>
                                    <p class="text-sm text-gray-500">Usaha Keluarga</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-slate-800 mb-2">Produk Unggulan:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Kerupuk Ikan Tenggiri</span>
                                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Kerupuk Atom</span>
                                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Kerupuk Udang</span>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm mb-4">Kerupuk khas Bintan dengan resep turun temurun, kualitas premium dan rasa autentik</p>

                            <div class="border-t pt-4 space-y-2">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-user text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Pemilik: Bapak Haji Ahmad</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">0812-3456-7890</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Jl. Korindo Km 20</span>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 25.000 - 60.000</span>
                                <button class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm hover:bg-orange-600 transition">
                                    <i class="fas fa-phone-alt mr-1"></i>Hubungi
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- UMKM 2: Ibu Sumi's Snack --}}
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative">
                            <div class="h-56 overflow-hidden">
                                <img src="https://placehold.co/400x300/10b981/FFFFFF?text=Ibu+Sumi's+Snack" alt="Ibu Sumi's Snack" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-leaf mr-1"></i>Organik
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-cookie-bite text-green-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">Ibu Sumi's Snack</h3>
                                    <p class="text-sm text-gray-500">Makanan Ringan</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-slate-800 mb-2">Produk Unggulan:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Kue Kering</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Pisang Goreng</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Donat Kampung</span>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm mb-4">Makanan ringan homemade dengan bahan pilihan, tanpa pengawet dan pewarna buatan</p>

                            <div class="border-t pt-4 space-y-2">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-user text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Pemilik: Ibu Sumiati</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">0813-6789-0123</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Perumahan Griya Indo Kencana</span>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 15.000 - 45.000</span>
                                <button class="bg-green-500 text-white px-3 py-1 rounded-full text-sm hover:bg-green-600 transition">
                                    <i class="fas fa-phone-alt mr-1"></i>Hubungi
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- UMKM 3: Toko Kelontong Pak Budi --}}
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative">
                            <div class="h-56 overflow-hidden">
                                <img src="https://placehold.co/400x300/3b82f6/FFFFFF?text=Toko+Pak+Budi" alt="Toko Pak Budi" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-check-circle mr-1"></i>Terpercaya
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-shopping-basket text-blue-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">Toko Kelontong Pak Budi</h3>
                                    <p class="text-sm text-gray-500">Kebutuhan Sehari-hari</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-slate-800 mb-2">Layanan:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Sembako</span>
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Pulsa & Token</span>
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Antar</span>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm mb-4">Toko kelontong lengkap dengan harga bersaing, melayani antar jemput untuk warga sekitar</p>

                            <div class="border-t pt-4 space-y-2">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-user text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Pemilik: Bapak Budi Santoso</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">0821-2345-6789</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Jl. Poros Km 22</span>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Harga Bersaing</span>
                                <button class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm hover:bg-blue-600 transition">
                                    <i class="fas fa-phone-alt mr-1"></i>Hubungi
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- UMKM 4: Salon Ibu Rina --}}
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="300">
                        <div class="relative">
                            <div class="h-56 overflow-hidden">
                                <img src="https://placehold.co/400x300/a855f7/FFFFFF?text=Salon+Ibu+Rina" alt="Salon Ibu Rina" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-star mr-1"></i>Recommended
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-cut text-purple-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">Salon Ibu Rina</h3>
                                    <p class="text-sm text-gray-500">Kecantikan & Salon</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-slate-800 mb-2">Layanan:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">Potong Rambut</span>
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">Creambath</span>
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">Makeup</span>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm mb-4">Salon kecantikan dengan harga terjangkau, pelayanan ramah dan hasil memuaskan</p>

                            <div class="border-t pt-4 space-y-2">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-user text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Pemilik: Ibu Rina Sari</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">0819-8765-4321</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Kawasan Perumahan</span>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 25.000 - 150.000</span>
                                <button class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm hover:bg-purple-600 transition">
                                    <i class="fas fa-phone-alt mr-1"></i>Hubungi
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- UMKM 5: Bengkel Pak Joko --}}
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="400">
                        <div class="relative">
                            <div class="h-56 overflow-hidden">
                                <img src="https://placehold.co/400x400/6366f1/FFFFFF?text=Bengkel+Pak+Joko" alt="Bengkel Pak Joko" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute top-4 right-4 bg-indigo-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-wrench mr-1"></i>24 Jam
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-motorcycle text-indigo-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">Bengkel Pak Joko</h3>
                                    <p class="text-sm text-gray-500">Montir & Service</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-slate-800 mb-2">Layanan:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded">Service Motor</span>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded">Ganti Oli</span>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded">Tambal Ban</span>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm mb-4">Bengkel motor terpercaya, melayani service panggilan untuk wilayah Sungai Lekop</p>

                            <div class="border-t pt-4 space-y-2">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-user text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Pemilik: Bapak Joko Prasetyo</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">0815-4321-9876</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Jl. Korindo Km 18</span>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 20.000 - 200.000</span>
                                <button class="bg-indigo-500 text-white px-3 py-1 rounded-full text-sm hover:bg-indigo-600 transition">
                                    <i class="fas fa-phone-alt mr-1"></i>Hubungi
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- UMKM 6: Warung Makan Bu Narti --}}
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="500">
                        <div class="relative">
                            <div class="h-56 overflow-hidden">
                                <img src="https://placehold.co/400x300/ef4444/FFFFFF?text=Warung+Bu+Narti" alt="Warung Bu Narti" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-utensils mr-1"></i>Enak
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-bowl-food text-red-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">Warung Makan Bu Narti</h3>
                                    <p class="text-sm text-gray-500">Kuliner Nusantara</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-slate-800 mb-2">Menu Spesial:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Nasi Padang</span>
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Ayam Bakar</span>
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Soto</span>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm mb-4">Warung makan dengan menu rumahan yang lezat, harga terjangkau dan porsi besar</p>

                            <div class="border-t pt-4 space-y-2">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-user text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Pemilik: Ibu Narti Wijaya</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">0817-6543-2109</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2 w-4"></i>
                                    <span class="text-gray-600">Jl. Poros Km 21</span>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-orange-600 font-bold">Rp 15.000 - 35.000</span>
                                <button class="bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-red-600 transition">
                                    <i class="fas fa-phone-alt mr-1"></i>Hubungi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-gradient-to-r from-orange-50 to-blue-50 rounded-2xl p-8 max-w-4xl mx-auto" data-aos="fade-up">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">
                            <i class="fas fa-handshake text-orange-500 mr-2"></i>
                            Dukung UMKM Lokal Sungai Lekop
                        </h3>
                        <p class="text-slate-600 mb-6">Bergabunglah dalam mendukung perekonomian lokal dengan membeli produk-produk UMKM kami. Setiap pembelian Anda membantu meningkatkan kesejahteraan masyarakat Sungai Lekop.</p>
                        <div class="flex justify-center">
                            <a href="#galeri-kegiatan" class="px-6 py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition inline-flex items-center justify-center">
                                <i class="fas fa-images mr-2"></i> Lihat Galeri Produksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 6. GALERI KEGIATAN --}}

        <div class="container mx-auto px-6">
            <section id="galeri-kegiatan" class="py-20 bg-white">
                <div class="text-center mb-16" data-aos="fade-up">
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
                        <button onclick="showGallery('umkm')" class="gallery-tab px-4 py-2 rounded-md text-gray-600 hover:text-gray-900 text-sm font-medium transition">UMKM</button>
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

                    {{-- UMKM Gallery Items --}}
                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="600">
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

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="700">
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

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="800">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/f59e0b/FFFFFF?text=Produksi+Kerupuk+2" alt="Produksi Kerupuk" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-store text-2xl mb-2"></i>
                                    <p class="text-sm">Produksi Kerupuk</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="900">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/10b981/FFFFFF?text=Pelatihan+UMKM" alt="Pelatihan UMKM" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-chalkboard-teacher text-2xl mb-2"></i>
                                    <p class="text-sm">Pelatihan UMKM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="1000">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/3b82f6/FFFFFF?text=Produksi+Kerupuk+3" alt="Produksi Kerupuk" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-industry text-2xl mb-2"></i>
                                    <p class="text-sm">Produksi Kerupuk</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="1100">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/a855f7/FFFFFF?text=Bazar+UMKM" alt="Bazar UMKM" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-shopping-bag text-2xl mb-2"></i>
                                    <p class="text-sm">Bazar UMKM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="1200">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/06b6d4/FFFFFF?text=Workshop+Digital" alt="Workshop Digital" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-laptop text-2xl mb-2"></i>
                                    <p class="text-sm">Workshop Digital</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="1300">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/6366f1/FFFFFF?text=Kunjungan+Buyer" alt="Kunjungan Buyer" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-handshake text-2xl mb-2"></i>
                                    <p class="text-sm">Kunjungan Buyer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-item umkm" data-aos="fade-up" data-aos-delay="1400">
                        <div class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer">
                            <img src="https://placehold.co/400x300/10b981/FFFFFF?text=Sertifikasi+Halal" alt="Sertifikasi Halal" class="w-full h-48 object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="text-white text-center">
                                    <i class="fas fa-certificate text-2xl mb-2"></i>
                                    <p class="text-sm">Sertifikasi Halal</p>
                                </div>
                            </div>
                        </div>
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
                puskesmas: {
                    title: 'Fasilitas Kesehatan',
                    items: [{
                            name: 'Puskesmas Pembantu Sungai Lekop',
                            src: 'https://placehold.co/600x400/ef4444/FFFFFF?text=Puskesmas',
                            location: 'Jl. Poros Km 20, Sungai Lekop'
                        },
                        {
                            name: 'Puskesmas Keliling',
                            src: 'https://placehold.co/600x400/ef4444/FFFFFF?text=Puskesmas+Keliling',
                            location: 'Melayani wilayah pemukiman warga'
                        }
                    ]
                },
                posyandu: {
                    title: 'Posyandu',
                    items: [{
                            name: 'Posyandu Melati',
                            src: 'https://placehold.co/600x400/10b981/FFFFFF?text=Posyandu+Melati',
                            location: 'Perumahan Griya Indo Kencana'
                        },
                        {
                            name: 'Posyandu Mawar',
                            src: 'https://placehold.co/600x400/10b981/FFFFFF?text=Posyandu+Mawar',
                            location: 'Kawasan Jl. Korindo'
                        }
                    ]
                },
                sd: {
                    title: 'Sekolah Dasar',
                    items: [{
                            name: 'SDN 011 Bintan Timur',
                            src: 'https://placehold.co/600x400/3b82f6/FFFFFF?text=SDN+011',
                            location: 'Km 20 (Pusat Kota)'
                        },
                        {
                            name: 'SDN 015 Bintan Timur',
                            src: 'https://placehold.co/600x400/3b82f6/FFFFFF?text=SDN+015',
                            location: 'Jl. Korindo'
                        }
                    ]
                },
                smp: {
                    title: 'Sekolah Menengah Pertama',
                    items: [{
                        name: 'SMP Negeri 1 Bintan Timur',
                        src: 'https://placehold.co/600x400/8b5cf6/FFFFFF?text=SMP+Negeri+1',
                        location: 'Jl. Poros Km 22'
                    }]
                },
                sma: {
                    title: 'Sekolah Menengah Atas/Kejuruan',
                    items: [{
                            name: 'SMK Negeri 1 Bintan',
                            src: 'https://placehold.co/600x400/f59e0b/FFFFFF?text=SMK+Negeri+1',
                            location: 'Kota Tanjungpinang'
                        },
                        {
                            name: 'MAN 1 Bintan',
                            src: 'https://placehold.co/600x400/06b6d4/FFFFFF?text=MAN+1+Bintan',
                            location: 'Kecamatan Bintan Timur'
                        }
                    ]
                },
                masjid: {
                    title: 'Masjid',
                    items: [{
                            name: 'Masjid Al-Kautsar',
                            src: 'https://placehold.co/600x400/059669/FFFFFF?text=Masjid+Al-Kautsar',
                            location: 'Perumahan Griya Indo Kencana'
                        },
                        {
                            name: 'Masjid Al-Fattah',
                            src: 'https://placehold.co/600x400/059669/FFFFFF?text=Masjid+Al-Fattah',
                            location: 'Jl. Musi'
                        }
                    ]
                },
                surau: {
                    title: 'Surau',
                    items: [{
                            name: 'Surau Al-Ikhlas',
                            src: 'https://placehold.co/600x400/6366f1/FFFFFF?text=Surau+Al-Ikhlas',
                            location: 'Kawasan Perumahan'
                        },
                        {
                            name: 'Surau At-Taubah',
                            src: 'https://placehold.co/600x400/6366f1/FFFFFF?text=Surau+At-Taubah',
                            location: 'Jl. Korindo'
                        }
                    ]
                },
                tpa: {
                    title: 'TPA/TPQ',
                    items: [{
                            name: 'TPA Al-Hikmah',
                            src: 'https://placehold.co/600x400/a855f7/FFFFFF?text=TPA+Al-Hikmah',
                            location: 'Perumahan Griya Indo Kencana'
                        },
                        {
                            name: 'TPQ Nurul Iman',
                            src: 'https://placehold.co/600x400/a855f7/FFFFFF?text=TPQ+Nurul+Iman',
                            location: 'Kawasan Jl. Korindo'
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

        // Facilities Filtering and Search Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // --- SELECTORS ---
            const filterButtons = document.querySelectorAll(".category-filter");
            const searchInput = document.getElementById("facility-search");
            const clearSearchBtn = document.getElementById("clear-search");
            const allFacilityCards = Array.from(
                document.querySelectorAll(".facility-card")
            );
            const facilitiesGrid = document.getElementById("facilities-grid");

            // --- STATE ---
            let filteredCards = allFacilityCards;

            // --- CORE FUNCTIONS ---

            // This function just updates the DOM to show the correct cards
            function displayCards() {
                if (!facilitiesGrid) return; // Guard clause

                // Hide all cards, then show only the visible ones
                allFacilityCards.forEach((card) => {
                    if (filteredCards.includes(card)) {
                        card.style.display = "";
                    } else {
                        card.style.display = "none";
                    }
                });
            }

            // Applies filters and search, then resets the view
            function applyFiltersAndSearch() {
                const category =
                    document.querySelector(".category-filter.bg-blue-600")?.dataset
                    .filter || "all";
                const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : "";

                filteredCards = allFacilityCards.filter((card) => {
                    const cardCategory = (card.dataset.category || "").toLowerCase();
                    const cardTitle = (
                        card.querySelector("h3")?.textContent || ""
                    ).toLowerCase();
                    const cardDescription = (
                        card.querySelector("p")?.textContent || ""
                    ).toLowerCase();
                    const categoryMatch =
                        category === "all" || cardCategory === category;
                    const searchMatch =
                        searchTerm === "" ||
                        cardTitle.includes(searchTerm) ||
                        cardDescription.includes(searchTerm) ||
                        cardCategory.includes(searchTerm);
                    return categoryMatch && searchMatch;
                });

                displayCards();
            }

            // --- EVENT LISTENERS ---
            filterButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    filterButtons.forEach((btn) => {
                        btn.classList.remove(
                            "bg-blue-600",
                            "text-white",
                            "border-blue-700",
                            "shadow-md"
                        );
                        btn.classList.add("bg-white", "text-gray-700", "border-gray-200");
                    });
                    button.classList.add(
                        "bg-blue-600",
                        "text-white",
                        "border-blue-700",
                        "shadow-md"
                    );
                    button.classList.remove(
                        "bg-white",
                        "text-gray-700",
                        "border-gray-200"
                    );
                    applyFiltersAndSearch();
                });
            });

            if (searchInput) {
                let searchTimeout;
                searchInput.addEventListener("input", () => {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        applyFiltersAndSearch();
                    }, 300);
                });

                // Show/hide clear button
                searchInput.addEventListener("input", () => {
                    if (clearSearchBtn) {
                        clearSearchBtn.classList.toggle("hidden", searchInput.value.trim() === "");
                    }
                });
            }

            if (clearSearchBtn) {
                clearSearchBtn.addEventListener("click", () => {
                    if (searchInput) {
                        searchInput.value = "";
                        clearSearchBtn.classList.add("hidden");
                        applyFiltersAndSearch();
                    }
                });
            }

            // --- INITIAL RENDER ---
            applyFiltersAndSearch();
        });
    </script>
</body>

</html>