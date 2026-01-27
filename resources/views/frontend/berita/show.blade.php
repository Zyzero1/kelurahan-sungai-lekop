<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} | Kelurahan Sungai Lekop</title>

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
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.75) 0%,
                    rgba(0, 0, 0, 0.5) 25%,
                    rgba(0, 0, 0, 0.3) 45%,
                    rgba(0, 0, 0, 0.15) 65%,
                    rgba(0, 0, 0, 0.05) 80%,
                    transparent 95%);
        }

        .fade-to-white-smooth {
            background: linear-gradient(to top,
                    #f8fafc 0%,
                    rgba(248, 250, 252, 0.98) 15%,
                    rgba(248, 250, 252, 0.9) 30%,
                    rgba(248, 250, 252, 0.7) 45%,
                    rgba(248, 250, 252, 0.4) 60%,
                    rgba(248, 250, 252, 0.15) 75%,
                    rgba(248, 250, 252, 0.05) 85%,
                    transparent 100%);
        }

        .vignette-effect {
            background: radial-gradient(ellipse at center bottom,
                    transparent 0%,
                    transparent 50%,
                    rgba(0, 0, 0, 0.1) 75%,
                    rgba(0, 0, 0, 0.25) 100%);
        }

        /* Glass Morphism Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.25);
        }

        /* News Detail Hero Section */
        .news-detail-hero {
            position: relative;
            overflow: hidden;
            height: 70vh;
            min-height: 500px;
            display: flex;
            align-items: center;
        }

        /* Article Content Styles */
        .modern-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border: 1px solid rgba(148, 163, 184, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modern-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .article-content {
            color: #4b5563;
        }

        .article-content h2,
        .article-content h3 {
            color: #1f2937;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        /* Banner Share Button Animation */
        .banner-share-container {
            perspective: 1000px;
        }

        .share-option {
            opacity: 0;
            transform: translateY(10px) rotateY(90deg);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        #banner-share-btn:hover .share-option:nth-child(1) {
            opacity: 1;
            transform: translateY(0) rotateY(0);
            transition-delay: 0.1s;
        }

        #banner-share-btn:hover .share-option:nth-child(2) {
            opacity: 1;
            transform: translateY(0) rotateY(0);
            transition-delay: 0.2s;
        }

        #banner-share-btn:hover .share-option:nth-child(3) {
            opacity: 1;
            transform: translateY(0) rotateY(0);
            transition-delay: 0.3s;
        }

        #banner-share-btn:hover .share-option:nth-child(4) {
            opacity: 1;
            transform: translateY(0) rotateY(0);
            transition-delay: 0.4s;
        }

        /* Footer Styles */
        .main-footer {
            background: var(--primary-900);
            position: relative;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.8);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .main-footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 10% 20%,
                    rgba(30, 58, 138, 0.8) 0%,
                    transparent 50%),
                radial-gradient(circle at 90% 80%,
                    rgba(255, 215, 0, 0.1) 0%,
                    transparent 50%);
            pointer-events: none;
        }

        .footer-links a {
            position: relative;
            padding-bottom: 0.25rem;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #ffd700;
            transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-links a:hover::before {
            width: 100%;
        }

        /* Back to Top Button */
        #back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background-color: var(--primary-600);
            color: white;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        #back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        #back-to-top:hover {
            background-color: var(--primary-700);
            transform: translateY(-0.25rem);
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .news-detail-hero {
                height: 60vh;
            }
        }

        @media (max-width: 768px) {
            .news-detail-hero {
                height: 50vh;
                min-height: 400px;
            }
        }

        @media (max-width: 640px) {
            .news-detail-hero {
                height: 45vh;
                min-height: 350px;
            }
        }
    </style>
</head>

