<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Kelurahan</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">


    <div class="flex min-h-screen">


        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-6">
            <h2 class="text-xl font-bold mb-6">ADMIN KELURAHAN</h2>
            <ul class="space-y-3">
                <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-blue-800 transition">Dashboard</a></li>
                <li><a href="{{ route('admin.home-content.index') }}" class="block py-2 px-3 rounded hover:bg-blue-800 transition">Konten Beranda</a></li>
                <li><a href="{{ route('admin.profil.index') }}" class="block py-2 px-3 rounded hover:bg-blue-800 transition">Profil</a></li>
                <li><a href="{{ route('admin.layanan.index') }}" class="block py-2 px-3 rounded hover:bg-blue-800 transition">Layanan</a></li>
                <li><a href="{{ route('admin.berita.index') }}" class="block py-2 px-3 rounded hover:bg-blue-800 transition">Berita</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button class="bg-red-600 px-4 py-2 rounded">Logout</button>
            </form>
        </aside>


        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>


</body>

</html>