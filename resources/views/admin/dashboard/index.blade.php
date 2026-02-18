@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-blue-600 text-white p-6 rounded-xl shadow">
            <h2 class="text-sm uppercase opacity-80">Total Profil</h2>
            <p class="text-4xl font-bold mt-2">{{ $totalProfil }}</p>
        </div>

        <div class="bg-green-600 text-white p-6 rounded-xl shadow">
            <h2 class="text-sm uppercase opacity-80">Total Layanan</h2>
            <p class="text-4xl font-bold mt-2">{{ $totalJelajahLekop }}</p>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded-xl shadow">
            <h2 class="text-sm uppercase opacity-80">Total Berita</h2>
            <p class="text-4xl font-bold mt-2">{{ $totalBerita }}</p>
        </div>

        <div class="bg-purple-600 text-white p-6 rounded-xl shadow">
            <h2 class="text-sm uppercase opacity-80">Navigation</h2>
            <p class="text-4xl font-bold mt-2">{{ $totalNavigation }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-4">Ringkasan Data</h3>
        <div class="bg-white p-6 rounded-lg shadow">
            <p class="text-gray-600">Dashboard manajemen konten website Kelurahan Sungai Lekop.</p>
            <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                <div class="text-center">
                    <div class="font-bold text-blue-600">{{ $totalProfil }}</div>
                    <div class="text-gray-500">Profil</div>
                </div>
                <div class="text-center">
                    <div class="font-bold text-green-600">{{ $totalJelajahLekop }}</div>
                    <div class="text-gray-500">Layanan</div>
                </div>
                <div class="text-center">
                    <div class="font-bold text-yellow-600">{{ $totalBerita }}</div>
                    <div class="text-gray-500">Berita</div>
                </div>
                <div class="text-center">
                    <div class="font-bold text-purple-600">{{ $totalNavigation }}</div>
                    <div class="text-gray-500">Navigation</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
