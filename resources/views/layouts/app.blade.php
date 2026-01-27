<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Kelurahan Sungai Lekop</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-slate-100 font-sans">


    <!-- TOPBAR ADMIN -->
    <nav class="bg-blue-900 text-white px-6 py-4 flex justify-between items-center">
        <div class="font-bold text-lg">
            Kelurahan Sungai Lekop
        </div>

        <div class="flex items-center gap-4">
            <span class="text-sm">
                {{ auth()->check() ? auth()->user()->name : '' }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 px-3 py-1 rounded text-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- WRAPPER -->
    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-blue-800 text-white p-5">
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block hover:bg-blue-700 p-2 rounded">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profil.index') }}" class="block hover:bg-blue-700 p-2 rounded">
                        Profil Kelurahan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.layanan.index') }}" class="block hover:bg-blue-700 p-2 rounded">
                        Layanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.berita.index') }}" class="block hover:bg-blue-700 p-2 rounded">
                        Berita
                    </a>
                </li>
            
            </ul>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-6 bg-slate-100 min-h-screen">
            @yield('content')
        </main>

    </div>

</body>
</html>
