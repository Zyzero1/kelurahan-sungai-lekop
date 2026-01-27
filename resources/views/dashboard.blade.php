@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-blue-700 mb-2">
    Dashboard Admin
</h1>

<p class="text-gray-600 mb-6">
    Selamat datang di Sistem Informasi Kelurahan Sungai Lekop
</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- PROFIL --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h3 class="text-lg font-semibold mb-2">Profil Kelurahan</h3>
        <p class="text-3xl font-bold text-blue-600 mb-3">
            {{ $totalProfil ?? 0 }}
        </p>
        <a href="{{ route('admin.profil.index') }}"
           class="text-blue-600 hover:underline">
            Kelola Profil →
        </a>
    </div>

    {{-- LAYANAN --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h3 class="text-lg font-semibold mb-2">Layanan</h3>
        <p class="text-3xl font-bold text-blue-600 mb-3">
            {{ $totalLayanan ?? 0 }}
        </p>
        <a href="{{ route('admin.layanan.index') }}"
           class="text-blue-600 hover:underline">
            Kelola Layanan →
        </a>
    </div>

    {{-- BERITA --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h3 class="text-lg font-semibold mb-2">Berita</h3>
        <p class="text-3xl font-bold text-blue-600 mb-3">
            {{ $totalBerita ?? 0 }}
        </p>
        <a href="{{ route('admin.berita.index') }}"
           class="text-blue-600 hover:underline">
            Kelola Berita →
        </a>
    </div>

</div>
@endsection
