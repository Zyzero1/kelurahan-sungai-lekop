@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Berita</h1>

<form action="{{ route('admin.berita.update', $berita->id) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Judul</label>
        <input type="text" name="judul"
            value="{{ old('judul', $berita->judul) }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Isi Berita</label>
        <textarea name="isi" class="w-full border rounded p-2">
        {{ old('isi', $berita->isi) }}
        </textarea>
    </div>

    <div class="mb-4">
        <label>Tanggal</label>
        <input type="date" name="tanggal"
            value="{{ old('tanggal', $berita->tanggal) }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Admin Kelurahan</label>
        <input type="text" name="admin_kelurahan"
            value="{{ old('admin_kelurahan', $berita->admin_kelurahan) }}"
            class="w-full border rounded p-2"
            placeholder="Nama admin kelurahan">
    </div>

    <div class="mb-4">
        <label>Kategori</label>
        <select name="kategori" class="w-full border rounded p-2">
            <option value="">Pilih Kategori</option>
            <option value="pemerintahan" {{ old('kategori', $berita->kategori) == 'pemerintahan' ? 'selected' : '' }}>Pemerintahan</option>
            <option value="kegiatan" {{ old('kategori', $berita->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Urutan</label>
        <input type="number" name="urutan"
            value="{{ old('urutan', $berita->urutan ?? 0) }}"
            class="w-full border rounded p-2"
            placeholder="0 (kosong untuk urutan otomatis)"
            min="0"
            max="999">
    </div>

    <div class="mb-4">
        <label>Gambar Lama</label><br>

        @if ($berita->gambar)
        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
            alt="Gambar Berita"
            style="max-width:200px">
        @endif

    </div>

    <div class="mb-4">
        <label>Ganti Gambar</label>
        <input type="file" name="gambar" class="border p-2">
    </div>

    <div class="flex gap-2">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
        <a href="{{ route('admin.berita.index') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
            Batal
        </a>
    </div>

</form>
@endsection