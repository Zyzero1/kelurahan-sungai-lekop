@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Layanan</h1>

        <a href="{{ route('admin.layanan.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Layanan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-2 border w-12">No</th>
                <th class="p-2 border">Nama Layanan</th>
                <th class="p-2 border">Deskripsi</th>
                <th class="p-2 border w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($layanans as $layanan)
                <tr class="hover:bg-gray-100">
                    <td class="p-2 border text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-2 border">
                        {{ $layanan->nama_layanan }}
                    </td>
                    <td class="p-2 border">
                        {{ \Illuminate\Support\Str::limit($layanan->deskripsi, 60) }}
                    </td>
                    <td class="p-2 border text-center">
                        <a href="{{ route('admin.layanan.edit', $layanan->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                            Edit
                        </a>

                        <form action="{{ route('admin.layanan.destroy', $layanan->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus layanan ini?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        Belum ada data layanan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
