@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Jelajah Lekop</h1>

        <div class="flex gap-2">
            <!-- Filter Tipe -->
            <select id="filterTipe" class="border rounded px-3 py-2 text-sm" onchange="filterData()">
                <option value="all" {{ $tipe === 'all' ? 'selected' : '' }}>Semua Tipe</option>
                <option value="sentra_industri" {{ $tipe === 'sentra_industri' ? 'selected' : '' }}>Sentra Industri</option>
                <option value="fasilitas" {{ $tipe === 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                <option value="umkm" {{ $tipe === 'umkm' ? 'selected' : '' }}>UMKM</option>
                <option value="galeri_kegiatan" {{ $tipe === 'galeri_kegiatan' ? 'selected' : '' }}>Galeri Kegiatan</option>
                <option value="hero" {{ $tipe === 'hero' ? 'selected' : '' }}>Hero Banner</option>
            </select>

            <!-- Filter Kategori (untuk fasilitas dan galeri) -->
            @if($tipe === 'fasilitas' || $tipe === 'galeri_kegiatan')
            <select id="filterKategori" class="border rounded px-3 py-2 text-sm" onchange="filterData()">
                <option value="all" {{ $kategori === 'all' ? 'selected' : '' }}>Semua Kategori</option>
                @if($tipe === 'fasilitas')
                <option value="puskesmas" {{ $kategori === 'puskesmas' ? 'selected' : '' }}>Puskesmas</option>
                <option value="posyandu" {{ $kategori === 'posyandu' ? 'selected' : '' }}>Posyandu</option>
                <option value="sd" {{ $kategori === 'sd' ? 'selected' : '' }}>SD</option>
                <option value="smp" {{ $kategori === 'smp' ? 'selected' : '' }}>SMP</option>
                <option value="sma" {{ $kategori === 'sma' ? 'selected' : '' }}>SMA/SMK/MAN</option>
                <option value="masjid" {{ $kategori === 'masjid' ? 'selected' : '' }}>Masjid</option>
                <option value="surau" {{ $kategori === 'surau' ? 'selected' : '' }}>Surau</option>
                <option value="tpa" {{ $kategori === 'tpa' ? 'selected' : '' }}>TPA/TPQ</option>
                @elseif($tipe === 'galeri_kegiatan')
                <option value="pemerintahan" {{ $kategori === 'pemerintahan' ? 'selected' : '' }}>Kegiatan Pemerintahan</option>
                <option value="kemasyarakatan" {{ $kategori === 'kemasyarakatan' ? 'selected' : '' }}>Kegiatan Kemasyarakatan</option>
                <option value="pembangunan" {{ $kategori === 'pembangunan' ? 'selected' : '' }}>Kegiatan Pembangunan</option>
                <option value="umkm" {{ $kategori === 'umkm' ? 'selected' : '' }}>Kegiatan UMKM</option>
                @endif
            </select>
            @endif

            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe={{ $tipe }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>Tambah Data
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <!-- Hero Banner Section -->
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4 text-indigo-800">
            <i class="fas fa-banner mr-2"></i>Hero Banner
        </h2>
        @if(isset($heroData))
        <div class="border rounded-lg p-4 bg-indigo-50">
            <div class="flex gap-4">
                @if($heroData->hero_image)
                <img src="{{ $heroData->hero_image_url }}" alt="Hero Banner" class="w-48 h-32 object-cover rounded">
                @else
                <div class="w-48 h-32 bg-gray-200 rounded flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-2xl"></i>
                </div>
                @endif
                <div class="flex-1">
                    <h3 class="font-bold text-lg mb-2">{{ $heroData->nama }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($heroData->hero_content ?? $heroData->deskripsi, 150) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs px-2 py-1 rounded {{ $heroData->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $heroData->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        <div class="flex gap-1">
                            <a href="{{ route('admin.jelajah-lekop.edit', $heroData->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600">
                                <i class="fas fa-edit mr-1"></i>Edit Banner
                            </a>
                            <form action="{{ route('admin.jelajah-lekop.destroy', $heroData->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus hero banner ini?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <i class="fas fa-plus-circle text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-600 mb-4">Belum ada Hero Banner</p>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=hero"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>Tambah Hero Banner
            </a>
        </div>
        @endif
    </div>

    <!-- Sentra Industri Section -->
    @if(isset($groupedData['sentra_industri']) && $groupedData['sentra_industri']->count() > 0)
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-blue-800">
                <i class="fas fa-industry mr-2"></i>Sentra Industri
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=sentra_industri"
                class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                <i class="fas fa-plus mr-1"></i>Tambah Sentra Industri
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($groupedData['sentra_industri'] as $item)
            <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow">
                @if($item->gambar)
                <img src="{{ $item->gambar_url }}" alt="{{ $item->nama }}" class="w-full h-32 object-cover rounded mb-3">
                @endif
                <h3 class="font-bold text-lg mb-2">{{ $item->nama }}</h3>
                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($item->deskripsi, 100) }}</p>
                @if($item->lokasi)
                <p class="text-xs text-gray-500 mb-3">
                    <i class="fas fa-map-marker-alt mr-1"></i>{{ $item->lokasi }}
                </p>
                @endif
                <div class="flex justify-between items-center">
                    <span class="text-xs px-2 py-1 rounded {{ $item->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $item->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                    </span>
                    <div class="flex gap-1">
                        <a href="{{ route('admin.jelajah-lekop.edit', $item->id) }}"
                            class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.jelajah-lekop.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')"
                                class="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-blue-800">
                <i class="fas fa-industry mr-2"></i>Sentra Industri
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=sentra_industri"
                class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                <i class="fas fa-plus mr-1"></i>Tambah Sentra Industri
            </a>
        </div>
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <i class="fas fa-industry text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-600 mb-4">Belum ada data Sentra Industri</p>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=sentra_industri"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>Tambah Data Pertama
            </a>
        </div>
    </div>
    @endif

    <!-- Fasilitas Section -->
    @if(isset($groupedData['fasilitas']) && $groupedData['fasilitas']->count() > 0)
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-green-800">
                <i class="fas fa-building mr-2"></i>Fasilitas
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=fasilitas"
                class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">
                <i class="fas fa-plus mr-1"></i>Tambah Fasilitas
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($groupedData['fasilitas'] as $item)
            <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow">
                @if($item->gambar)
                <img src="{{ $item->gambar_url }}" alt="{{ $item->nama }}" class="w-full h-32 object-cover rounded mb-3">
                @endif
                <h3 class="font-bold text-lg mb-2">{{ $item->nama }}</h3>
                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($item->deskripsi, 100) }}</p>
                @if($item->kategori)
                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded mb-3 inline-block">
                    {{ $item->label_kategori }}
                </span>
                @endif
                @if($item->lokasi)
                <p class="text-xs text-gray-500 mb-3">
                    <i class="fas fa-map-marker-alt mr-1"></i>{{ $item->lokasi }}
                </p>
                @endif
                <div class="flex justify-between items-center">
                    <span class="text-xs px-2 py-1 rounded {{ $item->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $item->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                    </span>
                    <div class="flex gap-1">
                        <a href="{{ route('admin.jelajah-lekop.edit', $item->id) }}"
                            class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.jelajah-lekop.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')"
                                class="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-green-800">
                <i class="fas fa-building mr-2"></i>Fasilitas
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=fasilitas"
                class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">
                <i class="fas fa-plus mr-1"></i>Tambah Fasilitas
            </a>
        </div>
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <i class="fas fa-building text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-600 mb-4">Belum ada data Fasilitas</p>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=fasilitas"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-plus mr-2"></i>Tambah Data Pertama
            </a>
        </div>
    </div>
    @endif

    <!-- UMKM Section -->
    @if(isset($groupedData['umkm']) && $groupedData['umkm']->count() > 0)
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-orange-800">
                <i class="fas fa-store mr-2"></i>UMKM Lokal
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=umkm"
                class="bg-orange-600 text-white px-3 py-1 rounded text-sm hover:bg-orange-700">
                <i class="fas fa-plus mr-1"></i>Tambah UMKM
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($groupedData['umkm'] as $item)
            <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow">
                @if($item->gambar)
                <img src="{{ $item->gambar_url }}" alt="{{ $item->nama }}" class="w-full h-32 object-cover rounded mb-3">
                @endif
                <h3 class="font-bold text-lg mb-2">{{ $item->nama }}</h3>
                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($item->deskripsi, 100) }}</p>
                @if($item->lokasi)
                <p class="text-xs text-gray-500 mb-3">
                    <i class="fas fa-map-marker-alt mr-1"></i>{{ $item->lokasi }}
                </p>
                @endif
                @if($item->detail && isset($item->detail['harga']))
                <p class="text-xs font-bold text-orange-600 mb-3">{{ $item->detail['harga'] }}</p>
                @endif
                <div class="flex justify-between items-center">
                    <span class="text-xs px-2 py-1 rounded {{ $item->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $item->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                    </span>
                    <div class="flex gap-1">
                        <a href="{{ route('admin.jelajah-lekop.edit', $item->id) }}"
                            class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.jelajah-lekop.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')"
                                class="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-orange-800">
                <i class="fas fa-store mr-2"></i>UMKM Lokal
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=umkm"
                class="bg-orange-600 text-white px-3 py-1 rounded text-sm hover:bg-orange-700">
                <i class="fas fa-plus mr-1"></i>Tambah UMKM
            </a>
        </div>
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <i class="fas fa-store text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-600 mb-4">Belum ada data UMKM</p>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=umkm"
                class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
                <i class="fas fa-plus mr-2"></i>Tambah Data Pertama
            </a>
        </div>
    </div>
    @endif

    <!-- Galeri Kegiatan Section -->
    @if(isset($groupedData['galeri_kegiatan']) && $groupedData['galeri_kegiatan']->count() > 0)
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-purple-800">
                <i class="fas fa-images mr-2"></i>Galeri Kegiatan
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=galeri_kegiatan"
                class="bg-purple-600 text-white px-3 py-1 rounded text-sm hover:bg-purple-700">
                <i class="fas fa-plus mr-1"></i>Tambah Galeri
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($groupedData['galeri_kegiatan'] as $item)
            <div class="border rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                @if($item->gambar)
                <img src="{{ $item->gambar_url }}" alt="{{ $item->nama }}" class="w-full h-32 object-cover">
                @endif
                <div class="p-3">
                    <h3 class="font-bold text-sm mb-2">{{ $item->nama }}</h3>
                    @if($item->kategori)
                    <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded mb-2 inline-block">
                        {{ $item->label_kategori }}
                    </span>
                    @endif
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs px-2 py-1 rounded {{ $item->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $item->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        <div class="flex gap-1">
                            <a href="{{ route('admin.jelajah-lekop.edit', $item->id) }}"
                                class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.jelajah-lekop.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus data ini?')"
                                    class="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-purple-800">
                <i class="fas fa-images mr-2"></i>Galeri Kegiatan
            </h2>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=galeri_kegiatan"
                class="bg-purple-600 text-white px-3 py-1 rounded text-sm hover:bg-purple-700">
                <i class="fas fa-plus mr-1"></i>Tambah Galeri
            </a>
        </div>
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <i class="fas fa-images text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-600 mb-4">Belum ada data Galeri Kegiatan</p>
            <a href="{{ route('admin.jelajah-lekop.create') }}?tipe=galeri_kegiatan"
                class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                <i class="fas fa-plus mr-2"></i>Tambah Data Pertama
            </a>
        </div>
    </div>
    @endif

    @if($groupedData->isEmpty())
    <div class="text-center py-12 text-gray-500">
        <i class="fas fa-inbox text-4xl mb-4"></i>
        <p class="text-lg">Belum ada data Jelajah Lekop</p>
        <p class="text-sm mt-2">Silakan tambah data baru untuk memulai</p>
    </div>
    @endif

</div>
@endsection

@push('scripts')
<script>
    function filterData() {
        const tipe = document.getElementById('filterTipe').value;
        const kategori = document.getElementById('filterKategori')?.value || 'all';

        let url = new URL(window.location.href);
        url.searchParams.set('tipe', tipe);
        url.searchParams.set('kategori', kategori);

        window.location.href = url.toString();
    }
</script>
@endpush