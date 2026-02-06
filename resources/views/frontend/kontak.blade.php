<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Kelurahan Sungai Lekop</title>

    {{-- Library Pihak Ketiga --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
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

        /* Card Hover Effects */
        .contact-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-600);
        }

        .contact-icon {
            transition: all 0.3s ease;
        }

        .contact-card:hover .contact-icon {
            transform: scale(1.1);
        }

        /* Social Button Effects */
        .social-btn {
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Banner Styles */
        .hero-banner {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 200%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    {{-- Navigation --}}
    @include('frontend.layouts.navigation')

    <!-- Hero Banner - Persegi Panjang Standar -->
    <section class="hero-banner h-96 relative flex items-center justify-center">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-700/80"></div>

        <div class="container mx-auto px-6 h-full flex items-center justify-center relative z-30 pt-16">
            <div class="text-center max-w-4xl" data-aos="fade-up">
                <div class="mb-4">
                    <span class="inline-block py-2 px-4 rounded-full bg-white/20 text-white text-sm font-bold tracking-wider border border-white/30 backdrop-blur-sm">
                        HUBUNGI KAMI
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
                    Pusat <span class="text-blue-200">Informasi</span> Kontak
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Temukan informasi lengkap untuk menghubungi Kantor Kelurahan Sungai Lekop
                </p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 z-20">
            <div class="h-2 bg-gray-50"></div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Informasi <span class="text-blue-600">Kontak</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Hubungi kami melalui berbagai cara untuk kebutuhan administrasi dan pelayanan masyarakat
                </p>
            </div>

            @if($kontak)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 contact-grid">
                <!-- Alamat Card -->
                <div class="contact-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-icon w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-6">
                        <i class="fas fa-map-marker-alt text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Alamat</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $kontak->alamat }}</p>
                </div>

                <!-- Telepon Card -->
                <div class="contact-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-icon w-20 h-20 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mx-auto mb-6">
                        <i class="fas fa-phone text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Telepon</h3>
                    <a href="tel:{{ $kontak->telepon }}" class="text-green-600 font-bold text-lg hover:text-green-700 transition-colors">
                        {{ $kontak->telepon }}
                    </a>
                </div>

                <!-- Email Card -->
                <div class="contact-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-icon w-20 h-20 bg-yellow-100 rounded-2xl flex items-center justify-center text-yellow-600 mx-auto mb-6">
                        <i class="fas fa-envelope text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Email</h3>
                    <a href="mailto:{{ $kontak->email }}" class="text-yellow-600 font-bold text-lg hover:text-yellow-700 transition-colors">
                        {{ $kontak->email }}
                    </a>
                </div>

                <!-- Jam Operasional Card -->
                @if($kontak->jam_operasional)
                <div class="contact-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="contact-icon w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center text-red-600 mx-auto mb-6">
                        <i class="fas fa-clock text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Jam Operasional</h3>
                    <div class="text-gray-600 leading-relaxed">
                        {!! nl2br($kontak->jam_operasional) !!}
                    </div>
                </div>
                @endif

                <!-- Lokasi Card -->
                @if($kontak->google_maps_embed)
                <div class="contact-card bg-white rounded-2xl p-8 text-center lg:col-span-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="contact-icon w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 mx-auto mb-6">
                        <i class="fas fa-map text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Lokasi Kami</h3>
                    <div class="rounded-2xl overflow-hidden shadow-inner">
                        {!! $kontak->google_maps_embed !!}
                    </div>
                </div>
                @endif
            </div>

            <!-- Social Media Section -->
            @php
            $socialMedia = \App\Models\SocialMedia::where('is_active', true)->orderBy('sort_order')->get();
            @endphp
            @if($socialMedia->count() > 0)
            <div class="mt-16" data-aos="fade-up" data-aos-delay="600">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Ikuti Kami</h3>
                    <p class="text-gray-600">Dapatkan informasi terbaru melalui media sosial kami</p>
                </div>

                <div class="flex flex-wrap justify-center gap-4">
                    @foreach($socialMedia as $sm)
                    <a href="{{ $sm->url }}" target="_blank" class="social-btn {{ $sm->color_class }} text-white px-6 py-3 rounded-xl font-medium">
                        <i class="{{ $sm->icon_class }} mr-2"></i> {{ $sm->platform }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            @else
            <div class="text-center py-20" data-aos="fade-up">
                <div class="max-w-2xl mx-auto">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fas fa-exclamation-triangle text-4xl text-yellow-600"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Belum Ada Informasi Kontak</h2>
                    <p class="text-gray-600 text-lg">Informasi kontak akan segera tersedia. Silakan kembali lagi nanti.</p>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    @if($kontak)
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Butuh Bantuan?</h2>
            <p class="text-xl text-blue-100 mb-8" data-aos="fade-up" data-aos-delay="100">
                Tim kami siap membantu Anda dengan segala kebutuhan administrasi dan pelayanan masyarakat.
            </p>
            <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
                <a href="tel:{{ $kontak->telepon }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-gray-100 transition-colors">
                    <i class="fas fa-phone mr-2"></i> Hubungi Sekarang
                </a>
                <a href="mailto:{{ $kontak->email }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-xl font-bold hover:bg-white hover:text-blue-600 transition-all">
                    <i class="fas fa-envelope mr-2"></i> Kirim Email
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- Footer --}}
    @include('frontend.layouts.footer')

    {{-- JavaScript --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.modern-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>