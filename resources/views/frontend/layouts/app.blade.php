<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelurahan Sungai Lekop</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Bintan-Logo.png') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    {{-- NAVBAR FRONTEND --}}
    @include('frontend.layouts.navigation')

    {{-- CONTENT --}}
    <main class="pt-16">
        @yield('content')
    </main>
    @include('frontend.layouts.footer')

</body>

</html>