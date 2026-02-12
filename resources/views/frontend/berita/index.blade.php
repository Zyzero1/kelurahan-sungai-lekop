<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - Kelurahan Sungai Lekop</title>

    {{-- Library Pihak Ketiga --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --primary-900: #1e3a8a;
            --primary-600: #2563eb;
            --primary-gradient: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 120px;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: #f8fafc;
        }

        /* Header Asli (JANGAN DIUBAH) */
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

        /* --- END HEADER ASLI --- */

        /* --- STYLES DARI NEWS.HTML --- */

        /* Hero Effects */
        .hero-gradient-overlay {
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 100%);
        }

        .vignette-effect {
            background: radial-gradient(ellipse at center, transparent 0%, transparent 50%, rgba(0, 0, 0, 0.4) 100%);
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .fade-to-white-smooth {
            background: linear-gradient(to top, rgba(248, 250, 252, 1) 0%, transparent 100%);
        }

        /* Slide Animation */
        .news-hero-slide {
            opacity: 0;
            transition: opacity 1s cubic-bezier(0.83, 0, 0.17, 1);
            visibility: hidden;
            position: absolute;
            inset: 0;
        }

        .news-hero-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 20;
        }

        /* Card Styles */
        .news-card {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .news-card-img {
            transition: transform 0.7s ease;
        }

        .news-card:hover .news-card-img {
            transform: scale(1.05);
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Pagination & Search */
        .category-filter.active {
            background-color: #2563eb;
            /* blue-600 */
            color: white;
            border-color: #1d4ed8;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* News Card Styles from news.html */
        .news-card-img-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .news-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-card-img {
            transform: scale(1.05);
        }

        .news-card-category {
            position: absolute;
            top: 16px;
            left: 16px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .news-card-body {
            padding: 20px;
        }

        .news-card-date {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .news-card-date i {
            margin-right: 6px;
        }

        .news-card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .news-card-excerpt {
            color: #4b5563;
            margin-bottom: 16px;
            font-size: 14px;
            line-height: 1.6;
        }

        .news-card-link {
            display: inline-flex;
            align-items: center;
            color: #2563eb;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s;
        }

        .news-card-link i {
            margin-left: 6px;
            transition: transform 0.3s;
        }

        .news-card-link:hover {
            color: #1d4ed8;
        }

        .news-card-link:hover i {
            transform: translateX(4px);
        }
    </style>
</head>

<body class="font-sans antialiased text-slate-800">

    {{-- Memanggil Navigasi (Sama persis dengan profil) --}}
    @include('frontend.layouts.navigation')

    <main class="bg-gray-50 min-h-screen">

        {{-- SECTION 1: HERO CAROUSEL (Design from news.html) --}}
        <section class="news-hero-banner relative overflow-hidden h-[65vh] min-h-[550px] bg-slate-900">

            {{-- Background Animations --}}
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -left-40 w-80 h-80 bg-blue-600/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-40 -right-40 w-80 h-80 bg-purple-600/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s"></div>
            </div>

            <div id="news-hero-slides" class="h-full relative z-20">
                {{-- Loop Berita untuk Slider --}}
                @foreach($beritas->take(3) as $index => $slider)
                <div class="news-hero-slide {{ $index == 0 ? 'active' : '' }} h-full w-full absolute inset-0"
                    data-index="{{ $index }}">

                    {{-- Background Image --}}
                    <div class="absolute inset-0 overflow-hidden">
                        @if($slider->gambar)
                        <img src="{{ asset('uploads/berita/'.$slider->gambar) }}"
                            class="w-full h-full object-cover object-center scale-105 transition-transform duration-[8000ms] ease-linear"
                            alt="{{ $slider->judul }}">
                        @else
                        <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                            <i class="fas fa-image text-6xl text-gray-600"></i>
                        </div>
                        @endif

                        {{-- Overlays --}}
                        <div class="absolute inset-0 z-10 hero-gradient-overlay"></div>
                        <div class="absolute inset-0 z-15 vignette-effect"></div>
                        <div class="absolute bottom-0 left-0 right-0 h-2/5 z-20 fade-to-white-smooth"></div>
                    </div>

                    {{-- Content Text --}}
                    <div class="news-hero-content w-full h-full flex items-end relative z-30 px-6 pb-20 md:pb-24">
                        <div class="container mx-auto">
                            <div class="max-w-4xl">
                                <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                                    <span class="inline-flex items-center bg-blue-600/90 text-white px-3 py-1 rounded-full text-xs font-semibold border border-white/20 glass-effect">
                                        <i class="fas fa-newspaper mr-2"></i>
                                        BERITA
                                    </span>
                                </div>

                                <h1 class="text-3xl md:text-5xl font-bold mb-6 text-white leading-tight"
                                    style="text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6), 0 4px 8px rgba(0, 0, 0, 0.4);"
                                    data-aos="fade-up" data-aos-delay="200">
                                    {{ $slider->judul }}
                                </h1>

                                <div class="flex flex-wrap gap-4 text-sm text-gray-200 mb-8" data-aos="fade-up" data-aos-delay="300">
                                    <div class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        <span>{{ \Carbon\Carbon::parse($slider->created_at)->isoFormat('D MMMM Y') }}</span>
                                    </div>
                                    <div class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                                        <i class="far fa-user mr-2"></i>
                                        <span>Admin Kelurahan</span>
                                    </div>
                                </div>

                                <div class="mt-10" data-aos="fade-up" data-aos-delay="400">
                                    <a href="{{ route('berita.show', $slider->slug) }}"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group border border-white/20">
                                        <span>Baca Selengkapnya</span>
                                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Social Media Vertical (Optional: Menjaga layout hero tetap seimbang) --}}
            <div class="absolute left-6 top-1/2 -translate-y-1/2 z-30 flex-col space-y-4 hidden md:flex" data-aos="fade-right">
                <a href="#" class="group w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all border border-white/20">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="group w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white hover:bg-sky-500 hover:scale-110 transition-all border border-white/20">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="group w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white hover:bg-pink-600 hover:scale-110 transition-all border border-white/20">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

            {{-- Navigation Controls --}}
            <div class="absolute bottom-10 right-10 z-30 hidden md:flex items-center gap-4" data-aos="fade-up" data-aos-delay="500">
                <button id="hero-prev" class="w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md flex items-center justify-center text-white border border-white/20 transition-all hover:scale-105">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="flex space-x-2">
                    @foreach($beritas->take(3) as $index => $dot)
                    <button class="w-2.5 h-2.5 rounded-full dot-indicator transition-all duration-300 {{ $index == 0 ? 'bg-white w-6' : 'bg-white/40 hover:bg-white/70' }}" data-slide="{{ $index }}"></button>
                    @endforeach
                </div>
                <button id="hero-next" class="w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md flex items-center justify-center text-white border border-white/20 transition-all hover:scale-105">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </section>

        {{-- SECTION 2: ALL NEWS & FILTER (Design from news.html) --}}
        <section id="all-news" class="py-12 md:py-16 relative -mt-10 z-30">
            <div class="container mx-auto px-6">

                {{-- Header Section --}}
                <div class="text-center mb-16 relative z-10" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Semua Berita</h2>
                    <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">
                        Ikuti informasi dan kegiatan terkini di lingkungan Kelurahan.
                    </p>
                </div>

                {{-- Search & Filter Bar --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 pb-4 mb-8" data-aos="fade-up" data-aos-delay="200">
                    {{-- Filter Kategori --}}
                    <div class="flex overflow-x-auto gap-2 w-full md:w-auto pb-2 md:pb-0 hide-scrollbar">
                        <button class="category-filter active px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200 transition-all hover:shadow-md" data-filter="all">
                            SEMUA
                        </button>
                        <button class="category-filter px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200 transition-all hover:shadow-md" data-filter="pemerintahan">
                            PEMERINTAHAN
                        </button>
                        <button class="category-filter px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200 transition-all hover:shadow-md" data-filter="kegiatan">
                            KEGIATAN
                        </button>
                    </div>

                    {{-- Search Input --}}
                    <div class="w-full md:w-80">
                        <div class="relative">
                            <input type="text" id="news-search" placeholder="Cari judul berita..."
                                class="pl-10 pr-4 py-2.5 w-full rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 shadow-sm">
                            <i class="fas fa-search absolute left-3.5 top-3.5 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                {{-- News Grid --}}
                @if($beritas->count() > 0)
                <div id="news-grid" class="news-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
                    @foreach($beritas as $index => $berita)
                    <div class="news-card group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2"
                        data-title="{{ strtolower($berita->judul) }}"
                        data-category="{{ $berita->kategori ?? 'berita' }}"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">

                        {{-- Image Container --}}
                        <div class="news-card-img-container relative h-48 overflow-hidden">
                            @if($berita->gambar)
                            <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                                alt="{{ $berita->judul }}"
                                class="news-card-img w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-newspaper text-4xl text-gray-400"></i>
                            </div>
                            @endif

                            {{-- Category Badge --}}
                            <span class="news-card-category absolute top-4 left-4">
                                <i class="fas fa-newspaper mr-1"></i>
                                {{ strtoupper($berita->kategori ?? 'BERITA') }}
                            </span>
                        </div>

                        {{-- Card Body --}}
                        <div class="news-card-body p-5">
                            <div class="news-card-date text-sm text-gray-500 mb-2">
                                <i class="far fa-calendar-alt mr-2"></i>
                                {{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y') }}
                            </div>

                            <h3 class="news-card-title text-lg font-bold mb-3 leading-tight">
                                <a href="{{ route('berita.show', $berita->slug) }}" class="text-gray-900 hover:text-blue-600 transition-colors">
                                    {{ $berita->judul }}
                                </a>
                            </h3>

                            <p class="news-card-excerpt text-gray-600 text-sm mb-4 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 80) }}
                            </p>

                            <a href="{{ route('berita.show', $berita->slug) }}"
                                class="news-card-link inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-800 transition-colors">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination Laravel --}}
                <div class="mt-16 flex justify-center" data-aos="fade-up">
                    <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-2 shadow-2xl border border-gray-200/50">
                        {{ $beritas->links() }}
                    </div>
                </div>

                @else
                <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="text-gray-300 mb-4">
                        <i class="far fa-folder-open text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Belum ada berita</h3>
                    <p class="text-gray-500">Berita terbaru akan segera diupdate.</p>
                </div>
                @endif

            </div>
        </section>

        {{-- SECTION 3: SOROTAN BERITA (DIHAPUS SESUAI PERMINTAAN) --}}

    </main>

    {{-- Memanggil Footer secara eksplisit --}}
    @include('frontend.layouts.footer')

    {{-- Script Khusus Halaman Ini --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // Header Scroll Effect
        const header = document.querySelector(".modern-header");
        if (header) {
            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) header.classList.add("scrolled");
                else header.classList.remove("scrolled");
            });
        }

        document.addEventListener("DOMContentLoaded", function() {

            // --- LOGIKA HERO SLIDER ---
            const slides = document.querySelectorAll('.news-hero-slide');
            const dots = document.querySelectorAll('.dot-indicator');
            let currentSlide = 0;
            let slideInterval;

            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => {
                    dot.classList.remove('bg-white', 'w-6');
                    dot.classList.add('bg-white/40');
                });

                if (slides[index]) {
                    slides[index].classList.add('active');
                    dots[index].classList.remove('bg-white/40');
                    dots[index].classList.add('bg-white', 'w-6');
                    currentSlide = index;
                }
            }

            function nextSlide() {
                let next = (currentSlide + 1) % slides.length;
                showSlide(next);
            }

            function prevSlide() {
                let prev = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(prev);
            }

            document.getElementById('hero-next')?.addEventListener('click', () => {
                nextSlide();
                resetInterval();
            });

            document.getElementById('hero-prev')?.addEventListener('click', () => {
                prevSlide();
                resetInterval();
            });

            dots.forEach((dot, idx) => {
                dot.addEventListener('click', () => {
                    showSlide(idx);
                    resetInterval();
                });
            });

            function startInterval() {
                slideInterval = setInterval(nextSlide, 6000);
            }

            function resetInterval() {
                clearInterval(slideInterval);
                startInterval();
            }

            if (slides.length > 0) {
                startInterval();
            }

            // --- LOGIKA PENCARIAN & FILTER ---
            const searchInput = document.getElementById('news-search');
            const newsCards = document.querySelectorAll('.news-card');
            const filterBtns = document.querySelectorAll('.category-filter');

            function filterNews() {
                const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
                const activeBtn = document.querySelector('.category-filter.active');
                const activeCategory = activeBtn ? activeBtn.getAttribute('data-filter') : 'all';

                newsCards.forEach(card => {
                    const title = card.getAttribute('data-title') || '';
                    const category = card.getAttribute('data-category') || 'all';

                    const matchesSearch = title.includes(searchTerm);
                    const matchesCategory = activeCategory === 'all' || category === activeCategory;

                    if (matchesSearch && matchesCategory) {
                        card.style.display = 'block';
                        // Re-trigger animation
                        card.classList.remove('animate-card');
                        void card.offsetWidth;
                        card.classList.add('animate-card');
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            if (searchInput) {
                searchInput.addEventListener('keyup', filterNews);
            }

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => {
                        b.classList.remove('active');
                        b.classList.add('bg-white', 'text-gray-700', 'border-gray-200');
                    });

                    this.classList.remove('bg-white', 'text-gray-700', 'border-gray-200');
                    this.classList.add('active');

                    filterNews();
                });
            });
        });
    </script>
</body>

</html>