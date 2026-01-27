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
