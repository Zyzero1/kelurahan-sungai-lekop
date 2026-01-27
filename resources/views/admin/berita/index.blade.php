@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Berita</h1>

        <a href="{{ route('admin.berita.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Berita
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
                <th class="p-2 border w-32">Gambar</th>
                <th class="p-2 border">Judul</th>
                <th class="p-2 border">Isi</th>
                <th class="p-2 border w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beritas as $berita)
            <tr class="hover:bg-gray-100">
                <td class="p-2 border text-center">
                    {{ $loop->iteration }}
                </td>
                <td>
                    @if ($berita->gambar)
                    <img
                        src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                        alt="Gambar Berita"
                        class="h-16 rounded">
                    @else
                    <span class="text-gray-400 italic">Tidak ada</span>
                    @endif
                </td>
                <td class="p-2 border font-semibold">
                    {{ $berita->judul }}
                </td>
                <td class="p-2 border">
                    {{ \Illuminate\Support\Str::limit($berita->isi, 60) }}
                </td>
                <td class="p-2 border text-center">
                    <a href="{{ route('admin.berita.edit', $berita->id) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                        Edit
                    </a>

                    <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                        method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus berita ini?')"
                            class="bg-red-600 text-white px-3 py-1 rounded text-xs">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">
                    Belum ada berita
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection