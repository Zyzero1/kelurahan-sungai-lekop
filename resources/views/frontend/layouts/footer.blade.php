<footer class="bg-slate-900 text-white pt-8 md:pt-16 border-t border-white/10 w-full">
    <div class="w-full px-4 sm:px-6 pb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12 max-w-7xl mx-auto text-center sm:text-left">

            {{-- KOLOM 1: TENTANG --}}
            <div class="lg:col-span-1 text-center sm:text-left">
                {{-- Ambil data dari pengaturan admin --}}
                @php
                try {
                $kelurahanSetting = \App\Models\KelurahanSetting::getSetting();
                $logoPath = $kelurahanSetting->logo_path ?? null;
                $namaKelurahan = $kelurahanSetting->nama_kelurahan ?? 'Sungai Lekop';
                } catch (Exception $e) {
                $logoPath = null;
                $namaKelurahan = 'Sungai Lekop';
                }
                @endphp

                <div class="flex items-center gap-3 mb-6 justify-center sm:justify-start">
                    @if($logoPath && file_exists(public_path($logoPath)))
                    <img src="{{ asset($logoPath) }}" class="h-10" alt="Logo {{ $namaKelurahan }}">
                    @else
                    <i class="fas fa-landmark text-2xl text-yellow-400"></i>
                    @endif
                    <div class="text-left">
                        <span class="text-xs font-medium uppercase tracking-widest opacity-90">Kelurahan</span>
                        <div class="text-lg md:text-xl font-bold leading-none tracking-wide">
                            {{ $namaKelurahan }}
                        </div>
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-gray-400 mb-6">
                    {{ $footerData['tentang']->konten ?? 'Website resmi Kelurahan Sungai Lekop sebagai pusat informasi dan pelayanan masyarakat yang transparan, cepat, dan akurat.' }}
                </p>
                @if($footerData['social'] && $footerData['social']->count() > 0)
                <div class="flex gap-3 justify-center sm:justify-start">
                    @foreach($footerData['social'] as $social)
                    <a href="{{ $social->url }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-blue-600 transition">
                        <i class="{{ $social->icon }}"></i>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- KOLOM 2: TAUTAN --}}
            <div class="lg:col-span-1 text-center sm:text-left">
                <h3 class="font-bold text-lg mb-6 relative inline-block">
                    Tautan Cepat
                </h3>
                <ul class="text-sm text-gray-400 space-y-3">
                    @if($footerData['tautan'] && $footerData['tautan']->count() > 0)
                    @foreach($footerData['tautan'] as $tautan)
                    <li><a href="{{ url($tautan->url) }}" class="hover:text-yellow-400 transition block">{{ $tautan->judul }}</a></li>
                    @endforeach
                    @else
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition block">Beranda</a></li>
                    <li><a href="{{ url('/profil') }}" class="hover:text-yellow-400 transition block">Profil</a></li>
                    <li><a href="{{ url('/berita') }}" class="hover:text-yellow-400 transition block">Berita</a></li>
                    <li><a href="{{ url('/layanan') }}" class="hover:text-yellow-400 transition block">Jelajah Lekop</a></li>
                    @endif
                </ul>
            </div>

            {{-- KOLOM 3: LAYANAN --}}
            <div class="text-center sm:text-left">
                <h3 class="font-bold text-lg mb-6 relative inline-block">
                    Layanan Publik
                </h3>
                <ul class="text-sm text-gray-400 space-y-3">
                    @if($footerData['layanan'] && $footerData['layanan']->count() > 0)
                    @foreach($footerData['layanan'] as $layanan)
                    <li><a href="{{ url($layanan->url) }}" class="hover:text-yellow-400 transition block">{{ $layanan->judul }}</a></li>
                    @endforeach
                    @else
                    <li><a href="{{ url('/layanan') }}#administrasi" class="hover:text-yellow-400 transition block">Administrasi Kependudukan</a></li>
                    <li><a href="{{ url('/layanan') }}#surat-keterangan" class="hover:text-yellow-400 transition block">Surat Keterangan</a></li>
                    <li><a href="{{ url('/layanan') }}#pelayanan-perizinan" class="hover:text-yellow-400 transition block">Pelayanan Perizinan</a></li>
                    @endif
                </ul>
            </div>

            {{-- KOLOM 4: KONTAK --}}
            <div class="lg:pr-4 text-center sm:text-left">
                <h3 class="font-bold text-lg mb-6 relative inline-block">
                    Kontak Kami
                </h3>
                <ul class="space-y-4 text-sm text-gray-400">
                    @if($footerData['kontak'] && $footerData['kontak']->count() > 0)
                    @foreach($footerData['kontak'] as $kontak)
                    <li class="flex items-start gap-3 justify-center sm:justify-start">
                        @if($kontak->icon)
                        <i class="{{ $kontak->icon }} text-yellow-400 {{ $kontak->judul == 'Alamat' ? 'mt-1' : '' }}"></i>
                        @endif
                        <span>{{ $kontak->konten }}</span>
                    </li>
                    @endforeach
                    @else
                    <li class="flex items-start gap-3 justify-center sm:justify-start">
                        <i class="fas fa-map-marker-alt text-yellow-400 mt-1"></i>
                        <span>Jalan Sungai Lekop, Kabupaten Bintan, Kepulauan Riau, Indonesia.</span>
                    </li>
                    <li class="flex items-center gap-3 justify-center sm:justify-start">
                        <i class="fas fa-envelope text-yellow-400"></i>
                        <span>admin@sungailekop.go.id</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} Kelurahan Sungai Lekop. <span class="text-yellow-400">Developed by KELOMPOK 5 KKN UMRAH 2026</span>. All rights reserved.
            </p>
        </div>
    </div>
</footer>