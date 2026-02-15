@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl">

    <h1 class="text-xl font-bold mb-4">Tambah Berita</h1>

    <form action="{{ route('admin.berita.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="font-semibold">Judul</label>
            <input type="text" name="judul"
                class="w-full border rounded p-2"
                required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Isi Berita</label>
            <textarea name="isi" rows="6"
                class="w-full border rounded p-2"
                required></textarea>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Tanggal</label>
            <input type="date" name="tanggal"
                class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Admin Kelurahan</label>
            <input type="text" name="admin_kelurahan"
                class="w-full border rounded p-2"
                placeholder="Nama admin kelurahan">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Kategori</label>
            <select name="kategori" class="w-full border rounded p-2">
                <option value="">Pilih Kategori</option>
                <option value="pemerintahan">Pemerintahan</option>
                <option value="kegiatan">Kegiatan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Urutan</label>
            <input type="number" name="urutan"
                class="w-full border rounded p-2"
                placeholder="0 (kosong untuk urutan otomatis)"
                min="0">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Gambar (Opsional)</label>
            <input type="file" name="gambar"
                class="w-full border rounded p-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>

</div>
@endsection