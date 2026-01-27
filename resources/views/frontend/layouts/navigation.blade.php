<header id="main-header" class="modern-header fixed top-0 w-full z-50 transition-all duration-300">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                {{-- Ganti src dengan logo asli --}}
                <img src="https://tpikotakel.tanjungpinangkota.go.id/img/logo-tpi.182f9638.png"
                     alt="Logo" class="h-10 w-10 md:h-12 md:w-12 object-contain  transition-transform">
                <div class="text-white flex flex-col">
                    <span class="text-xs font-medium uppercase tracking-widest opacity-90">Kelurahan</span>
                    <span class="text-lg md:text-xl font-bold leading-none tracking-wide">Sungai Lekop</span>
                </div>
            </a>

            {{-- DESKTOP MENU --}}
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}" class="nav-item text-white font-medium hover:text-yellow-400 transition relative">
                    Beranda
                </a>
                <a href="{{ url('/profil') }}" class="nav-item text-white font-medium hover:text-yellow-400 transition relative">
                    Profil
                </a>
                <a href="{{ url('/berita') }}" class="nav-item text-white font-medium hover:text-yellow-400 transition relative">
                    Berita
                </a>
                <a href="{{ url('/layanan') }}" class="nav-item text-white font-medium hover:text-yellow-400 transition relative">
                    Jelajah Lekop
                </a>
                <a href="{{ url('/kontak') }}" class="nav-item text-white font-medium hover:text-yellow-400 transition relative">
                    Kontak
                </a>

                <a href="{{ url('/login') }}"
                   class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-2 rounded-full text-sm font-semibold transition flex items-center gap-2">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </nav>

            {{-- MOBILE TOGGLE --}}
            <button id="mobile-menu-btn" class="md:hidden text-white text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU DROPDOWN --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-xl absolute w-full top-full left-0 border-t border-gray-100">
        <div class="flex flex-col p-4 space-y-2">
            <a href="{{ url('/') }}" class="text-gray-700 font-semibold p-3 hover:bg-blue-50 rounded-lg transition">Beranda</a>
            <a href="{{ url('/profil') }}" class="text-gray-700 font-semibold p-3 hover:bg-blue-50 rounded-lg transition">Profil</a>
            <a href="{{ url('/berita') }}" class="text-gray-700 font-semibold p-3 hover:bg-blue-50 rounded-lg transition">Berita</a>
            <a href="{{ url('/layanan') }}" class="text-gray-700 font-semibold p-3 hover:bg-blue-50 rounded-lg transition">Layanan</a>
            <a href="{{ url('/kontak') }}" class="text-gray-700 font-semibold p-3 hover:bg-blue-50 rounded-lg transition">Kontak</a>
            <a href="{{ url('/login') }}" class="text-center bg-blue-900 text-white font-semibold py-3 rounded-lg mt-2">
                Login Admin
            </a>
        </div>
    </div>
</header>