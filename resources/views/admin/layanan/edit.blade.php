@extends('layouts.admin')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Layanan</h1>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Layanan</label>
            <input type="text"
                   name="nama_layanan"
                   value="{{ old('nama_layanan', $layanan->nama_layanan) }}"
                   class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                      rows="4"
                      class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
        </div>

        <div class="flex gap-3">
            <button class="bg-blue-700 text-white px-5 py-2 rounded hover:bg-blue-800">
                Update
            </button>
            <a href="{{ route('admin.layanan.index') }}"
               class="px-5 py-2 rounded border">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
