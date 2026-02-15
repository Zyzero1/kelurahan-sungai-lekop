<header id="main-header" class="modern-header fixed top-0 w-full z-50 transition-all duration-300">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                {{-- Ganti src dengan logo asli --}}
                <img src="{{ asset('images/Bintan-Logo.png') }}" class="h-12" alt="Logo Kelurahan Sungai Lekop">
                <div class="text-white flex flex-col">
                    <span class="text-xs font-medium uppercase tracking-widest opacity-90">Kelurahan</span>
                    <span class="text-lg md:text-xl font-bold leading-none tracking-wide">Sungai Lekop</span>
                </div>
            </a>

            {{-- DESKTOP MENU --}}
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}" class="nav-item text-white font-medium transition relative group">
                    Beranda
                </a>
                <a href="{{ url('/profil') }}" class="nav-item text-white font-medium transition relative group">
                    Profil
                </a>
                <a href="{{ url('/berita') }}" class="nav-item text-white font-medium transition relative group">
                    Berita
                </a>
                <a href="{{ url('/layanan') }}" class="nav-item text-white font-medium transition relative group">
                    Jelajah Lekop
                </a>
                <a href="{{ url('/kontak') }}" class="nav-item text-white font-medium transition relative group">
                    Kontak
                </a>

                <a href="{{ url('/login') }}"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-2 rounded-full text-sm font-semibold transition flex items-center gap-2 group">
                    <i class="fas fa-sign-in-alt group-hover:rotate-12 transition-transform duration-300"></i>
                    <span class="group-hover:text-yellow-300 transition-colors duration-300">Login</span>
                </a>
            </nav>

            {{-- MOBILE TOGGLE --}}
            <button id="mobile-menu-btn" class="md:hidden text-white text-2xl focus:outline-none hover:text-yellow-400 transition-colors duration-300">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU DROPDOWN --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-xl absolute w-full top-full left-0 border-t border-gray-100">
        <div class="flex flex-col p-4 space-y-2">
            <a href="{{ url('/') }}" class="text-gray-700 font-semibold p-3 hover:bg-yellow-50 hover:text-yellow-700 hover:border-l-4 hover:border-yellow-400 rounded-lg transition-all duration-300">Beranda</a>
            <a href="{{ url('/profil') }}" class="text-gray-700 font-semibold p-3 hover:bg-yellow-50 hover:text-yellow-700 hover:border-l-4 hover:border-yellow-400 rounded-lg transition-all duration-300">Profil</a>
            <a href="{{ url('/berita') }}" class="text-gray-700 font-semibold p-3 hover:bg-yellow-50 hover:text-yellow-700 hover:border-l-4 hover:border-yellow-400 rounded-lg transition-all duration-300">Berita</a>
            <a href="{{ url('/layanan') }}" class="text-gray-700 font-semibold p-3 hover:bg-yellow-50 hover:text-yellow-700 hover:border-l-4 hover:border-yellow-400 rounded-lg transition-all duration-300">Jelajah Lekop</a>
            <a href="{{ url('/kontak') }}" class="text-gray-700 font-semibold p-3 hover:bg-yellow-50 hover:text-yellow-700 hover:border-l-4 hover:border-yellow-400 rounded-lg transition-all duration-300">Kontak</a>
            <a href="{{ url('/login') }}" class="text-center bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 rounded-lg mt-2 transition-all duration-300">
                Login Admin
            </a>
        </div>
    </div>

    <style>
        /* Header Styling - Centralized */
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
            background: #1e3a8a !important;
            backdrop-filter: none !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Ensure text and logo are visible */
        .modern-header .text-white {
            color: white !important;
        }

        .modern-header a:hover {
            color: #fbbf24 !important;
        }

        /* Active state untuk navigasi */
        .nav-item.active {
            color: #fbbf24 !important;
        }

        /* Hover effects */
        .nav-item:hover {
            color: #fbbf24 !important;
            transform: translateY(-1px);
        }

        /* Mobile menu active state */
        #mobile-menu a.active {
            background-color: #fef3c7 !important;
            color: #d97706 !important;
            border-left: 4px solid #f59e0b !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get current page URL
            const currentPath = window.location.pathname;
            const navItems = document.querySelectorAll('.nav-item');
            const mobileLinks = document.querySelectorAll('#mobile-menu a');
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            console.log('Current path:', currentPath); // Debug log
            console.log('Mobile menu btn:', mobileMenuBtn); // Debug
            console.log('Mobile menu:', mobileMenu); // Debug

            // Set active state based on current page (Desktop)
            navItems.forEach(item => {
                const href = item.getAttribute('href');
                console.log('Checking href:', href); // Debug log

                if (href === currentPath ||
                    (currentPath === '/' && href === '/') ||
                    (currentPath === '/' && href === '{{ url("/") }}') ||
                    (currentPath.startsWith('/profil') && href.includes('/profil')) ||
                    (currentPath.startsWith('/berita') && href.includes('/berita')) ||
                    (currentPath.startsWith('/layanan') && href.includes('/layanan')) ||
                    (currentPath.startsWith('/kontak') && href.includes('/kontak'))) {
                    item.classList.add('active');
                    console.log('Added active to:', href); // Debug log
                }
            });

            // Set active state for mobile menu
            if (mobileLinks) {
                mobileLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (href === currentPath ||
                        (currentPath === '/' && href === '/') ||
                        (currentPath === '/' && href === '{{ url("/") }}') ||
                        (currentPath.startsWith('/profil') && href.includes('/profil')) ||
                        (currentPath.startsWith('/berita') && href.includes('/berita')) ||
                        (currentPath.startsWith('/layanan') && href.includes('/layanan')) ||
                        (currentPath.startsWith('/kontak') && href.includes('/kontak'))) {
                        link.classList.add('active');
                    }
                });
            }

            // HAMBURGER MENU TOGGLE
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    console.log('🍔 Hamburger clicked! Current state:', mobileMenu.classList.contains('hidden'));

                    // Toggle menu with animation
                    if (mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.classList.add('show');

                        // Change icon to X
                        const icon = mobileMenuBtn.querySelector('i');
                        if (icon) {
                            icon.classList.remove('fa-bars');
                            icon.classList.add('fa-times');
                        }

                        // Prevent body scroll
                        document.body.style.overflow = 'hidden';
                    } else {
                        // Close menu
                        mobileMenu.classList.remove('show');
                        mobileMenu.classList.add('hidden');

                        // Change icon back to hamburger
                        const icon = mobileMenuBtn.querySelector('i');
                        if (icon) {
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }

                        // Restore body scroll
                        document.body.style.overflow = '';
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                        if (mobileMenu.classList.contains('show')) {
                            mobileMenuBtn.click(); // Trigger click handler to close menu
                        }
                    }
                });

                // Close mobile menu when clicking on links
                if (mobileLinks) {
                    mobileLinks.forEach(link => {
                        link.addEventListener('click', function() {
                            if (mobileMenu.classList.contains('show')) {
                                mobileMenuBtn.click(); // Close menu
                            }

                            // Navigate after a short delay
                            setTimeout(() => {
                                window.location.href = this.href;
                            }, 350);
                        });
                    });
                }

                // Handle escape key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && mobileMenu.classList.contains('show')) {
                        mobileMenuBtn.click();
                    }
                });

                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 767 && mobileMenu.classList.contains('show')) {
                        mobileMenuBtn.click(); // Close menu on desktop view
                    }
                });

                console.log('✅ Enhanced hamburger menu initialized successfully!');
            } else {
                console.error('❌ Could not find hamburger menu elements:', {
                    btn: !!mobileMenuBtn,
                    menu: !!mobileMenu
                });
            }
        });
    </script>
</header>