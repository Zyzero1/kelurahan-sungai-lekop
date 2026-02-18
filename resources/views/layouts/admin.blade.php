<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kelurahan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        .admin-sidebar {
            background: linear-gradient(to bottom, #1e3a8a, #1e40af) !important;
            color: white !important;
        }

        .admin-sidebar * {
            color: white !important;
        }

        .admin-sidebar .text-blue-300 {
            color: #93c5fd !important;
        }

        .admin-sidebar .group-hover:hover .text-blue-300 {
            color: white !important;
        }
    </style>
</head>

<body class="bg-gray-100">


    <div class="flex min-h-screen">


        <!-- Sidebar -->
        <aside class="admin-sidebar w-64 text-white p-6 shadow-2xl flex flex-col h-screen">
            <div class="mb-8 text-center">
                <h2 class="text-xl font-bold mb-2">Admin Kelurahan</h2>
                <div class="h-1 w-16 bg-blue-400 rounded mx-auto"></div>
            </div>

            <nav class="space-y-2 flex-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.home-content.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <span>Konten Beranda</span>
                </a>

                <a href="{{ route('admin.profil.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <span>Profil</span>
                </a>

                <a href="{{ route('admin.jelajah-lekop.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <span>Jelajah Lekop</span>
                </a>

                <a href="{{ route('admin.berita.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <span>Berita</span>
                </a>

                <a href="{{ route('admin.kontak.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <span>Kontak</span>
                </a>

                <a href="{{ route('admin.social-media.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <span>Media Sosial</span>
                </a>

                <a href="{{ route('admin.kelurahan-setting.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <i class="fas fa-cog me-3"></i>
                    <span>Pengaturan Kelurahan</span>
                </a>

                <a href="{{ route('admin.navigation.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <i class="fas fa-compass me-3"></i>
                    <span>Navigation</span>
                </a>
            </nav>

            <div class="mt-4">
                <a href="{{ route('admin.footer.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 group">
                    <i class="fas fa-globe me-3"></i>
                    <span>Footer</span>
                </a>
            </div>

            <div class="pt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center py-3 px-4 bg-red-600 hover:bg-red-700 rounded-lg transition-all duration-200 group">
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>


        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>