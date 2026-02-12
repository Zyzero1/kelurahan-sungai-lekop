@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-blue-700">Edit Profil Kelurahan</h1>
    <a href="{{ route('admin.profil.index') }}" class="text-sm text-blue-600 hover:underline">Kembali</a>
</div>

@if (session('success'))
<div class="mb-4 rounded-lg bg-green-50 border border-green-200 p-4 text-green-800">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4 text-red-800">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Pimpinan & Identitas</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lurah</label>
                <input type="text" name="nama_lurah" value="{{ old('nama_lurah', $profil->nama_lurah) }}" class="w-full border rounded p-2">
                @error('nama_lurah')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NIP Lurah</label>
                <input type="text" name="nip_lurah" value="{{ old('nip_lurah', $profil->nip_lurah) }}" class="w-full border rounded p-2">
                @error('nip_lurah')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Resmi</label>
                <input type="text" name="email" value="{{ old('email', $profil->email) }}" class="w-full border rounded p-2">
                @error('email')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Motto Lurah</label>
                <textarea name="motto_lurah" rows="3" class="w-full border rounded p-2">{{ old('motto_lurah', $profil->motto_lurah) }}</textarea>
                @error('motto_lurah')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Lurah</label>
                <input type="file" name="foto_lurah" accept="image/*" class="block w-full">
                @error('foto_lurah')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
                @if ($profil->foto_lurah)
                <img src="{{ asset('uploads/lurah/'.$profil->foto_lurah) }}" class="mt-3 w-28 h-28 rounded-full object-cover border" alt="Foto Lurah">
                @endif
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Informasi Umum</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelurahan</label>
                <input type="text" name="nama_kelurahan" value="{{ old('nama_kelurahan', $profil->nama_kelurahan) }}" class="w-full border rounded p-2">
                @error('nama_kelurahan')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kode Pos</label>
                <input type="text" name="kode_pos" value="{{ old('kode_pos', $profil->kode_pos) }}" class="w-full border rounded p-2">
                @error('kode_pos')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Luas Wilayah (Ha)</label>
                <input type="text" name="luas_wilayah" value="{{ old('luas_wilayah', $profil->luas_wilayah) }}" class="w-full border rounded p-2">
                @error('luas_wilayah')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah RW</label>
                    <input type="number" min="0" name="jumlah_rw" value="{{ old('jumlah_rw', $profil->jumlah_rw) }}" class="w-full border rounded p-2">
                    @error('jumlah_rw')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah RT</label>
                    <input type="number" min="0" name="jumlah_rt" value="{{ old('jumlah_rt', $profil->jumlah_rt) }}" class="w-full border rounded p-2">
                    @error('jumlah_rt')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full border rounded p-2">{{ old('alamat', $profil->alamat) }}</textarea>
                @error('alamat')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Demografi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Laki-laki</label>
                <input type="number" min="0" name="jumlah_laki_laki" value="{{ old('jumlah_laki_laki', $profil->jumlah_laki_laki) }}" class="w-full border rounded p-2">
                @error('jumlah_laki_laki')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Perempuan</label>
                <input type="number" min="0" name="jumlah_perempuan" value="{{ old('jumlah_perempuan', $profil->jumlah_perempuan) }}" class="w-full border rounded p-2">
                @error('jumlah_perempuan')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah KK</label>
                <input type="number" min="0" name="jumlah_kk" value="{{ old('jumlah_kk', $profil->jumlah_kk) }}" class="w-full border rounded p-2">
                @error('jumlah_kk')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Penduduk</label>
                <input type="number" min="0" name="jumlah_penduduk" value="{{ old('jumlah_penduduk', $profil->jumlah_penduduk) }}" class="w-full border rounded p-2">
                @error('jumlah_penduduk')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="lg:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Demografi</label>
                <textarea name="demografi_deskripsi" rows="4" class="w-full border rounded p-2">{{ old('demografi_deskripsi', $profil->demografi_deskripsi) }}</textarea>
                @error('demografi_deskripsi')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Visi & Misi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
                <textarea name="visi" rows="5" class="w-full border rounded p-2">{{ old('visi', $profil->visi) }}</textarea>
                @error('visi')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Misi (pisahkan dengan baris baru)</label>
                <textarea name="misi" rows="5" class="w-full border rounded p-2">{{ old('misi', $profil->misi) }}</textarea>
                @error('misi')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Sejarah</h2>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Sejarah (pisahkan paragraf dengan baris baru)</label>
            <textarea name="sejarah" rows="8" class="w-full border rounded p-2">{{ old('sejarah', $profil->sejarah) }}</textarea>
            @error('sejarah')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Struktur Organisasi</h2>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Struktur</label>
            <input type="file" name="struktur" accept="image/*" class="block w-full">
            @error('struktur')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
            @if ($profil->struktur)
            <img src="{{ asset('uploads/struktur/'.$profil->struktur) }}" class="mt-3 max-w-md rounded shadow border" alt="Struktur Organisasi">
            @endif
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
    </div>
</form>

@endsection