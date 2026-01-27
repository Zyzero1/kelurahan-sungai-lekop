<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Kelurahan Sungai Lekop</title>

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

        /* Header Asli (JANGAN DIUBAH - SAMA PERSIS DENGAN JELAJAH) */
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

        /* Card Hover Effect */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="font-sans antialiased text-slate-800">

    {{-- Memanggil Navigasi --}}
    @include('frontend.layouts.navigation')

    <main class="min-h-screen">

        {{-- 1. HERO SECTION (BANNER RAPI & ELEGAN) --}}
        <section class="relative h-[450px] flex items-center justify-center bg-slate-900">
            <div class="absolute inset-0 z-0">
                <img src="https://placehold.co/1920x1080/1e293b/FFFFFF?text=Kantor+Pelayanan+Publik" alt="Kantor Desa" class="w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-blue-900/90 to-slate-900/80"></div>
            </div>

            <div class="container relative z-10 px-6 text-center pt-16">
                <span class="inline-block py-1 px-4 rounded-full bg-white/10 text-white text-xs font-bold tracking-widest uppercase mb-4 border border-white/20 backdrop-blur-sm">
                    Pusat Informasi
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight drop-shadow-md">
                    Hubungi Kami
                </h1>
                <p class="text-lg text-slate-200 mb-0 max-w-2xl mx-auto font-light leading-relaxed">
                    Kami siap melayani kebutuhan administrasi dan informasi Anda.<br>
                    Silakan kunjungi kantor kami atau hubungi melalui saluran digital di bawah ini.
                </p>
            </div>
        </section>

        {{-- 2. INFO CARDS SECTION --}}
        <section class="relative z-20 px-6 -mt-20 mb-16">
            <div class="container mx-auto max-w-6xl">
                <div class="grid md:grid-cols-3 gap-6">
                    
                    <div class="bg-white p-8 rounded-xl shadow-xl border-b-4 border-blue-600 card-hover" data-aos="fade-up" data-aos-delay="0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mr-4">
                                <i class="fas fa-map-location-dot text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Lokasi Kantor</h3>
                        </div>
                        <p class="text-slate-600 leading-relaxed text-sm pl-16">
                            Jl. Korindo Km. 22 No. 1A<br>
                            Kode Pos 29151<br>
                            Sungai Lekop, Bintan Timur<br>
                            Kabupaten Bintan
                        </p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-xl border-b-4 border-accent-500 card-hover" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center text-yellow-600 mr-4">
                                <i class="fas fa-clock text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Jam Layanan</h3>
                        </div>
                        <ul class="space-y-3 text-sm text-slate-600 pl-16">
                            <li class="flex justify-between items-center border-b border-gray-100 pb-2">
                                <span class="font-medium">Senin - Kamis</span>
                                <span class="text-slate-900 font-bold">08.00 - 16.00</span>
                            </li>
                            <li class="flex justify-between items-center border-b border-gray-100 pb-2">
                                <span class="font-medium">Jumat</span>
                                <span class="text-slate-900 font-bold">08.00 - 15.30</span>
                            </li>
                            <li class="flex justify-between items-center pt-1 text-red-500 italic text-xs">
                                <span>Sabtu - Minggu</span>
                                <span>Tutup</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-xl border-b-4 border-purple-600 card-hover" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center text-purple-600 mr-4">
                                <i class="fab fa-instagram text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Media Sosial</h3>
                        </div>
                        <p class="text-slate-600 mb-4 text-sm pl-16">Ikuti kegiatan terbaru dan informasi terkini kelurahan kami.</p>
                        <div class="pl-16">
                            <a href="https://www.instagram.com/kelurahan.sungailekop/" target="_blank" class="inline-flex items-center text-purple-700 font-bold hover:text-purple-900 transition">
                                @kelurahan.sungailekop <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 3. MAP SECTION --}}
        <section class="py-12 bg-white mb-10">
            <div class="container mx-auto px-6">
                <div class="bg-slate-50 rounded-2xl p-6 shadow-inner border border-slate-100">
                    <div class="flex flex-col md:flex-row gap-8">
                        
                        <div class="md:w-1/3 flex flex-col justify-center" data-aos="fade-right">
                            <h2 class="text-2xl font-bold text-slate-900 mb-4">Panduan Lokasi</h2>
                            <p class="text-slate-600 mb-6 text-sm leading-relaxed">
                                Kantor Kelurahan Sungai Lekop mudah diakses melalui Jalan Korindo. Gunakan peta digital Google Maps untuk mendapatkan rute tercepat dari lokasi Anda.
                            </p>
                            <a href="https://maps.google.com" target="_blank" class="w-full md:w-auto inline-flex justify-center items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition shadow-lg shadow-blue-500/20">
                                <i class="fas fa-location-arrow mr-2"></i> Buka di Google Maps
                            </a>
                        </div>

                        <div class="md:w-2/3 h-[350px] rounded-xl overflow-hidden shadow-md" data-aos="fade-left">
                            <iframe 
                                src="https://www.google.com/maps?q=0.886008,104.5869969&hl=id&z=17&output=embed" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- Memanggil Footer --}}
    @include('frontend.layouts.footer')

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Header Scroll Effect (Sama persis dengan jelajah)
        const header = document.querySelector(".modern-header");
        if (header) {
            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) header.classList.add("scrolled");
                else header.classList.remove("scrolled");
            });
        }
    </script>
</body>

</html>