@extends('layouts.admin')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-lg shadow">

    <h1 class="text-xl font-semibold mb-6">Tambah Layanan</h1>

    <form action="{{ route('admin.layanan.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Nama Layanan</label>
            <input type="text"
                name="nama_layanan"
                required
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi"
                required
                rows="4"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"></textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit"
                class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">
                Simpan
            </button>

            <a href="{{ route('admin.layanan.index') }}"
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                Kembali
            </a>
        </div>
    </form>

</div>
@endsection