@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-blue-700 mb-6">
    Profil Kelurahan
</h1>

<div class="bg-white rounded-xl shadow p-6 space-y-4">

    @if ($profil)

        <div>
            <strong>Nama Kelurahan:</strong>
            <p class="text-gray-700">
                {{ $profil->nama_kelurahan ?? '-' }}
            </p>
        </div>

        <div>
            <strong>Alamat:</strong>
            <p class="text-gray-700">
                {{ $profil->alamat ?? '-' }}
            </p>
        </div>

        <div>
            <strong>Visi:</strong>
            <p class="text-gray-700">
                {{ $profil->visi ?? '-' }}
            </p>
        </div>

        <div>
            <strong>Misi:</strong>
            <p class="text-gray-700">
                {{ $profil->misi ?? '-' }}
            </p>
        </div>

        <div>
            <strong>Sejarah:</strong>
            <p class="text-gray-700">
                {{ $profil->sejarah ?? '-' }}
            </p>
        </div>

        @if ($profil->struktur)
            <div>
                <strong>Struktur Organisasi:</strong>
                <img src="{{ asset('uploads/struktur/'.$profil->struktur) }}"
                     class="mt-2 max-w-md rounded shadow">
            </div>
        @endif

    @else
        <p class="text-gray-500">Profil belum tersedia</p>
    @endif

    <a href="{{ route('admin.profil.edit') }}"
       class="inline-block mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Edit Profil
    </a>

</div>
@endsection
