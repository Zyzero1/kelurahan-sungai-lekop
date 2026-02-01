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
            padding: 2.5rem;
            border: 1px solid #f1f5f9;
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .service-card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
            transform: translateY(-8px);
            border-color: var(--primary-500);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary-600);
            transition: 0.3s;
        }

        .service-card:hover .card-icon {
            transform: scale(1.1) translateX(25px);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.75rem;
        }

        .card-description {
            color: #6b7280;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .card-link {
            color: var(--primary-600);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            margin-top: auto;
        }

        /* --- MODAL STYLES --- */
        .service-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(4px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .service-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .service-modal-container {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 700px;
            max-height: 85vh;
            display: flex;
            flex-direction: column;
            transform: translateY(20px);
            transition: 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .service-modal-overlay.active .service-modal-container {
            transform: translateY(0);
        }

        .service-modal-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8fafc;
            border-radius: 20px 20px 0 0;
        }

        .service-modal-body {
            padding: 2rem;
            overflow-y: auto;
        }

        .modal-tab-btn {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: #64748b;
            border-bottom: 2px solid transparent;
            transition: 0.3s;
            cursor: pointer;
            border: none;
            background: none;
        }

        .modal-tab-btn.active {
            color: var(--primary-600);
            border-bottom-color: var(--primary-600);
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .tab-content.active {
            display: block;
        }

        /* Timeline for Alur */
        .timeline {
            position: relative;
            padding-left: 2rem;
            border-left: 2px solid #e2e8f0;
            margin-left: 0.5rem;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .timeline-dot {
            position: absolute;
            left: -2.45rem;
            top: 0.25rem;
            width: 14px;
            height: 14px;
            background: var(--primary-500);
            border-radius: 50%;
            border: 3px solid white;
        }

        /* Animations */
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
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
                <a href="{{ $homeContent->social_facebook ?? '#' }}" class="social-btn group"><i class="fab fa-facebook-f text-lg"></i></a>
                <a href="{{ $homeContent->social_instagram ?? '#' }}" class="social-btn group"><i class="fab fa-instagram text-lg"></i></a>
                <a href="{{ $homeContent->social_youtube ?? '#' }}" class="social-btn group"><i class="fab fa-youtube text-lg"></i></a>
            </div>

            {{-- Gambar lokal untuk hero slide --}}
            <div class="hero-slide active">
                @if(!empty($homeContent->hero_banner_image_1))
                <img src="{{ asset('uploads/hero/'.$homeContent->hero_banner_image_1) }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                @else
                <img src="{{ asset('images/kantor.png') }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
            </div>
            <div class="hero-slide">
                @if(!empty($homeContent->hero_banner_image_2))
                <img src="{{ asset('uploads/hero/'.$homeContent->hero_banner_image_2) }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                @else
                <img src="{{ asset('images/kantor-sungailekop.JPG') }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
            </div>
            <div class="hero-slide">
                @if(!empty($homeContent->hero_banner_image_3))
                <img src="{{ asset('uploads/hero/'.$homeContent->hero_banner_image_3) }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                @else
                <img src="{{ asset('images/kantor.png') }}" alt="Kantor Kelurahan Sungai Lekop" class="w-full h-full object-cover" style="object-position: center;">
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
            </div>

            {{-- 3. KONTEN TENGAH --}}
            <div class="hero-content animate-fade-in">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold mb-6 drop-shadow-lg leading-tight">
                    {{ $homeContent->hero_title ?? 'Selamat Datang di Kelurahan Sungai Lekop' }}
                </h1>

                <p class="text-base md:text-xl mb-8 text-gray-200 font-light max-w-2xl mx-auto drop-shadow-md">
                    {{ $homeContent->hero_subtitle ?? 'Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center w-full">
                    <a href="#berita-utama" class="btn-cta-blue flex items-center justify-center">
                        <i class="fas fa-newspaper mr-2"></i> Berita Utama
                    </a>
                    <a href="#layanan-publik" class="btn-cta-glass flex items-center justify-center">
                        <i class="fas fa-concierge-bell mr-2"></i> Layanan Publik
                    </a>
                </div>

                {{-- Sosmed Mobile (Horizontal di bawah tombol) --}}
                <div class="flex md:hidden gap-4 mt-8 justify-center">
                    <a href="{{ $homeContent->social_facebook ?? '#' }}" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $homeContent->social_instagram ?? '#' }}" class="social-btn"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $homeContent->social_youtube ?? '#' }}" class="social-btn"><i class="fab fa-youtube"></i></a>
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
                                {{ $homeContent->profil_tentang ?? 'Kelurahan Sungai Lekop adalah salah satu kelurahan yang terletak di Kecamatan Bintan Timur, Kabupaten Bintan. Kami berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat dalam berbagai aspek administrasi dan pembangunan.' }}
                            </p>
                            <div class="space-y-2">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-map-marker-alt text-red-500"></i>
                                    <span class="text-gray-700">{{ $homeContent->profil_alamat ?? 'Jl. Korindo Km. 22 No. 1A, Sungai Lekop' }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-blue-500"></i>
                                    <span class="text-gray-700">{{ $homeContent->profil_email ?? 'kelurahan@sungailekop.id' }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fab fa-instagram text-purple-500"></i>
                                    <span class="text-gray-700">{{ $homeContent->profil_instagram ?? '@Kelurahansungailekop' }}</span>
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
                                    "{{ $homeContent->profil_visi ?? 'Terwujudnya Kelurahan Sungai Lekop yang maju, mandiri, dan sejahtera berbasis pelayanan prima.' }}"
                                </p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-yellow-300 mb-2">Misi</h4>
                                <ul class="space-y-2 text-blue-100 text-sm">
                                    @php
                                    $misiItems = $homeContent->profil_misi ?? "• Memberikan pelayanan administrasi yang cepat dan transparan\n• Meningkatkan partisipasi masyarakat dalam pembangunan\n• Menjaga kebersihan dan keindahan lingkungan";
                                    $misiArray = explode("\n", $misiItems);
                                    @endphp
                                    @foreach($misiArray as $misi)
                                    @if(trim($misi))
                                    <li class="flex gap-2">
                                        <i class="fas fa-check-circle text-green-400 mt-0.5"></i>
                                        <span>{{ trim($misi, '• ') }}</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- STATISTIK --}}
                <section id="statistik" class="mb-24" data-aos="fade-up">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="stat-card group">
                            <div class="stat-number">{{ number_format($homeContent->statistik_penduduk ?? 15203, 0, ',', '.') }}</div>
                            <div class="text-gray-500 font-medium">Total Penduduk</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-users text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                        <div class="stat-card group">
                            <div class="stat-number">{{ $homeContent->statistik_rt ?? 32 }}</div>
                            <div class="text-gray-500 font-medium">Jumlah RT</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-home text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                        <div class="stat-card group">
                            <div class="stat-number">{{ $homeContent->statistik_rw ?? 9 }}</div>
                            <div class="text-gray-500 font-medium">Jumlah RW</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-map-marked-alt text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                        <div class="stat-card group">
                            <div class="stat-number">{{ $homeContent->statistik_layanan ?? 12 }}</div>
                            <div class="text-gray-500 font-medium">Layanan Publik</div>
                            <div class="absolute bottom-4 right-4 text-gray-100 group-hover:text-blue-900 transition-colors">
                                <i class="fas fa-hand-holding-heart text-4xl opacity-30 group-hover:opacity-100"></i>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- JELAJAH LEKOP --}}
                <section id="berita-utama" class="mb-24" data-aos="fade-up">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                                <i class="fas fa-newspaper text-blue-800 mr-2"></i> {{ $homeContent->berita_title ?? 'Berita Utama' }}
                            </h2>
                        </div>
                        <a href="{{ route('berita') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                            {{ $homeContent->berita_link_text ?? 'Lihat Semua' }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {{-- Berita Besar Kiri --}}
                        <div class="lg:col-span-2">
                            <div class="relative rounded-2xl overflow-hidden shadow-lg h-[450px] group cursor-pointer">
                                <img src="{{ $homeContent->berita_featured_image ?? 'https://images.unsplash.com/photo-1590402494587-44b71d87e3f6?q=80&w=1280' }}" alt="News" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-8 text-white">
                                    <span class="bg-blue-600 text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block">{{ $homeContent->berita_featured_label ?? 'TERBARU' }}</span>
                                    <h3 class="text-2xl md:text-3xl font-bold mb-2 leading-tight">{{ $homeContent->berita_featured_title ?? 'Kegiatan Gotong Royong Massal di Lingkungan RW 02' }}</h3>
                                    <p class="text-gray-300 text-sm line-clamp-2 mt-2">{{ $homeContent->berita_featured_desc ?? 'Masyarakat Kelurahan Sungai Lekop antusias mengikuti kegiatan bersih-bersih lingkungan demi kenyamanan bersama.' }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- List Berita Kanan --}}
                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 h-full">
                                <div class="flex border-b mb-4">
                                    <button class="news-tab-btn active mr-4" data-tab="terkini">{{ $homeContent->berita_tab_terkini ?? 'Terkini' }}</button>
                                    <button class="news-tab-btn" data-tab="populer">{{ $homeContent->berita_tab_populer ?? 'Populer' }}</button>
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

                {{-- LAYANAN PUBLIK --}}
                <section id="layanan-publik" class="mb-24" data-aos="fade-up">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800">
                            <i class="fas fa-handshake text-blue-800 mr-2"></i> {{ $homeContent->layanan_publik_title ?? 'Layanan Publik' }}
                        </h2>
                        <p class="text-gray-600 mt-2">{{ $homeContent->layanan_publik_desc ?? 'Informasi persyaratan dan alur pengurusan administrasi kependudukan' }}</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @if($homeContent->layanan_kk_baru ?? true)
                        <div class="service-card" onclick="openServiceModal('kk_baru')">
                            <div class="card-icon"><i class="fas fa-users-cog"></i></div>
                            <h3 class="card-title">Pembuatan KK Baru</h3>
                            <p class="card-description">Pengurusan Kartu Keluarga baru baik karena pindah datang maupun pembuatan awal.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_nikah ?? true)
                        <div class="service-card" onclick="openServiceModal('nikah')">
                            <div class="card-icon"><i class="fas fa-heart"></i></div>
                            <h3 class="card-title">Surat Pengantar Nikah</h3>
                            <p class="card-description">Layanan administrasi pengantar nikah untuk kelengkapan berkas ke KUA.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_akte_lahir ?? true)
                        <div class="service-card" onclick="openServiceModal('akte_lahir')">
                            <div class="card-icon"><i class="fas fa-baby"></i></div>
                            <h3 class="card-title">Akte Kelahiran</h3>
                            <p class="card-description">Layanan pembuatan akte kelahiran bagi bayi yang baru lahir di wilayah Sungai Lekop.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_akte_mati ?? true)
                        <div class="service-card" onclick="openServiceModal('akte_mati')">
                            <div class="card-icon"><i class="fas fa-book-dead"></i></div>
                            <h3 class="card-title">Akte Kematian</h3>
                            <p class="card-description">Layanan pelaporan dan pembuatan akte kematian bagi warga yang meninggal dunia.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_uang_duka ?? true)
                        <div class="service-card" onclick="openServiceModal('uang_duka')">
                            <div class="card-icon"><i class="fas fa-hand-holding-usd"></i></div>
                            <h3 class="card-title">Santunan Uang Duka</h3>
                            <p class="card-description">Layanan pengurusan santunan kematian/uang duka bagi ahli waris yang berhak.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_tambah_anak ?? true)
                        <div class="service-card" onclick="openServiceModal('tambah_anak')">
                            <div class="card-icon"><i class="fas fa-user-plus"></i></div>
                            <h3 class="card-title">Penambahan Anak (KK)</h3>
                            <p class="card-description">Update data Kartu Keluarga untuk penambahan anggota keluarga baru (anak).</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_sktm ?? true)
                        <div class="service-card" onclick="openServiceModal('sktm')">
                            <div class="card-icon"><i class="fas fa-file-invoice"></i></div>
                            <h3 class="card-title">SKTM & Belum Menikah</h3>
                            <p class="card-description">Surat keterangan tidak mampu, belum memiliki rumah, atau status belum menikah.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_bpjs ?? true)
                        <div class="service-card" onclick="openServiceModal('bpjs')">
                            <div class="card-icon"><i class="fas fa-notes-medical"></i></div>
                            <h3 class="card-title">Surat Pengantar BPJS</h3>
                            <p class="card-description">Layanan surat pengantar untuk pendaftaran atau pengurusan BPJS Kesehatan.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif

                        @if($homeContent->layanan_sku ?? true)
                        <div class="service-card" onclick="openServiceModal('sku')">
                            <div class="card-icon"><i class="fas fa-store"></i></div>
                            <h3 class="card-title">Surat Keterangan Usaha</h3>
                            <p class="card-description">Layanan pembuatan surat keterangan usaha (SKU) untuk keperluan permodalan/izin.</p>
                            <span class="card-link">Lihat Persyaratan <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                        @endif
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
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-blue-600 text-2xl group-hover:bg-blue-600 group-hover:text-white transition"><i class="fas fa-industry"></i></div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $homeContent->jelajah_wisata_title ?? 'Sentra Industri' }}</h3>
                            <p class="text-gray-500 text-sm mb-6">{{ $homeContent->jelajah_wisata_desc ?? 'Pusat produksi kerupuk ikan terbesar di Bintan dengan produk unggulan khas Sungai Lekop.' }}</p>
                            <a href="{{ route('layanan') }}#sentra-industri" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Jelajahi Industri <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                        <div class="service-card group">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-blue-600 text-2xl group-hover:bg-blue-600 group-hover:text-white transition"><i class="fas fa-building"></i></div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $homeContent->jelajah_fasilitas_title ?? 'Sudut Unik & Fasilitas' }}</h3>
                            <p class="text-gray-500 text-sm mb-6">{{ $homeContent->jelajah_fasilitas_desc ?? 'Mengenal lebih dekat infrastruktur dan kehidupan sosial di Sungai Lekop.' }}</p>
                            <a href="{{ route('layanan') }}#sudut-unik-fasilitas" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Jelajahi Fasilitas <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                        <div class="service-card group">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-blue-600 text-2xl group-hover:bg-blue-600 group-hover:text-white transition"><i class="fas fa-store"></i></div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $homeContent->jelajah_umkm_title ?? 'UMKM Lokal' }}</h3>
                            <p class="text-gray-500 text-sm mb-6">{{ $homeContent->jelajah_umkm_desc ?? 'Dukung dan kenalkan produk Usaha Mikro Kecil Menengah khas Sungai Lekop.' }}</p>
                            <a href="{{ route('layanan') }}#umkm-lokal" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Jelajahi UMKM <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </section>

                {{-- GALERI --}}
                <section class="mb-24" data-aos="fade-up">
                    <div class="flex justify-between items-end mb-8">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800"><i class="fas fa-images text-blue-800 mr-2"></i> Galeri Kegiatan</h2>
                        <a href="{{ route('layanan') }}#galeri-kegiatan" class="px-5 py-2 rounded-full border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white transition text-sm font-medium">Lihat Semua</a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        {{-- Item Galeri 1 - Pemerintahan --}}
                        <div class="gallery-item pemerintahan relative h-64 rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954074_bcd67607ce3600415d76.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white font-bold">
                                <div class="text-center">
                                    <i class="fas fa-users text-2xl mb-2"></i>
                                    <p>Rapat Desa</p>
                                </div>
                            </div>
                        </div>
                        {{-- Item Galeri 2 - Kemasyarakatan --}}
                        <div class="gallery-item kemasyarakatan relative h-64 rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954005_f747783895551781b02e.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white font-bold">
                                <div class="text-center">
                                    <i class="fas fa-hands-helping text-2xl mb-2"></i>
                                    <p>Gotong Royong</p>
                                </div>
                            </div>
                        </div>
                        {{-- Item Galeri 3 - Pembangunan --}}
                        <div class="gallery-item pembangunan relative h-64 rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://placehold.co/600x400/f59e0b/FFFFFF?text=Jalan+Desa" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white font-bold">
                                <div class="text-center">
                                    <i class="fas fa-road text-2xl mb-2"></i>
                                    <p>Pembangunan Jalan</p>
                                </div>
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
                            "{{ $homeContent->testimonial_text ?? 'Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera.' }}"
                        </p>
                        <div class="flex items-center justify-center gap-2">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                        <p class="text-blue-200 mt-4">- {{ $homeContent->testimonial_author ?? 'Pemerintah Kelurahan Sungai Lekop' }} -</p>
                    </div>
                </section>

            </div>
        </div>
    </main>

    @include('frontend.layouts.footer')

    {{-- MODAL LAYANAN PUBLIK --}}
    <div id="serviceModal" class="service-modal-overlay">
        <div class="service-modal-container">
            <div class="service-modal-header">
                <h3 class="text-xl font-bold text-blue-900 flex items-center">
                    <i id="modalIcon" class="fas fa-file-alt mr-3 text-blue-600"></i>
                    <span id="modalTitle">Detail Layanan</span>
                </h3>
                <button onclick="closeServiceModal()" class="text-gray-400 hover:text-red-500 transition">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <div class="flex border-b bg-gray-50 px-8">
                <button class="modal-tab-btn active" onclick="switchModalTab(event, 'tabSyarat')">Persyaratan</button>
                <button class="modal-tab-btn" onclick="switchModalTab(event, 'tabAlur')">Alur Proses</button>
            </div>

            <div class="service-modal-body">
                <div id="tabSyarat" class="tab-content active">
                    <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-clipboard-check mr-2 text-green-600"></i> Berkas yang Dibutuhkan:
                    </h4>
                    <ul id="syaratList" class="space-y-3 text-gray-600">
                    </ul>
                </div>

                <div id="tabAlur" class="tab-content">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <h5 class="font-bold text-gray-800">Langkah 1: Persiapan Berkas</h5>
                            <p class="text-sm text-gray-500">Lengkapi seluruh dokumen persyaratan sesuai daftar dan masukkan ke dalam Map.</p>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <h5 class="font-bold text-gray-800">Langkah 2: Penyerahan ke Loket</h5>
                            <p class="text-sm text-gray-500">Datang ke Kantor Kelurahan Sungai Lekop pada jam kerja (Senin-Jumat) untuk verifikasi berkas.</p>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <h5 class="font-bold text-gray-800">Langkah 3: Pemrosesan & Validasi</h5>
                            <p class="text-sm text-gray-500">Petugas memproses permohonan dan melakukan validasi data oleh pejabat berwenang.</p>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <h5 class="font-bold text-gray-800">Langkah 4: Pengambilan Dokumen</h5>
                            <p class="text-sm text-gray-500">Warga menerima dokumen atau surat keterangan yang telah selesai diproses.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 border-t bg-gray-50 flex justify-end rounded-b-[20px]">
                <button onclick="closeServiceModal()" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-[20px] font-bold text-gray-700 transition">
                    Tutup
                </button>
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

            // Create thumbnails
            viewerThumbnailsContainer.innerHTML = '';
            album.images.forEach((image, index) => {
                const thumb = document.createElement('div');
                thumb.className = `viewer-thumbnail relative w-full h-20 rounded-lg overflow-hidden cursor-pointer transition-all duration-300 border-2 ${index === 0 ? 'border-white' : 'border-transparent'} hover:border-white`;
                thumb.dataset.index = index;
                thumb.innerHTML = `<img src="${image.src}" alt="${image.caption}" class="w-full h-full object-cover">`;
                viewerThumbnailsContainer.appendChild(thumb);
            });

            viewerModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            updateGalleryView();
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

                // Update thumbnails
                const thumbnails = viewerThumbnailsContainer.querySelectorAll('.viewer-thumbnail');
                thumbnails.forEach(thumb => {
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
            };
            tempImg.onerror = function() {
                viewerLoader.classList.add('hidden');
                console.error("Failed to load image:", image.src);
            };
            tempImg.src = image.src;
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

        // DATA LAYANAN PUBLIK
        const serviceData = {
            'kk_baru': {
                title: 'Pembuatan KK Baru',
                icon: 'fa-users-cog',
                syarat: ['Mengisi Formulir F1.01', 'Surat Pindah Datang/Draft KK', 'Fotocopy KTP Sekeluarga', 'Fotocopy Ijazah', 'Fotocopy Akte Kelahiran', 'Fotocopy Buku Nikah', 'Masing-masing berkas di Fotokopi rangkap 2', 'Wajib Gunakan Map']
            },
            'nikah': {
                title: 'Surat Pengantar Nikah',
                icon: 'fa-heart',
                syarat: ['Pengantar RT RW', 'Foto Uk. 2x3 Latar biru (2 lembar)', 'Fotocopy KTP Catin Pria & Wanita', 'Fotocopy KK Catin Pria & Wanita', 'Fotocopy Akte Kelahiran Ybs', 'Fotocopy Ijazah Terakhir Ybs', 'Masing-masing berkas di fotokopi rangkap 1', 'Wajib Gunakan Map']
            },
            'akte_lahir': {
                title: 'Akte Kelahiran',
                icon: 'fa-baby',
                syarat: ['Form F-2.01', 'Form F-1.06', 'Fotocopy KK dan KTP Ortu', 'Fotocopy KTP Saksi 2 Orang', 'Fotocopy Surat Bidan', 'Fotocopy Surat Nikah', 'Berkas di Fotokopi rangkap', 'Wajib Gunakan Map']
            },
            'akte_mati': {
                title: 'Akte Kematian',
                icon: 'fa-book-dead',
                syarat: ['Pengantar RT RW', 'Form F2.01', 'Surat kematian dari RS (Bila Meninggal di RS)', 'Fotocopy KK dan KTP ybs', 'Fotocopy KTP Pelapor', 'Fotocopy KTP Saksi 2 Orang', 'Wajib Gunakan Map']
            },
            'uang_duka': {
                title: 'Santunan Uang Duka',
                icon: 'fa-hand-holding-usd',
                syarat: ['KTP Asli Almarhum', 'Fotocopy KK Sebelum Penghapusan', 'Fotocopy KK Setelah Penghapusan', 'Fotocopy KK dan KTP Ahli Waris', 'SPTJM & SKTM dari Kelurahan', 'Surat Kematian & Ahli Waris dari Kelurahan', 'Akte Kematian', 'Berkas di Fotokopi Rangkap 2', 'Wajib Gunakan Map']
            },
            'tambah_anak': {
                title: 'Penambahan Anak (KK)',
                icon: 'fa-user-plus',
                syarat: ['Form F1.06', 'Surat Lahir', 'Surat Nikah', 'Fotocopy Kartu Keluarga', 'Fotocopy KTP', 'Wajib Gunakan Map']
            },
            'sktm': {
                title: 'SKTM / Belum Rumah / Belum Menikah',
                icon: 'fa-file-invoice',
                syarat: ['Surat Pengantar', 'Fotocopy Kartu Keluarga', 'Fotocopy KTP', 'Wajib Gunakan Map']
            },
            'bpjs': {
                title: 'Surat Pengantar BPJS',
                icon: 'fa-notes-medical',
                syarat: ['Surat Pengantar', 'Surat Pernyataan Penghasilan', 'Fotocopy KK', 'Fotocopy KTP', 'Wajib Gunakan Map']
            },
            'sku': {
                title: 'Surat Keterangan Usaha (SKU)',
                icon: 'fa-store',
                syarat: ['Surat Pengantar', 'Fotocopy Kartu Keluarga', 'Fotocopy KTP', 'Foto Usaha', 'Wajib Gunakan Map']
            }
        };

        // Modal Logic
        function openServiceModal(key) {
            const data = serviceData[key];
            document.getElementById('modalTitle').innerText = data.title;
            document.getElementById('modalIcon').className = `fas ${data.icon} mr-3 text-blue-600`;

            const list = document.getElementById('syaratList');
            list.innerHTML = data.syarat.map(item => `
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-500 mt-1 mr-3"></i>
                    <span>${item}</span>
                </li>
            `).join('');

            document.getElementById('serviceModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeServiceModal() {
            document.getElementById('serviceModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function switchModalTab(event, tabId) {
            const container = event.target.closest('.service-modal-container');
            container.querySelectorAll('.modal-tab-btn').forEach(b => b.classList.remove('active'));
            container.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

            event.target.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        // Close on ESC
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeServiceModal();
        });
    </script>
</body>

</html>