<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Sungai Lekop</title>

    {{-- Library Pihak Ketiga --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* --- Setup Variable Warna Biru --- */
        :root {
            --primary-900: #1e3a8a;
            /* Biru Tua Gelap */
            --primary-800: #1e40af;
            --primary-700: #1d4ed8;
            --primary-600: #2563eb;
            /* Biru Utama */
            --primary-500: #3b82f6;
            --primary-gradient: linear-gradient(135deg, var(--primary-900) 0%, var(--primary-600) 100%);
            --dark-blue: #0f172a;
            /* Slate 900 */
        }

        html,
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: 'Inter', system-ui, sans-serif;
            scroll-behavior: smooth;
        }

        /* --- Header Styles (Glass Effect) --- */
        .modern-header {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(15, 23, 42, 0.1);
            /* Transparan gelap dikit */
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        /* Saat di-scroll header jadi biru solid */
        .modern-header.scrolled {
            background: var(--primary-900) !important;
            backdrop-filter: none !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border-bottom: none;
        }

        /* --- HERO BANNER (FULL SCREEN) --- */
        .hero-banner {
            position: relative;
            min-height: 100vh;
            /* Kunci Full Window */
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            margin: 0;
            padding: 0;
            padding-top: 80px;
            /* Space for header */
            box-sizing: border-box;
        }

        /* Overlay Hitam-Biru Transparan supaya teks terbaca */
        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.3) 0%, rgba(30, 58, 138, 0.8) 100%);
            z-index: 1;
        }

        /* Slide Gambar Background */
        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            transform: scale(1.1);
            transition: opacity 1.5s ease-in-out, transform 6s ease;
            z-index: 1;
        }

        .hero-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        /* Konten Tengah (Teks & Tombol) */
        .hero-content {
            position: relative;
            z-index: 2;
            /* Di atas overlay */
            text-align: center;
            max-width: 900px;
            padding: 0 20px;
            color: white;
        }

        /* --- Social Media Vertikal (Kiri) --- */
        .social-vertical {
            position: absolute;
            left: 2rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* Style Tombol Sosmed */
        .social-btn {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            /* Glass */
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-btn:hover {
            background: var(--primary-600);
            transform: scale(1.1);
            border-color: var(--primary-500);
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.6);
        }

        /* --- Tombol Utama (CTA) --- */
        .btn-cta-blue {
            background: var(--primary-600);
            color: white;
            padding: 14px 32px;
            border-radius: 99px;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
            border: none;
        }

        .btn-cta-blue:hover {
            background: var(--primary-700);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.6);
        }

        .btn-cta-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: white;
            padding: 14px 32px;
            border-radius: 99px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-cta-glass:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }

        /* Indikator Scroll Down */
        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            z-index: 20;
            color: white;
            animation: bounce 2s infinite;
        }

        /* --- Style Tambahan Section Lain --- */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: 0.3s;
            border: 1px solid #f1f5f9;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-500);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-900);
        }

        .service-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid #f1f5f9;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .service-card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
            transform: translateY(-5px);
        }

        /* Animasi */
        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 1s ease-out forwards;
        }

        /* News Tabs */
        .news-tab-btn {
            padding: 8px 16px;
            font-weight: 600;
            color: #64748b;
            cursor: pointer;
            border: none;
            background: none;
        }

        .news-tab-btn.active {
            color: var(--primary-800);
            border-bottom: 2px solid var(--primary-600);
        }

        .news-tab-content {
            display: none;
        }

        .news-tab-content.active {
            display: block;
            animation: fadeInUp 0.5s;
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('frontend.layouts.navigation')

    <!-- Main Content -->
    <main>

        {{-- ================= HERO BANNER (FIXED) ================= --}}
        <div class="hero-banner" style="padding-top: 0; margin-top: 0;">

            {{-- 1. SOSMED VERTIKAL (Desktop Only) --}}
            <div class="hidden md:flex social-vertical">
                <a href="https://facebook.com" class="social-btn group"><i class="fab fa-facebook-f text-lg"></i></a>
                <a href="https://instagram.com" class="social-btn group"><i class="fab fa-instagram text-lg"></i></a>
                <a href="https://youtube.com" class="social-btn group"><i class="fab fa-youtube text-lg"></i></a>
            </div>

            {{-- Gambar lokal untuk hero slide --}}
            <div class="hero-slide active">
                <img src="{{ asset('images/kantor.png') }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
            </div>
            <div class="hero-slide">
                <img src="{{ asset('images/kantor-sungailekop.JPG') }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
            </div>

            {{-- 3. KONTEN TENGAH --}}
            <div class="hero-content animate-fade-in">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold mb-6 drop-shadow-lg leading-tight">
                    Selamat Datang di <br>
                    <span class="text-blue-300">Kelurahan Sungai Lekop</span>
                </h1>

                <p class="text-base md:text-xl mb-8 text-gray-200 font-light max-w-2xl mx-auto drop-shadow-md">
                    Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center w-full">
                    <a href="#berita-utama" class="btn-cta-blue flex items-center justify-center">
                        <i class="fas fa-newspaper mr-2"></i> Berita Utama
                    </a>
                    <a href="#layanan-kami" class="btn-cta-glass flex items-center justify-center">
                        <i class="fas fa-compass mr-2"></i> Jelajah Lekop
                    </a>
                </div>

                {{-- Sosmed Mobile (Horizontal di bawah tombol) --}}
                <div class="flex md:hidden gap-4 mt-8 justify-center">
                    <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            {{-- 4. SCROLL INDICATOR --}}
            <a href="#statistik" class="scroll-indicator w-12 h-12 rounded-full border border-white/20 flex items-center justify-center hover:bg-white/10 transition">
                <i class="fas fa-chevron-down"></i>
            </a>

        </div>
        {{-- END HERO BANNER --}}

        {{-- KONTEN UTAMA --}}
        <div class="w-full bg-white relative z-10">
            <div class="w-[90%] max-w-[1300px] mx-auto py-16">

                {{-- PROFIL SINGKAT --}}
                <section id="profil-singkat" class="mb-24" data-aos="fade-up">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800">
                            <i class="fas fa-info-circle text-blue-800 mr-2"></i> Profil Singkat
                        </h2>
                        <p class="text-gray-600 mt-2">Mengenal lebih dekat Kelurahan Sungai Lekop</p>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100">
                            <h3 class="text-xl font-bold mb-4 text-blue-900 flex items-center gap-2">
                                <i class="fas fa-landmark"></i> Tentang Kami
                            </h3>
                            <p class="text-gray-600 leading-relaxed mb-4">
                                Kelurahan Sungai Lekop adalah salah satu kelurahan yang terletak di Kecamatan Bintan Timur, Kabupaten Bintan. Kami berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat dalam berbagai aspek administrasi dan pembangunan.
                            </p>
                            <div class="space-y-2">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-map-marker-alt text-red-500"></i>
                                    <span class="text-gray-700">Jl. Korindo Km. 22 No. 1A, Sungai Lekop</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-blue-500"></i>
                                    <span class="text-gray-700">kelurahan@sungailekop.id</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fab fa-instagram text-purple-500"></i>
                                    <span class="text-gray-700">@Kelurahansungailekop</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-blue-900 to-blue-800 text-white rounded-xl p-8">
                            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                                <i class="fas fa-star text-yellow-400"></i> Visi & Misi
                            </h3>
                            <div class="mb-6">
                                <h4 class="font-semibold text-yellow-300 mb-2">Visi</h4>
                                <p class="text-blue-100 italic">
                                    "Terwujudnya Kelurahan Sungai Lekop yang maju, mandiri, dan sejahtera berbasis pelayanan prima."
                                </p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-yellow-300 mb-2">Misi</h4>
                                <ul class="space-y-2 text-blue-100 text-sm">
                                    <li class="flex gap-2">
                                        <i class="fas fa-check-circle text-green-400 mt-0.5"></i>
                                        <span>Memberikan pelayanan administrasi yang cepat dan transparan</span>
                                    </li>
                                    <li class="flex gap-2">
                                        <i class="fas fa-check-circle text-green-400 mt-0.5"></i>
                                        <span>Meningkatkan partisipasi masyarakat dalam pembangunan</span>
                                    </li>
                                    <li class="flex gap-2">
                                        <i class="fas fa-check-circle text-green-400 mt-0.5"></i>
                                        <span>Menjaga kebersihan dan keindahan lingkungan</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- STATISTIK --}}
                <section id="statistik" class="mb-24" data-aos="fade-up">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="stat-card group">
                            <div class="stat-number">15,203</div>
                            <div class="text-gray-500 font-medium">Total Penduduk</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-users text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                        <div class="stat-card group">
                            <div class="stat-number">32</div>
                            <div class="text-gray-500 font-medium">Jumlah RT</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-home text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                        <div class="stat-card group">
                            <div class="stat-number">9</div>
                            <div class="text-gray-500 font-medium">Jumlah RW</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-map-marked-alt text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                        <div class="stat-card group">
                            <div class="stat-number">12</div>
                            <div class="text-gray-500 font-medium">Layanan Publik</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-hand-holding-heart text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- BERITA UTAMA --}}
                <section id="berita-utama" class="mb-24" data-aos="fade-up">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                                <i class="fas fa-newspaper text-blue-800 mr-2"></i> Berita Utama
                            </h2>
                        </div>
                        <a href="{{ route('berita') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                            Lihat Semua <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {{-- Berita Besar Kiri --}}
                        <div class="lg:col-span-2">
                            <div class="relative rounded-2xl overflow-hidden shadow-lg h-[450px] group cursor-pointer">
                                <img src="https://images.unsplash.com/photo-1590402494587-44b71d87e3f6?q=80&w=1280" alt="News" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-8 text-white">
                                    <span class="bg-blue-600 text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block">TERBARU</span>
                                    <h3 class="text-2xl md:text-3xl font-bold mb-2 leading-tight">Kegiatan Gotong Royong Massal di Lingkungan RW 02</h3>
                                    <p class="text-gray-300 text-sm line-clamp-2 mt-2">Masyarakat Kelurahan Sungai Lekop antusias mengikuti kegiatan bersih-bersih lingkungan demi kenyamanan bersama.</p>
                                </div>
                            </div>
                        </div>

                        {{-- List Berita Kanan --}}
                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 h-full">
                                <div class="flex border-b mb-4">
                                    <button class="news-tab-btn active mr-4" data-tab="terkini">Terkini</button>
                                    <button class="news-tab-btn" data-tab="populer">Populer</button>
                                </div>

                                {{-- Tab Terkini --}}
                                <div id="terkini" class="news-tab-content active space-y-4">
                                    @if(isset($beritas) && $beritas->count() > 0)
                                    @foreach($beritas->take(4) as $berita)
                                    <div class="flex items-start gap-4 p-2 hover:bg-blue-50 rounded-lg transition cursor-pointer">
                                        <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-gray-200">
                                            <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" alt="thumb" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <a href="{{ route('berita.show', $berita->slug) }}" class="font-bold text-gray-800 hover:text-blue-700 line-clamp-2 mb-1 text-sm leading-snug">
                                                {{ $berita->judul }}
                                            </a>
                                            <span class="text-xs text-gray-500 block mt-1"><i class="far fa-clock mr-1"></i> {{ $berita->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <p class="text-sm text-gray-500 text-center py-4">Belum ada berita.</p>
                                    @endif
                                </div>

                                {{-- Tab Populer --}}
                                <div id="populer" class="news-tab-content space-y-4">
                                    <p class="text-sm text-gray-500 text-center py-4">Belum ada berita populer.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- JELAJAH LEKOP --}}
                <section id="layanan-kami" class="mb-24" data-aos="fade-up">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800">
                            <i class="fas fa-compass text-blue-800 mr-2"></i> Jelajah Lekop
                        </h2>
                        <p class="text-gray-600 mt-2">Temukan potensi dan keunggulan daerah Sungai Lekop</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="service-card group">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-blue-600 text-2xl group-hover:bg-blue-600 group-hover:text-white transition"><i class="fas fa-building"></i></div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Sudut Unik & Fasilitas</h3>
                            <p class="text-gray-500 text-sm mb-6">Mengenal lebih dekat infrastruktur dan kehidupan sosial di Sungai Lekop.</p>
                            <a href="{{ route('layanan') }}#sudut-unik-fasilitas" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Jelajahi Fasilitas <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                        <div class="service-card group">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-blue-600 text-2xl group-hover:bg-blue-600 group-hover:text-white transition"><i class="fas fa-store"></i></div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">UMKM Lokal</h3>
                            <p class="text-gray-500 text-sm mb-6">Dukung dan kenalkan produk Usaha Mikro Kecil Menengah khas Sungai Lekop.</p>
                            <a href="{{ route('layanan') }}#umkm-lokal" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Jelajahi UMKM <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                        <div class="service-card group">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-blue-600 text-2xl group-hover:bg-blue-600 group-hover:text-white transition"><i class="fas fa-mountain"></i></div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Potensi Wisata</h3>
                            <p class="text-gray-500 text-sm mb-6">Eksplorasi keindahan alam dan destinasi wisata di wilayah Sungai Lekop.</p>
                            <a href="{{ route('layanan') }}#pariwisata" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Temukan Wisata <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </section>

                {{-- GALERI --}}
                <section class="mb-24" data-aos="fade-up">
                    <div class="flex justify-between items-end mb-8">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800"><i class="fas fa-images text-blue-800 mr-2"></i> Galeri Kegiatan</h2>
                        <a href="#" class="px-5 py-2 rounded-full border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white transition text-sm font-medium">Lihat Semua</a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        {{-- Item Galeri 1 --}}
                        <div class="relative h-64 rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1577017040065-65052869463d?q=80&w=600" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white font-bold">
                                Lihat Kegiatan
                            </div>
                        </div>
                        {{-- Item Galeri 2 --}}
                        <div class="relative h-64 rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=600" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white font-bold">
                                Lihat Kegiatan
                            </div>
                        </div>
                        {{-- Item Galeri 3 --}}
                        <div class="relative h-64 rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?q=80&w=600" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white font-bold">
                                Lihat Kegiatan
                            </div>
                        </div>
                    </div>
                </section>

                {{-- QUICK LINKS --}}
                <section id="quick-links" class="mb-24" data-aos="fade-up">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800">
                            <i class="fas fa-compass text-blue-800 mr-2"></i> Akses Cepat
                        </h2>
                        <p class="text-gray-600 mt-2">Temukan informasi yang Anda butuhkan dengan cepat</p>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <a href="{{ url('/profil') }}" class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center hover:shadow-lg transition group">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600 text-2xl group-hover:bg-blue-600 group-hover:text-white transition">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Profil</h3>
                            <p class="text-xs text-gray-500">Identitas & Struktur</p>
                        </a>
                        <a href="{{ url('/berita') }}" class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center hover:shadow-lg transition group">
                            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 text-green-600 text-2xl group-hover:bg-green-600 group-hover:text-white transition">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Berita</h3>
                            <p class="text-xs text-gray-500">Informasi Terkini</p>
                        </a>
                        <a href="{{ url('/layanan') }}" class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center hover:shadow-lg transition group">
                            <div class="w-16 h-16 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-4 text-purple-600 text-2xl group-hover:bg-purple-600 group-hover:text-white transition">
                                <i class="fas fa-compass"></i>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Jelajah Lekop</h3>
                            <p class="text-xs text-gray-500">Potensi & UMKM</p>
                        </a>
                        <a href="{{ url('/kontak') }}" class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center hover:shadow-lg transition group">
                            <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 text-red-600 text-2xl group-hover:bg-red-600 group-hover:text-white transition">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Kontak</h3>
                            <p class="text-xs text-gray-500">Hubungi Kami</p>
                        </a>
                    </div>
                </section>

                {{-- TESTIMONIAL/QUOTE --}}
                <section class="mb-24 bg-gradient-to-r from-blue-900 to-blue-800 rounded-2xl p-12 text-white" data-aos="fade-up">
                    <div class="text-center">
                        <i class="fas fa-quote-left text-4xl text-blue-300 mb-6"></i>
                        <h2 class="text-2xl font-bold mb-4">Komitmen Pelayanan</h2>
                        <p class="text-xl mb-8 max-w-3xl mx-auto leading-relaxed">
                            "Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera."
                        </p>
                        <div class="flex items-center justify-center gap-2">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                        <p class="text-blue-200 mt-4">- Pemerintah Kelurahan Sungai Lekop -</p>
                    </div>
                </section>

            </div>
        </div>
    </main>

    @include('frontend.layouts.footer')

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Init AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Header Effect Scroll
        const header = document.querySelector(".modern-header");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) header.classList.add("scrolled");
            else header.classList.remove("scrolled");
        });

        // --- SLIDESHOW LOGIC ---
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');

        function changeSlide() {
            if (slides.length > 0) {
                // Hapus class active dari slide sekarang
                slides[currentSlide].classList.remove('active');

                // Pindah index ke slide selanjutnya (looping)
                currentSlide = (currentSlide + 1) % slides.length;

                // Tambah class active ke slide baru
                slides[currentSlide].classList.add('active');
            }
        }

        // Pastikan slide jalan setelah halaman siap
        document.addEventListener("DOMContentLoaded", () => {
            setInterval(changeSlide, 5000); // 5000ms = 5 detik
        });

        // Tabs Logic (News & Stats)
        function setupTabs(btnClass, contentClass) {
            const tabs = document.querySelectorAll(btnClass);
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Cari parent section agar tab lain di halaman tidak terganggu
                    const parent = tab.closest('.bg-white') || document;

                    // Reset semua tab di section ini
                    parent.querySelectorAll(btnClass).forEach(t => {
                        t.classList.remove('active', 'bg-blue-100', 'text-blue-900');
                        if (t.classList.contains('stat-tab')) t.classList.remove('bg-gray-100');
                    });
                    parent.querySelectorAll(contentClass).forEach(c => c.style.display = 'none'); // Force hide

                    // Aktifkan tab yg diklik
                    tab.classList.add('active');
                    if (tab.classList.contains('stat-tab')) tab.classList.add('bg-blue-100', 'text-blue-900');

                    // Munculkan konten
                    const targetId = tab.dataset.tab;
                    const targetContent = parent.querySelector('#' + targetId) || parent.querySelector('#' + targetId + '-tab');
                    if (targetContent) {
                        targetContent.style.display = 'block';
                        targetContent.classList.add('active');
                    }
                });
            });
        }
        setupTabs('.news-tab-btn', '.news-tab-content');
        setupTabs('.stat-tab', '.stat-tab-content');

        // Init style awal tab
        document.querySelectorAll('.stat-tab.active').forEach(t => t.classList.add('bg-blue-100', 'text-blue-900'));

        // Charts Config
        const commonOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        };

        // Render Chart jika elemen ada
        const genderCtx = document.getElementById('genderChart');
        if (genderCtx) {
            new Chart(genderCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        data: [55, 45],
                        backgroundColor: ['#1e3a8a', '#FACC15'],
                        borderWidth: 0
                    }]
                },
                options: commonOptions
            });
        }

        const ageCtx = document.getElementById('ageChart');
        if (ageCtx) {
            new Chart(ageCtx, {
                type: 'bar',
                data: {
                    labels: ['0-17', '18-35', '36-60', '>60'],
                    datasets: [{
                        label: 'Populasi',
                        data: [1500, 3500, 2000, 800],
                        backgroundColor: '#2563eb',
                        borderRadius: 4
                    }]
                },
                options: commonOptions
            });
        }
    </script>
</body>

</html>