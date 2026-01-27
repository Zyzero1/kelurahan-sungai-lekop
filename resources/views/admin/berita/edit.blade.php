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

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>
@endsection
