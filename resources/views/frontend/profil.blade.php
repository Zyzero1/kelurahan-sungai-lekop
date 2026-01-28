<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Kelurahan Sungai Lekop</title>

    {{-- Library Pihak Ketiga --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --primary-900: #1e3a8a;
            --primary-600: #2563eb;
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

        /* --- STYLES KHUSUS MAIN CONTENT --- */
        .timeline-item {
            position: relative;
            padding-left: 2rem;
            border-left: 3px solid #e2e8f0;
            padding-bottom: 2rem;
        }

        .timeline-item:last-child {
            border-left: 3px solid transparent;
        }

        .timeline-dot {
            position: absolute;
            left: -10px;
            top: 0;
            width: 18px;
            height: 18px;
            background: var(--primary-600);
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 2px var(--primary-600);
        }

        .nav-link.active {
            background-color: #eff6ff;
            color: var(--primary-900);
            border-right: 3px solid var(--primary-600);
            font-weight: 600;
        }

        /* Card Decoration */
        .card-decoration::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, transparent 50%, rgba(37, 99, 235, 0.1) 50%);
            border-top-right-radius: 0.75rem;
        }

        /* Modal Show */
        #imageModal:not(.hidden) {
            display: flex;
        }
    </style>
</head>

<body class="font-sans antialiased text-slate-800">

    @include('frontend.layouts.navigation')

    <div class="pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-800 text-white">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">
                Profil Kelurahan
            </h1>
            <p class="text-blue-100">
                Informasi umum tentang Kelurahan Sungai Lekop
            </p>
        </div>
    </div>

    <main class="relative z-10 -mt-10">
        <div class="container mx-auto px-6 pb-12">

            <div class="flex flex-col lg:flex-row gap-8">

                <aside class="hidden lg:block w-1/4">
                    <div class="sticky top-28 bg-white rounded-xl shadow-lg border border-slate-100 overflow-hidden">
                        <div class="p-4 bg-slate-50 border-b border-slate-200">
                            <h3 class="font-bold text-slate-700">Daftar Isi</h3>
                        </div>
                        <nav class="flex flex-col py-2 text-sm">
                            <a href="#pimpinan" class="nav-link px-5 py-3 text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition flex items-center gap-2">
                                <i class="fas fa-user-tie w-4"></i> Pimpinan & Identitas
                            </a>
                            <a href="#visimisi" class="nav-link px-5 py-3 text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition flex items-center gap-2">
                                <i class="fas fa-bullseye w-4"></i> Visi & Misi
                            </a>
                            <a href="#sejarah" class="nav-link px-5 py-3 text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition flex items-center gap-2">
                                <i class="fas fa-history w-4"></i> Sejarah
                            </a>
                            <a href="#struktur" class="nav-link px-5 py-3 text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition flex items-center gap-2">
                                <i class="fas fa-sitemap w-4"></i> Struktur
                            </a>
                            <a href="#lokasi" class="nav-link px-5 py-3 text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition flex items-center gap-2">
                                <i class="fas fa-map-marked-alt w-4"></i> Peta Lokasi
                            </a>
                        </nav>
                    </div>
                </aside>

                <div class="w-full lg:w-3/4 space-y-8">

                    <section id="pimpinan" data-aos="fade-up">
                        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6 flex flex-col md:flex-row border border-slate-100">
                            <div class="md:w-1/3 bg-slate-100 flex items-center justify-center p-6 border-r border-slate-200 relative">
                                <div class="text-center w-full">
                                    @if(isset($profil->foto_lurah))
                                    <img src="{{ asset('uploads/lurah/'.$profil->foto_lurah) }}" alt="Foto Lurah" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-white shadow-md mb-3">
                                    @else
                                    <div class="w-32 h-32 rounded-full mx-auto bg-slate-200 flex items-center justify-center border-4 border-white shadow-md mb-3 text-slate-400">
                                        <i class="fas fa-user text-5xl"></i>
                                    </div>
                                    @endif

                                    <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase">
                                        Lurah / Kepala Desa
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/3 p-6 flex flex-col justify-center">
                                <h2 class="text-2xl font-bold text-slate-800 mb-1">
                                    {{ $profil->nama_lurah ?? 'Nama Lurah Belum Diisi' }}
                                </h2>
                                <p class="text-slate-500 font-mono text-sm mb-4">
                                    NIP: {{ $profil->nip_lurah ?? '-' }}
                                </p>
                                <blockquote class="border-l-4 border-blue-500 pl-4 italic text-slate-600 text-sm">
                                    "{{ $profil->motto_lurah ?? 'Melayani dengan sepenuh hati, membangun untuk negeri.' }}"
                                </blockquote>

                                <div class="mt-6 flex gap-4 pt-4 border-t border-slate-100">
                                    <div class="text-sm">
                                        <span class="block text-xs text-slate-400 uppercase">Email Resmi</span>
                                        <span class="font-medium text-slate-700">{{ $profil->email ?? 'kelurahan@sungailekop.id' }}</span>
                                    </div>
                                    <div class="text-sm">
                                        <span class="block text-xs text-slate-400 uppercase">Telepon/WA</span>
                                        <span class="font-medium text-slate-700">{{ $profil->telepon ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center hover:shadow-md transition">
                                <i class="fas fa-mail-bulk text-2xl text-blue-500 mb-2"></i>
                                <p class="text-xs text-slate-500 font-bold uppercase">Kode Pos</p>
                                <p class="text-lg font-bold text-slate-800">{{ $profil->kode_pos ?? '29151' }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center hover:shadow-md transition">
                                <i class="fas fa-ruler-combined text-2xl text-green-500 mb-2"></i>
                                <p class="text-xs text-slate-500 font-bold uppercase">Luas Wilayah</p>
                                <p class="text-lg font-bold text-slate-800">{{ $profil->luas_wilayah ?? '-' }} Ha</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center hover:shadow-md transition">
                                <i class="fas fa-building text-2xl text-orange-500 mb-2"></i>
                                <p class="text-xs text-slate-500 font-bold uppercase">Jumlah RW</p>
                                <p class="text-lg font-bold text-slate-800">{{ $profil->jumlah_rw ?? '0' }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center hover:shadow-md transition">
                                <i class="fas fa-home text-2xl text-indigo-500 mb-2"></i>
                                <p class="text-xs text-slate-500 font-bold uppercase">Jumlah RT</p>
                                <p class="text-lg font-bold text-slate-800">{{ $profil->jumlah_rt ?? '0' }}</p>
                            </div>
                        </div>
                    </section>

                    <section id="visimisi" data-aos="fade-up">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-br from-blue-900 to-blue-800 text-white rounded-xl p-8 relative overflow-hidden shadow-lg">
                                <div class="absolute top-0 right-0 p-4 opacity-10">
                                    <i class="fas fa-quote-right text-8xl"></i>
                                </div>
                                <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                                    <i class="fas fa-star text-yellow-400"></i> VISI
                                </h3>
                                <p class="text-xl font-serif italic leading-relaxed relative z-10">
                                    "{{ $profil->visi ?? 'Visi belum diinput' }}"
                                </p>
                            </div>

                            <div class="bg-white rounded-xl shadow-md p-8 border border-slate-100 card-decoration relative">
                                <h3 class="text-xl font-bold mb-4 text-blue-900 flex items-center gap-2">
                                    <i class="fas fa-list-check"></i> MISI
                                </h3>
                                <div class="text-slate-700 space-y-2 relative z-10">
                                    @if($profil && $profil->misi)
                                    @foreach(explode("\n", $profil->misi) as $misi)
                                    @if(trim($misi) != '')
                                    <div class="flex gap-3">
                                        <i class="fas fa-check-circle text-green-500 mt-1 flex-shrink-0"></i>
                                        <span>{{ $misi }}</span>
                                    </div>
                                    @endif
                                    @endforeach
                                    @else
                                    <p class="text-slate-400 italic">Misi belum tersedia.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="bg-white rounded-xl shadow-md p-8 border border-slate-100" data-aos="fade-up">
                        <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <i class="fas fa-chart-pie text-blue-600"></i> Demografi Penduduk
                        </h2>

                        @php
                        $totalPenduduk = ($profil->jumlah_laki_laki ?? 0) + ($profil->jumlah_perempuan ?? 0);
                        $persenLaki = $totalPenduduk > 0 ? round((($profil->jumlah_laki_laki ?? 0) / $totalPenduduk) * 100, 1) : 0;
                        $persenPerempuan = $totalPenduduk > 0 ? round((($profil->jumlah_perempuan ?? 0) / $totalPenduduk) * 100, 1) : 0;
                        @endphp

                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="w-full md:w-1/3">
                                <div class="bg-white rounded-lg shadow-lg p-4" data-laki-laki="{{ $profil->jumlah_laki_laki ?? 0 }}" data-perempuan="{{ $profil->jumlah_perempuan ?? 0 }}">
                                    <canvas id="genderChart" width="200" height="200"></canvas>
                                </div>
                            </div>
                            <div class="w-full md:w-2/3">
                                @if($profil->demografi_deskripsi)
                                <p class="text-slate-600 mb-4 text-justify">
                                    {{ $profil->demografi_deskripsi }}
                                </p>
                                @else
                                <p class="text-slate-600 mb-4 text-justify">
                                    Berdasarkan data kependudukan terkini, {{ $profil->nama_kelurahan ?? 'Kelurahan' }} memiliki komposisi penduduk yang beragam. Data di samping merupakan perbandingan gender (laki-laki dan perempuan).
                                </p>
                                @endif

                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="p-4 bg-blue-50 rounded-lg border border-blue-200 hover:shadow-md transition">
                                        <div class="flex items-center gap-3">
                                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                            <div>
                                                <p class="text-xs text-slate-500 font-semibold">Laki-laki</p>
                                                <p class="font-bold text-blue-800 text-xl">{{ $persenLaki }}%</p>
                                                <p class="text-sm text-slate-600">{{ number_format($profil->jumlah_laki_laki ?? 0, 0, ',', '.') }} jiwa</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 bg-pink-50 rounded-lg border border-pink-200 hover:shadow-md transition">
                                        <div class="flex items-center gap-3">
                                            <div class="w-3 h-3 bg-pink-500 rounded-full"></div>
                                            <div>
                                                <p class="text-xs text-slate-500 font-semibold">Perempuan</p>
                                                <p class="font-bold text-pink-800 text-xl">{{ $persenPerempuan }}%</p>
                                                <p class="text-sm text-slate-600">{{ number_format($profil->jumlah_perempuan ?? 0, 0, ',', '.') }} jiwa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($profil->jumlah_kk)
                                <div class="p-4 bg-green-50 rounded-lg border border-green-200 hover:shadow-md transition">
                                    <div class="flex items-center gap-3">
                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-semibold">Total Kepala Keluarga</p>
                                            <p class="font-bold text-green-800 text-xl">{{ number_format($profil->jumlah_kk, 0, ',', '.') }} KK</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </section>

                    <section id="sejarah" class="bg-white rounded-xl shadow-md p-8 border border-slate-100" data-aos="fade-up">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b">
                            <i class="fas fa-landmark text-2xl text-slate-400"></i>
                            <h2 class="text-2xl font-bold text-slate-800">Sejarah Pembentukan</h2>
                        </div>

                        <div class="pl-2">
                            @if($profil && $profil->sejarah)
                            @php
                            $paragraphs = explode("\n", $profil->sejarah);
                            $paragraphs = array_filter($paragraphs, fn($value) => !is_null($value) && $value !== '');
                            @endphp

                            @foreach($paragraphs as $index => $p)
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <p class="text-slate-600 leading-relaxed text-justify">
                                    {{ $p }}
                                </p>
                            </div>
                            @endforeach
                            @else
                            <div class="text-center py-8 text-slate-500 bg-slate-50 rounded-lg">
                                <p>Sejarah belum ditambahkan oleh admin.</p>
                            </div>
                            @endif
                        </div>
                    </section>

                    <section id="struktur" class="bg-white rounded-xl shadow-md p-8 border border-slate-100" data-aos="fade-up">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-slate-800">Struktur Organisasi</h2>
                            <button onclick="openModal()" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center gap-1">
                                <i class="fas fa-expand-alt"></i> Zoom
                            </button>
                        </div>

                        @if($profil && $profil->struktur)
                        <div class="group relative rounded-lg overflow-hidden border border-slate-200 bg-slate-50 cursor-pointer" onclick="openModal()">
                            <img
                                id="strukturImg"
                                src="{{ asset('uploads/struktur/'.$profil->struktur) }}"
                                alt="Struktur Organisasi"
                                class="w-full object-contain mx-auto transition-transform duration-500 hover:scale-105"
                                style="max-height: 500px;">
                            <div class="zoom-overlay absolute inset-0 flex items-center justify-center">
                                <span class="bg-black/70 text-white px-4 py-2 rounded-full text-sm font-medium">
                                    <i class="fas fa-search-plus mr-2"></i> Klik untuk memperbesar
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="w-full py-16 bg-slate-50 rounded-lg border border-dashed border-slate-300 text-center">
                            <i class="fas fa-sitemap text-4xl text-slate-300 mb-3"></i>
                            <p class="text-slate-500">Gambar struktur belum diunggah.</p>
                        </div>
                        @endif
                    </section>

                    <section id="lokasi" class="bg-white rounded-xl shadow-md p-8 border border-slate-100 mb-8" data-aos="fade-up">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-slate-800">Lokasi Kantor</h2>
                            <span class="text-sm text-slate-500"><i class="fas fa-map-marker-alt text-red-500"></i> {{ $profil->alamat ?? 'Tanjungpinang' }}</span>
                        </div>
                        <div class="w-full h-80 bg-slate-200 rounded-xl overflow-hidden shadow-inner">
                            <iframe
                                src="https://maps.google.com/maps?q=Kantor+Kelurahan+Sungai+Lekop,+Kecamatan+Bintan+Timur,+Kabupaten+Bintan,+Kepri&t=&z=17&ie=UTF8&iwloc=&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy">
                            </iframe>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </main>

    @include('frontend.layouts.footer')

    <div id="imageModal" class="fixed inset-0 z-[9999] hidden bg-black/90 backdrop-blur-sm items-center justify-center p-4" onclick="closeModal()">
        <button class="absolute top-6 right-6 text-white hover:text-red-400 text-4xl transition transform hover:rotate-90">
            &times;
        </button>
        <img id="modalImg" src="" alt="Full View" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl animate-zoomIn">
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        const header = document.querySelector(".modern-header");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) header.classList.add("scrolled");
            else header.classList.remove("scrolled");
        });

        function openModal() {
            const src = document.getElementById('strukturImg').src;
            if (!src) return;
            document.getElementById('modalImg').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Active Link Script
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrollY >= sectionTop - 180) {
                    current = section.getAttribute('id');
                }
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('active');
                }
            });
        });

        // Demografi Chart
        const canvas = document.getElementById('genderChart');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            const chartContainer = canvas.closest('[data-laki-laki]');
            const lakiLaki = parseInt(chartContainer.dataset.lakiLaki) || 0;
            const perempuan = parseInt(chartContainer.dataset.perempuan) || 0;

            if (lakiLaki > 0 || perempuan > 0) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Laki-laki', 'Perempuan'],
                        datasets: [{
                            data: [lakiLaki, perempuan],
                            backgroundColor: ['#3B82F6', '#EC4899'],
                            borderColor: ['#1E40AF', '#BE185D'],
                            borderWidth: 2,
                            hoverOffset: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = total > 0 ? ((context.parsed / total) * 100).toFixed(1) : 0;
                                        return context.label + ': ' + context.parsed + ' jiwa (' + percentage + '%)';
                                    }
                                }
                            }
                        },
                        animation: {
                            animateRotate: true,
                            animateScale: true,
                            duration: 1000
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>