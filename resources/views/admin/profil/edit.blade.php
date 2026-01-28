@extends('layouts.admin')



@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Profil Kelurahan</h1>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
    <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



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

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-semibold mb-1">Jumlah RT</label>
            <input type="number" name="jumlah_rt" class="w-full border p-2 rounded" placeholder="Jumlah RT" value="{{ old('jumlah_rt', $profil->jumlah_rt) }}">
            <p class="text-sm text-gray-500 mt-1">Total jumlah Rukun Tetangga</p>
        </div>
        <div>
            <label class="block font-semibold mb-1">Jumlah RW</label>
            <input type="number" name="jumlah_rw" class="w-full border p-2 rounded" placeholder="Jumlah RW" value="{{ old('jumlah_rw', $profil->jumlah_rw) }}">
            <p class="text-sm text-gray-500 mt-1">Total jumlah Rukun Warga</p>
        </div>
    </div>

    <!-- Demografi Penduduk Section -->
    <div class="border-t pt-6 mt-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <i class="fas fa-chart-pie text-blue-600"></i>
            Demografi Penduduk
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block font-semibold mb-1">Jumlah Laki-laki</label>
                <input type="number" name="jumlah_laki_laki" class="w-full border p-2 rounded" placeholder="Jumlah Laki-laki" value="{{ old('jumlah_laki_laki', $profil->jumlah_laki_laki) }}">
                <p class="text-sm text-gray-500 mt-1">Jumlah penduduk laki-laki</p>
            </div>
            <div>
                <label class="block font-semibold mb-1">Jumlah Perempuan</label>
                <input type="number" name="jumlah_perempuan" class="w-full border p-2 rounded" placeholder="Jumlah Perempuan" value="{{ old('jumlah_perempuan', $profil->jumlah_perempuan) }}">
                <p class="text-sm text-gray-500 mt-1">Jumlah penduduk perempuan</p>
            </div>
            <div>
                <label class="block font-semibold mb-1">Jumlah KK</label>
                <input type="number" name="jumlah_kk" class="w-full border p-2 rounded" placeholder="Jumlah KK" value="{{ old('jumlah_kk', $profil->jumlah_kk) }}">
                <p class="text-sm text-gray-500 mt-1">Jumlah Kepala Keluarga</p>
            </div>
        </div>

        <div>
            <label class="block font-semibold mb-1">Deskripsi Demografi</label>
            <textarea name="demografi_deskripsi" rows="3" class="w-full border p-2 rounded" placeholder="Deskripsi data demografi penduduk">{{ old('demografi_deskripsi', $profil->demografi_deskripsi) }}</textarea>
            <p class="text-sm text-gray-500 mt-1">Penjelasan tentang komposisi penduduk di kelurahan</p>
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