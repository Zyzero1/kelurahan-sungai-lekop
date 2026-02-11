{{-- GALERI KEGIATAN SECTION --}}
<section id="galeri-kegiatan" class="mb-24" data-aos="fade-up">
    <div class="flex justify-between items-end mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
            <i class="fas fa-images text-blue-800 mr-2"></i> Galeri Kegiatan
        </h2>
    </div>
    
    @if($galeriKegiatan->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @foreach($galeriKegiatan as $index => $galeriItem)
        <div class="gallery-item {{ $galeriItem->detail['kategori_galeri'] ?? 'umum' }} relative h-64 rounded-xl overflow-hidden group cursor-pointer"
            data-item-id="{{ $galeriItem->id }}"
            data-item-name="{{ $galeriItem->nama }}"
            data-item-description="{{ $galeriItem->detail['deskripsi_singkat'] ?? '' }}"
            data-galeri="{{ json_encode($galeriItem->galeri ?? []) }}"
            onclick="openGalleryViewer('{{ $galeriItem->id }}')">
            @php
            // Get image URL with fallback
            $gambarUrl = null;
            if ($galeriItem->gambar) {
                $gambarSrc = 'uploads/jelajah-lekop/' . $galeriItem->gambar;
                $fullPath = public_path(str_replace('/', DIRECTORY_SEPARATOR, $gambarSrc));
                if (file_exists($fullPath)) {
                    $gambarUrl = asset($gambarSrc);
                }
            }

            // Fallback to first gallery image or default
            if (!$gambarUrl && $galeriItem->galeri && count($galeriItem->galeri) > 0) {
                $gambarSrc = 'uploads/jelajah-lekop/' . $galeriItem->galeri[0];
                $fullPath = public_path(str_replace('/', DIRECTORY_SEPARATOR, $gambarSrc));
                if (file_exists($fullPath)) {
                    $gambarUrl = asset($gambarSrc);
                }
            }

            if (!$gambarUrl) {
                $gambarUrl = asset('images/default-galeri.jpg');
            }
            @endphp
            <img src="{{ $gambarUrl }}" alt="{{ $galeriItem->nama }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white font-bold">
                <div class="text-center">
                    <i class="fas fa-images text-2xl mb-2"></i>
                    <p>{{ $galeriItem->nama }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12">
        <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada data galeri kegiatan.</p>
        <p class="text-gray-400">Data galeri kegiatan akan segera tersedia setelah ditambahkan melalui admin panel.</p>
    </div>
    @endif
</section>
