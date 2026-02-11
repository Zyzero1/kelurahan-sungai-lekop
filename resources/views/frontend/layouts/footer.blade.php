<footer class="bg-slate-900 text-white pt-16 border-t border-white/10 w-full">
    <div class="w-full px-6 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12 max-w-7xl mx-auto">

            {{-- KOLOM 1: TENTANG --}}
            <div class="md:col-span-1 ml-4 md:ml-8">
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('images/Bintan-Logo.png') }}" class="h-10" alt="Logo Kelurahan Sungai Lekop">
                    <div>
                        <span class="text-xs font-medium uppercase tracking-widest opacity-90">Kelurahan</span>
                        <div class="text-lg md:text-xl font-bold leading-none tracking-wide">Sungai Lekop</div>
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-gray-400 mb-6">
                    Website resmi Kelurahan Sungai Lekop sebagai pusat informasi dan pelayanan masyarakat yang transparan, cepat, dan akurat.
                </p>
                <div class="flex gap-4">
                    <a href="http://facebook.com" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-blue-600 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="http://instagram.com" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-pink-600 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- KOLOM 2: TAUTAN --}}
            <div class="pl-8 md:pl-16">
                <h3 class="font-bold text-lg mb-6 relative inline-block">
                    Tautan Cepat
                </h3>
                <ul class="text-sm text-gray-400 space-y-3">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition block">Beranda</a></li>
                    <li><a href="{{ url('/profil') }}" class="hover:text-yellow-400 transition block">Profil</a></li>
                    <li><a href="{{ url('/berita') }}" class="hover:text-yellow-400 transition block">Berita</a></li>
                    <li><a href="{{ url('/layanan') }}" class="hover:text-yellow-400 transition block">Jelajah Lekop</a></li>
                </ul>
            </div>

            {{-- KOLOM 3: LAYANAN --}}
            <div>
                <h3 class="font-bold text-lg mb-6 relative inline-block">
                    Layanan
                </h3>
                <ul class="text-sm text-gray-400 space-y-3">
                    <li><a href="{{ url('/layanan') }}#administrasi" class="hover:text-yellow-400 transition block">Administrasi Kependudukan</a></li>
                    <li><a href="{{ url('/layanan') }}#surat-keterangan" class="hover:text-yellow-400 transition block">Surat Keterangan</a></li>
                    <li><a href="{{ url('/layanan') }}#pelayanan-perizinan" class="hover:text-yellow-400 transition block">Pelayanan Perizinan</a></li>
                </ul>
            </div>

            {{-- KOLOM 4: KONTAK --}}
            <div class="-ml-4 md:-ml-8">
                <h3 class="font-bold text-lg mb-6 relative inline-block">
                    Kontak Kami
                </h3>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-yellow-400 mt-1"></i>
                        <span>Jalan Sungai Lekop, Kabupaten Bintan, Kepulauan Riau, Indonesia.</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-yellow-400"></i>
                        <span>(0771) 1234567</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-yellow-400"></i>
                        <span>admin@sungailekop.go.id</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} Kelurahan Sungai Lekop. <span class="text-yellow-400">Design by KKN UMRAH 2026</span>. All rights reserved.
            </p>
        </div>
    </div>
</footer>