@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-blue-700">Profil Kelurahan</h1>
    <a href="{{ route('admin.profil.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit Profil</a>
</div>

@if (!$profil)
<div class="bg-white rounded-xl shadow p-6">
    <p class="text-gray-600">Profil belum tersedia.</p>
</div>
@else
<div class="space-y-6">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Pimpinan & Identitas</h2>
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-56">
                @if($profil->foto_lurah)
                <img src="{{ asset('uploads/lurah/'.$profil->foto_lurah) }}" alt="Foto Lurah" class="w-40 h-40 rounded-full object-cover border mx-auto md:mx-0">
                @else
                <div class="w-40 h-40 rounded-full bg-gray-100 border flex items-center justify-center text-gray-400 mx-auto md:mx-0">-
                </div>
                @endif
            </div>
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-gray-500 uppercase">Nama Lurah</div>
                        <div class="font-semibold">{{ $profil->nama_lurah ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 uppercase">NIP</div>
                        <div class="font-semibold">{{ $profil->nip_lurah ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 uppercase">Email</div>
                        <div class="font-semibold">{{ $profil->email ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 uppercase">Telepon/WA</div>
                        <div class="font-semibold">{{ $profil->telepon ?? '-' }}</div>
                    </div>
                    <div class="md:col-span-2">
                        <div class="text-xs text-gray-500 uppercase">Motto</div>
                        <div class="text-gray-700">{{ $profil->motto_lurah ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Informasi Umum</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <div class="text-xs text-gray-500 uppercase">Nama Kelurahan</div>
                <div class="font-semibold">{{ $profil->nama_kelurahan ?? '-' }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500 uppercase">Kode Pos</div>
                <div class="font-semibold">{{ $profil->kode_pos ?? '-' }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500 uppercase">Luas Wilayah</div>
                <div class="font-semibold">{{ $profil->luas_wilayah ?? '-' }}</div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="text-xs text-gray-500 uppercase">Jumlah RW</div>
                    <div class="font-semibold">{{ $profil->jumlah_rw ?? '0' }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500 uppercase">Jumlah RT</div>
                    <div class="font-semibold">{{ $profil->jumlah_rt ?? '0' }}</div>
                </div>
            </div>
            <div class="md:col-span-2">
                <div class="text-xs text-gray-500 uppercase">Alamat</div>
                <div class="text-gray-700">{{ $profil->alamat ?? '-' }}</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Demografi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-slate-50 border rounded-lg p-4">
                <div class="text-xs text-gray-500 uppercase">Laki-laki</div>
                <div class="text-xl font-bold text-blue-700">{{ number_format($profil->jumlah_laki_laki ?? 0, 0, ',', '.') }}</div>
            </div>
            <div class="bg-slate-50 border rounded-lg p-4">
                <div class="text-xs text-gray-500 uppercase">Perempuan</div>
                <div class="text-xl font-bold text-pink-700">{{ number_format($profil->jumlah_perempuan ?? 0, 0, ',', '.') }}</div>
            </div>
            <div class="bg-slate-50 border rounded-lg p-4">
                <div class="text-xs text-gray-500 uppercase">Jumlah KK</div>
                <div class="text-xl font-bold text-green-700">{{ number_format($profil->jumlah_kk ?? 0, 0, ',', '.') }}</div>
            </div>
            <div class="md:col-span-3">
                <div class="text-xs text-gray-500 uppercase">Deskripsi</div>
                <div class="text-gray-700">{{ $profil->demografi_deskripsi ?? '-' }}</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Data Penduduk Berdasarkan Kelompok Umur</h2>
            <details class="group">
                <summary class="list-none cursor-pointer bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Data</summary>
                <div class="mt-3 bg-slate-50 border rounded p-4">
                    <form action="{{ route('admin.profil.population-by-age.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-3">
                        @csrf
                        <input type="text" name="age_group" placeholder="Kelompok umur" class="border rounded px-3 py-2" required>
                        <input type="number" name="male_count" placeholder="Laki-laki" class="border rounded px-3 py-2" min="0" required>
                        <input type="number" name="female_count" placeholder="Perempuan" class="border rounded px-3 py-2" min="0" required>
                        <input type="number" name="sort_order" placeholder="Urutan" class="border rounded px-3 py-2" min="0">
                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </details>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-slate-100 text-slate-700">
                        <th class="text-left p-3">Kelompok Umur</th>
                        <th class="text-right p-3">Laki-laki</th>
                        <th class="text-right p-3">Perempuan</th>
                        <th class="text-right p-3">Total</th>
                        <th class="text-right p-3">Urutan</th>
                        <th class="text-right p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(($populations ?? collect()) as $population)
                    <tr class="border-t">
                        <td class="p-3">{{ $population->age_group }}</td>
                        <td class="p-3 text-right">{{ number_format($population->male_count, 0, ',', '.') }}</td>
                        <td class="p-3 text-right">{{ number_format($population->female_count, 0, ',', '.') }}</td>
                        <td class="p-3 text-right">{{ number_format($population->total_count, 0, ',', '.') }}</td>
                        <td class="p-3 text-right">{{ $population->sort_order }}</td>
                        <td class="p-3">
                            <div class="flex justify-end gap-2">
                                <details class="group">
                                    <summary class="list-none cursor-pointer px-3 py-1 rounded border hover:bg-slate-50">Edit</summary>
                                    <div class="mt-2 bg-slate-50 border rounded p-3">
                                        <form action="{{ route('admin.profil.population-by-age.update', $population->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="age_group" value="{{ $population->age_group }}" class="border rounded px-3 py-2" required>
                                            <input type="number" name="male_count" value="{{ $population->male_count }}" class="border rounded px-3 py-2" min="0" required>
                                            <input type="number" name="female_count" value="{{ $population->female_count }}" class="border rounded px-3 py-2" min="0" required>
                                            <input type="number" name="sort_order" value="{{ $population->sort_order }}" class="border rounded px-3 py-2" min="0">
                                            <div class="flex items-center justify-end">
                                                <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </details>
                                <form action="{{ route('admin.profil.population-by-age.destroy', $population->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded border border-red-300 text-red-700 hover:bg-red-50">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="border-t">
                        <td colspan="6" class="p-4 text-center text-gray-600">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Visi & Misi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="text-sm font-semibold mb-2">Visi</div>
                <div class="text-gray-700 whitespace-pre-line">{{ $profil->visi ?? '-' }}</div>
            </div>
            <div>
                <div class="text-sm font-semibold mb-2">Misi</div>
                <div class="text-gray-700 whitespace-pre-line">{{ $profil->misi ?? '-' }}</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Sejarah</h2>
        <div class="text-gray-700 whitespace-pre-line">{{ $profil->sejarah ?? '-' }}</div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Struktur Organisasi</h2>
        @if($profil->struktur)
        <img src="{{ asset('uploads/struktur/'.$profil->struktur) }}" class="max-w-3xl w-full rounded border" alt="Struktur Organisasi">
        @else
        <div class="text-gray-600">Belum ada gambar struktur.</div>
        @endif
    </div>
</div>
@endif

@endsection