<body class="font-sans antialiased text-slate-800">

    {{-- Memanggil Navigasi (Sama persis dengan profil) --}}
    @include('frontend.layouts.navigation')

    <main
        class="bg-gradient-to-br from-gray-50 via-white to-gray-100 min-h-screen">
        <section class="relative h-[500px] overflow-hidden">
            <div class="absolute inset-0">
                <div class="relative w-full h-full overflow-hidden">
                    <div class="absolute inset-0 z-10 hero-gradient-overlay"></div>
                    <div class="absolute inset-0 z-15 vignette-effect"></div>
                    @if($berita->gambar)
                    <img
                        src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="w-full h-full object-cover object-center"
                        loading="lazy" />
                    @else
                    <img
                        src="https://images.unsplash.com/photo-1573167507387-6b4b98cb7c13?q=80&w=1280&h=720&auto=format&fit=crop"
                        alt="Berita Kelurahan"
                        class="w-full h-full object-cover object-center"
                        loading="lazy" />
                    @endif
                    <div
                        class="absolute bottom-0 left-0 right-0 h-2/5 z-20 fade-to-white-smooth"></div>
                </div>
            </div>

            <div
                class="container mx-auto px-6 h-full flex items-end pb-24 relative z-30"
                style="transform: translateY(-40px)">
                <div class="max-w-4xl w-full">
                    <nav class="mb-8">
                        <div class="flex items-center space-x-2 text-gray-300 text-sm">
                            <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                                Beranda
                            </a>
                            <i class="fas fa-chevron-right text-xs"></i>
                            <a href="{{ route('berita') }}" class="hover:text-white transition-colors">Berita</a>
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span class="text-white font-medium">Detail Berita</span>
                        </div>
                    </nav>

                    <div class="absolute right-6 bottom-24 z-40 banner-share-container">
                        <button id="banner-share-btn" class="relative group">
                            <div
                                class="flex items-center space-x-2 px-4 py-2 bg-blue-600/90 hover:bg-blue-700 rounded-full text-white shadow-lg transition-all duration-300 transform hover:scale-105">
                                <span class="font-medium text-sm">Bagikan Berita</span>
                                <i class="fas fa-share-alt"></i>
                            </div>
                            <div
                                class="absolute right-0 bottom-full mb-3 opacity-0 invisible transition-all duration-300 transform translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                                <div class="flex flex-col items-end space-y-4">
                                    <a
                                        href="#"
                                        class="share-option relative w-10 h-10 rounded-full bg-blue-600 text-white overflow-hidden group/facebook"
                                        title="Share on Facebook">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/facebook:opacity-0 group-hover/facebook:-translate-y-2">
                                            <i class="fab fa-facebook-f"></i>
                                        </div>
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/facebook:opacity-100 group-hover/facebook:translate-y-0">
                                            <i class="fab fa-facebook-f text-blue-100"></i>
                                        </div>
                                    </a>

                                    <a
                                        href="#"
                                        class="share-option relative w-10 h-10 rounded-full bg-blue-400 text-white overflow-hidden group/twitter"
                                        title="Share on Twitter">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/twitter:opacity-0 group-hover/twitter:-translate-y-2">
                                            <i class="fab fa-twitter"></i>
                                        </div>
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/twitter:opacity-100 group-hover/twitter:translate-y-0">
                                            <i class="fab fa-twitter text-blue-100"></i>
                                        </div>
                                    </a>

                                    <a
                                        href="#"
                                        class="share-option relative w-10 h-10 rounded-full bg-green-500 text-white overflow-hidden group/whatsapp"
                                        title="Share on WhatsApp">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/whatsapp:opacity-0 group-hover/whatsapp:-translate-y-2">
                                            <i class="fab fa-whatsapp"></i>
                                        </div>
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/whatsapp:opacity-100 group-hover/whatsapp:translate-y-0">
                                            <i class="fab fa-whatsapp text-green-100"></i>
                                        </div>
                                    </a>

                                    <a
                                        href="mailto:?subject=Bagikan%20Artikel&body=Saya%20ingin%20berbagi%20artikel%20ini%20dengan%20Anda%3A%0A%0A{{ route('berita.show', $berita->slug) }}%0A%0A"
                                        class="share-option relative w-10 h-10 rounded-full bg-blue-500 text-white overflow-hidden group/email"
                                        title="Share via Email">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/email:opacity-0 group-hover/email:-translate-y-2">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div
                                            class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/email:opacity-100 group-hover/email:translate-y-0">
                                            <i class="fas fa-envelope-open-text text-blue-100"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="mb-2">
                        <span
                            class="inline-flex items-center bg-blue-600/90 text-white px-3 py-1 rounded-full text-xs font-semibold border border-white/20"
                            style="
                  backdrop-filter: blur(8px);
                  -webkit-backdrop-filter: blur(8px);
                ">
                            <i class="fas fa-newspaper mr-1"></i>
                            BERITA
                        </span>
                    </div>

                    <h1
                        class="text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-white"
                        style="
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6),
                  0 4px 8px rgba(0, 0, 0, 0.4), 0 8px 16px rgba(0, 0, 0, 0.2);
              ">
                        {{ $berita->judul }}
                    </h1>

                    <div class="flex flex-wrap gap-3 text-sm text-gray-300 mt-6">
                        <div class="flex items-center bg-black/30 px-3 py-1 rounded-full"
                            style="
                  backdrop-filter: blur(6px);
                  -webkit-backdrop-filter: blur(6px);">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y') }}</span>
                        </div>
                        <div class="flex items-center bg-black/30 px-3 py-1 rounded-full"
                            style="
                  backdrop-filter: blur(6px);
                  -webkit-backdrop-filter: blur(6px);
                ">
                            <i class="far fa-user mr-1"></i>
                            <span>Admin Kelurahan</span>
                        </div>
                        <div class="flex items-center bg-black/30 px-3 py-1 rounded-full"
                            style="
                  backdrop-filter: blur(6px);
                  -webkit-backdrop-filter: blur(6px);
                ">
                            <i class="far fa-eye mr-1"></i>
                            <span>{{ rand(100, 999) }} Views</span>
                        </div>
                        <div
                            class="flex items-center px-4 py-2 rounded-full border border-white/20 hover:bg-white/20 transition-all"
                            style="
                  background: rgba(255, 255, 255, 0.1);
                  backdrop-filter: blur(10px);
                  -webkit-backdrop-filter: blur(10px);
                ">
                            <i class="far fa-clock mr-2"></i>
                            <span>{{ rand(3, 8) }} min read</span>
                        </div>
                    </div>
                    <div class="mt-8" data-aos="fade-up" data-aos-delay="500"></div>
                </div>
            </div>
        </section>

        <section id="article-content" class="py-16 relative bg-gray-50">
            <div class="main-content-container mx-auto px-6">
                <div class="max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                        <div class="lg:col-span-2 space-y-12">
                            @if($berita->gambar)
                            <div
                                class="rounded-2xl overflow-hidden shadow-2xl relative h-96"
                                data-aos="fade-up">
                                <img
                                    src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    class="w-full h-full object-cover object-center" />
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                                    <p class="text-sm text-white italic">
                                        {{ $berita->judul }}
                                    </p>
                                </div>
                            </div>
                            @endif

                            <article
                                class="article-content prose prose-lg max-w-none"
                                data-aos="fade-up">
                                <div
                                    class="bg-gradient-to-r from-blue-50 to-blue-50 p-6 rounded-xl border-l-4 border-blue-500 mb-8">
                                    <p
                                        class="text-xl text-gray-800 leading-relaxed font-medium">
                                        <span class="text-blue-600 font-bold">Tanjungpinang</span>
                                        - {!! nl2br(e($berita->isi)) !!}
                                    </p>
                                </div>
                            </article>

                            <section class="mt-16">
                                <div class="modern-card rounded-3xl p-8">
                                    <div class="flex items-center justify-between mb-8">
                                        <h3 class="text-3xl font-bold gradient-text">
                                            💬 Komentar
                                        </h3>
                                    </div>

                                    <div class="glass-effect rounded-2xl p-6 mb-8">
                                        <div class="flex space-x-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center text-white font-bold">
                                                A
                                            </div>
                                            <div class="flex-1">
                                                <textarea
                                                    placeholder="Bagikan pendapat Anda tentang berita ini..."
                                                    class="w-full p-4 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600 resize-none"
                                                    rows="3"></textarea>
                                                <div class="flex justify-between items-center mt-4">
                                                    <div class="flex space-x-2">
                                                        <button
                                                            class="text-slate-400 hover:text-blue-600 transition-colors">
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button
                                                            class="text-slate-400 hover:text-blue-600 transition-colors">
                                                            <i class="fas fa-smile"></i>
                                                        </button>
                                                    </div>
                                                    <button
                                                        class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-xl font-semibold hover:from-blue-700 hover:to-blue-800 transition-all">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-8">
                                        <p class="text-gray-500">
                                            <i class="fas fa-comments mr-2"></i>
                                            Belum ada komentar. Jadilah yang pertama berkomentar!
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="lg:col-span-1">
                            <div class="lg:sticky top-24 space-y-8">
                                <div
                                    class="bg-white rounded-xl shadow-lg p-6 border"
                                    data-aos="fade-left">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                                        Kembali ke Berita
                                    </h2>
                                    <a href="{{ route('berita') }}"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group border border-white/20 w-full justify-center">
                                        <i class="fas fa-arrow-left mr-3"></i>
                                        <span>Lihat Semua Berita</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Memanggil Footer secara eksplisit --}}
    @include('frontend.layouts.footer')

    <button id="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

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
            const backToTopBtn = document.getElementById("back-to-top");
            if (backToTopBtn) {
                window.addEventListener("scroll", () => {
                    if (window.pageYOffset > 300) {
                        backToTopBtn.classList.add("visible");
                    } else {
                        backToTopBtn.classList.remove("visible");
                    }
                });
                backToTopBtn.addEventListener("click", () => {
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth",
                    });
                });
            }
        });
    </script>
</body>

</html>