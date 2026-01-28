@extends('layouts.admin')



@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Profil Kelurahan</h1>



<form action="{{ route('admin.profil.update') }}"

    method="POST"

    enctype="multipart/form-data"

    class="bg-white p-6 rounded shadow space-y-4">



    @csrf

    @method('PUT')



    <input type="text"

        name="nama_kelurahan"

        class="w-full border p-2 rounded"

        placeholder="Nama Kelurahan"

        value="{{ old('nama_kelurahan', $profil->nama_kelurahan) }}">



    <textarea name="alamat" class="w-full border p-2 rounded" placeholder="Alamat">{{ old('alamat', $profil->alamat) }}</textarea>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-semibold mb-1">Nama Lurah</label>
            <input type="text" name="nama_lurah" class="w-full border p-2 rounded" placeholder="Nama Lurah" value="{{ old('nama_lurah', $profil->nama_lurah) }}">
        </div>
        <div>
            <label class="block font-semibold mb-1">NIP Lurah</label>
            <input type="text" name="nip_lurah" class="w-full border p-2 rounded" placeholder="NIP Lurah" value="{{ old('nip_lurah', $profil->nip_lurah) }}">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-semibold mb-1">Email Resmi</label>
            <input type="email" name="email" class="w-full border p-2 rounded" placeholder="Email" value="{{ old('email', $profil->email) }}">
        </div>
        <div>
            <label class="block font-semibold mb-1">Telepon/WA</label>
            <input type="text" name="telepon" class="w-full border p-2 rounded" placeholder="Telepon" value="{{ old('telepon', $profil->telepon) }}">
        </div>
    </div>

    <div>
        <label class="block font-semibold mb-1">Motto Lurah</label>
        <textarea name="motto_lurah" class="w-full border p-2 rounded" placeholder="Motto Lurah">{{ old('motto_lurah', $profil->motto_lurah) }}</textarea>
    </div>

    <div>
        <label class="block font-semibold mb-1">Foto Lurah</label>
        <input type="file" name="foto_lurah" accept="image/*" class="w-full border p-2 rounded">
        @if ($profil->foto_lurah)
        <div class="mt-3">
            <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
            <img src="{{ asset('uploads/lurah/'.$profil->foto_lurah) }}" alt="Foto Lurah" class="w-24 h-24 rounded-full object-cover border-2 border-gray-300">
        </div>
        @endif
    </div>



    <textarea name="visi" class="w-full border p-2 rounded" placeholder="Visi">{{ old('visi', $profil->visi) }}</textarea>



    <textarea name="misi" class="w-full border p-2 rounded" placeholder="Misi">{{ old('misi', $profil->misi) }}</textarea>



    <textarea name="sejarah" class="w-full border p-2 rounded" placeholder="Sejarah">{{ old('sejarah', $profil->sejarah) }}</textarea>



    <div>

        <label class="block font-semibold mb-1">

            Struktur Organisasi (JPG)

        </label>

        <input type="file" name="struktur" accept="image/*">



        @if ($profil->struktur)

        <img src="{{ asset('uploads/struktur/'.$profil->struktur) }}"

            class="mt-3 max-w-xs rounded shadow">

        @endif

    </div>



    <button type="submit"

        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">

        Simpan

    </button>

</form>

@endsection