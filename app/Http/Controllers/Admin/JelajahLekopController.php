<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JelajahLekop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JelajahLekopController extends Controller
{
    public function index(Request $request)
    {
        $tipe = $request->get('tipe', 'all');
        $kategori = $request->get('kategori', 'all');

        $query = JelajahLekop::query();

        if ($tipe !== 'all') {
            $query->tipe($tipe);
        }

        if ($kategori !== 'all') {
            $query->kategori($kategori);
        }

        $jelajahLekops = $query->urut()->get();

        // Group by tipe untuk display
        $groupedData = $jelajahLekops->groupBy('tipe');

        // Get hero data (tipe khusus untuk hero)
        $heroData = JelajahLekop::where('tipe', 'hero')->first();

        return view('admin.jelajah-lekop.index', compact('groupedData', 'tipe', 'kategori', 'heroData'));
    }

    public function create(Request $request)
    {
        $tipe = $request->get('tipe', 'sentra_industri');
        $kategoriOptions = $this->getKategoriOptions($tipe);

        return view('admin.jelajah-lekop.create', compact('tipe', 'kategoriOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:sentra_industri,fasilitas,umkm,galeri_kegiatan,hero',
            'kategori' => 'nullable|string',
            'nama' => 'required_unless:tipe,hero|string|max:255',
            'deskripsi' => 'required_unless:tipe,hero|string',
            'lokasi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'hero_content' => 'nullable|string',
            'galeri.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'remove_images' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
            'urutan' => 'nullable|integer|min:0',
            // Detail fields berdasarkan tipe
            'detail.ikon' => 'nullable|string',
            'detail.highlight' => 'nullable|string',
            'detail.lokasi_spesifik' => 'nullable|string',
            'detail.produk_unggulan' => 'nullable|string',
            'detail.warna_label' => 'nullable|string',
            'detail.kontak' => 'nullable|string',
            'detail.jam_operasional' => 'nullable|string',
            'detail.badge' => 'nullable|string',
            'detail.badge_color' => 'nullable|string',
            'detail.produk' => 'nullable|string',
            'detail.harga' => 'nullable|string',
            'detail.pemilik' => 'nullable|string',
            'detail.telepon' => 'nullable|string',
            'detail.tahun_berdiri' => 'nullable|string',
            'detail.keunikan' => 'nullable|string',
            'detail.kategori_galeri' => 'nullable|string',
            'detail.tanggal' => 'nullable|string',
            'detail.deskripsi_singkat' => 'nullable|string',
        ]);

        $data = $request->except(['gambar', 'galeri', 'remove_images']);

        // Handle upload gambar utama
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug($request->nama ?? 'image') . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        // Handle upload hero image
        if ($request->hasFile('hero_image')) {
            $heroImage = $request->file('hero_image');
            $heroImageName = time() . '_hero_' . Str::slug($request->nama ?? 'hero') . '_' . uniqid() . '.' . $heroImage->getClientOriginalExtension();
            $heroImage->move(public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop'), $heroImageName);
            $data['hero_image'] = $heroImageName;
        }

        // Handle upload galeri
        Log::info('=== GALERI DEBUG ===');
        Log::info('Request tipe: ' . $request->tipe);
        Log::info('Has gallery files: ' . ($request->hasFile('galeri') ? 'Yes' : 'No'));
        if ($request->hasFile('galeri')) {
            Log::info('Gallery files count: ' . count($request->file('galeri')));

            $galeriNames = [];
            $existingGaleri = $data['galeri'] ?? [];

            // For fasilitas type, limit to 2 images
            $galleryFiles = $request->file('galeri');
            if ($request->tipe === 'fasilitas' && count($galleryFiles) > 2) {
                $galleryFiles = array_slice($galleryFiles, 0, 2);
                Log::info('Limited fasilitas gallery to 2 files');
            }

            foreach ($galleryFiles as $index => $gambar) {
                $galeriName = time() . '_' . $index . '_' . Str::slug($request->nama ?? 'gallery') . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop'), $galeriName);
                $galeriNames[] = $galeriName;
                Log::info('Added gallery image: ' . $galeriName);
            }

            // Merge new images with existing ones
            $data['galeri'] = array_merge($existingGaleri, $galeriNames);
            Log::info('Galeri after merge:', $data['galeri']);
        } else {
            // Keep existing gallery if no new images uploaded
            $data['galeri'] = [];
            Log::info('No new gallery files uploaded');
        }

        // Handle upload fasilitas galeri (for fasilitas type) - REMOVED
        // Now using main galeri field with limit
        Log::info('Fasilitas galeri handling moved to main galeri field');

        // Clean detail data
        $data['detail'] = array_filter($data['detail'] ?? []);

        // Convert comma-separated strings to arrays for specific fields
        if (isset($data['detail']['produk_unggulan']) && is_string($data['detail']['produk_unggulan'])) {
            $data['detail']['produk_unggulan'] = array_map('trim', explode(',', $data['detail']['produk_unggulan']));
        }

        if (isset($data['detail']['produk']) && is_string($data['detail']['produk'])) {
            $data['detail']['produk'] = array_map('trim', explode(',', $data['detail']['produk']));
        }

        JelajahLekop::create($data);

        return redirect()
            ->route('admin.jelajah-lekop.index', ['tipe' => $request->tipe])
            ->with('success', 'Data Jelajah Lekop berhasil ditambahkan!');
    }

    public function edit(JelajahLekop $jelajahLekop)
    {
        $tipe = $jelajahLekop->tipe;
        $kategoriOptions = $this->getKategoriOptions($tipe);

        return view('admin.jelajah-lekop.edit', compact('jelajahLekop', 'tipe', 'kategoriOptions'));
    }

    public function update(Request $request, JelajahLekop $jelajahLekop)
    {
        $request->validate([
            'tipe' => 'required|in:sentra_industri,fasilitas,umkm,galeri_kegiatan,hero',
            'kategori' => 'nullable|string',
            'nama' => 'required_unless:tipe,hero|string|max:255',
            'deskripsi' => 'required_unless:tipe,hero|string',
            'lokasi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'hero_content' => 'nullable|string',
            'galeri.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'remove_images' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
            'urutan' => 'nullable|integer|min:0',
            // Detail fields berdasarkan tipe
            'detail.ikon' => 'nullable|string',
            'detail.highlight' => 'nullable|string',
            'detail.lokasi_spesifik' => 'nullable|string',
            'detail.produk_unggulan' => 'nullable|string',
            'detail.warna_label' => 'nullable|string',
            'detail.kontak' => 'nullable|string',
            'detail.jam_operasional' => 'nullable|string',
            'detail.badge' => 'nullable|string',
            'detail.badge_color' => 'nullable|string',
            'detail.produk' => 'nullable|string',
            'detail.harga' => 'nullable|string',
            'detail.pemilik' => 'nullable|string',
            'detail.telepon' => 'nullable|string',
            'detail.tahun_berdiri' => 'nullable|string',
            'detail.keunikan' => 'nullable|string',
            'detail.kategori_galeri' => 'nullable|string',
            'detail.tanggal' => 'nullable|string',
            'detail.deskripsi_singkat' => 'nullable|string',
        ]);

        $data = $request->except(['gambar', 'galeri', 'remove_images']);

        // Debug: Log all request data and files
        Log::info('=== UPDATE HERO DEBUG ===');
        Log::info('Request all data:', $request->all());
        Log::info('Request all files:', $request->allFiles());
        Log::info('Request tipe: ' . $request->tipe);
        Log::info('Request nama: ' . ($request->nama ?? 'NULL'));
        Log::info('Request deskripsi: ' . ($request->deskripsi ?? 'NULL'));
        Log::info('Request hero_content: ' . ($request->hero_content ?? 'NULL'));
        Log::info('Initial data array:', $data);

        // Special handling for hero type
        if ($request->tipe === 'hero') {
            // For hero type, get nama and deskripsi from request or use existing values
            $data['nama'] = $request->nama ?? $jelajahLekop->nama;
            $data['deskripsi'] = $request->deskripsi ?? $jelajahLekop->deskripsi;
            Log::info('After hero handling - nama: ' . $data['nama']);
            Log::info('After hero handling - deskripsi: ' . $data['deskripsi']);
        }

        // Handle upload gambar utama
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($jelajahLekop->gambar) {
                $oldImagePath = public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $jelajahLekop->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug($request->nama ?? 'image') . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        // Handle upload hero image
        if ($request->hasFile('hero_image')) {
            // Delete old hero image
            if ($jelajahLekop->hero_image) {
                $oldHeroImagePath = public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $jelajahLekop->hero_image);
                if (file_exists($oldHeroImagePath)) {
                    unlink($oldHeroImagePath);
                }
            }

            $heroImage = $request->file('hero_image');
            $heroImageName = time() . '_hero_' . Str::slug($data['nama'] ?? 'hero') . '_' . uniqid() . '.' . $heroImage->getClientOriginalExtension();
            $heroImage->move(public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop'), $heroImageName);
            $data['hero_image'] = $heroImageName;
        }

        // Handle upload galeri
        Log::info('=== GALERI DEBUG ===');
        Log::info('Has gallery files: ' . ($request->hasFile('galeri') ? 'Yes' : 'No'));
        if ($request->hasFile('galeri')) {
            Log::info('Gallery files count: ' . count($request->file('galeri')));
        }
        Log::info('Remove images: ' . ($request->remove_images ?? 'None'));
        Log::info('Existing galeri:', $jelajahLekop->galeri ?? []);

        if ($request->hasFile('galeri')) {
            $galeriNames = [];
            $existingGaleri = $jelajahLekop->galeri ?? [];

            Log::info('Tipe: ' . $request->tipe);
            Log::info('Existing galeri count: ' . count($existingGaleri));
            Log::info('New gallery files count: ' . count($request->file('galeri')));

            // For fasilitas, replace all existing images with new ones
            // For other types, you can choose to replace or append based on your needs
            $replaceMode = $request->input('galeri_mode', 'replace'); // 'replace' or 'append'
            Log::info('Replace mode: ' . $replaceMode);

            if ($replaceMode === 'replace' || $request->tipe === 'fasilitas') {
                Log::info('REPLACE MODE ACTIVATED - Deleting old images...');
                // Delete old images first
                foreach ($existingGaleri as $oldImage) {
                    $oldPath = public_path('uploads') . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $oldImage;
                    Log::info('Checking file: ' . $oldPath);
                    Log::info('File exists: ' . (file_exists($oldPath) ? 'YES' : 'NO'));

                    if (file_exists($oldPath)) {
                        try {
                            if (unlink($oldPath)) {
                                Log::info('SUCCESS: Deleted old gallery image: ' . $oldImage);
                            } else {
                                Log::error('FAILED: Could not delete old gallery image: ' . $oldImage);
                            }
                        } catch (\Exception $e) {
                            Log::error('EXCEPTION when deleting ' . $oldImage . ': ' . $e->getMessage());
                        }
                    } else {
                        Log::warning('File not found for deletion: ' . $oldImage);
                    }
                }
                // Start with empty array for replacement
                $existingGaleri = [];
                Log::info('Old images deleted, existing galeri reset to empty');
            }

            // Add new images
            $galleryFiles = $request->file('galeri');
            if ($request->tipe === 'fasilitas' && count($galleryFiles) > 2) {
                $galleryFiles = array_slice($galleryFiles, 0, 2);
                Log::info('Limited fasilitas gallery to 2 files');
            }

            foreach ($galleryFiles as $index => $gambar) {
                $galeriName = time() . '_' . $index . '_' . Str::slug($request->nama ?? 'gallery') . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
                $uploadPath = public_path('uploads') . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $galeriName;

                Log::info('Uploading new image: ' . $galeriName);
                Log::info('Upload path: ' . $uploadPath);

                try {
                    $gambar->move(public_path('uploads') . DIRECTORY_SEPARATOR . 'jelajah-lekop', $galeriName);
                    $galeriNames[] = $galeriName;
                    Log::info('SUCCESS: Added gallery image: ' . $galeriName);
                } catch (\Exception $e) {
                    Log::error('FAILED to upload ' . $galeriName . ': ' . $e->getMessage());
                }
            }

            // For fasilitas, always replace (don't merge)
            if ($request->tipe === 'fasilitas') {
                $data['galeri'] = $galeriNames;
                Log::info('Fasilitas galeri replaced with:', $data['galeri']);
            } else {
                // For other types, merge or replace based on mode
                if ($replaceMode === 'replace') {
                    $data['galeri'] = $galeriNames;
                    Log::info('Galeri replaced with:', $data['galeri']);
                } else {
                    // Merge new images with existing ones
                    $data['galeri'] = array_merge($existingGaleri, $galeriNames);
                    Log::info('Galeri after merge:', $data['galeri']);
                }
            }
        } else {
            // Keep existing gallery if no new images uploaded
            $data['galeri'] = $jelajahLekop->galeri ?? [];
            Log::info('Keeping existing galeri:', $data['galeri']);
        }

        // Handle upload fasilitas galeri (for fasilitas type) - REMOVED
        // Now using main galeri field with limit
        Log::info('Fasilitas galeri handling moved to main galeri field');

        // Clean detail data
        $data['detail'] = array_filter($data['detail'] ?? []);

        // Convert comma-separated strings to arrays for specific fields
        if (isset($data['detail']['produk_unggulan']) && is_string($data['detail']['produk_unggulan'])) {
            $data['detail']['produk_unggulan'] = array_map('trim', explode(',', $data['detail']['produk_unggulan']));
        }

        if (isset($data['detail']['produk']) && is_string($data['detail']['produk'])) {
            $data['detail']['produk'] = array_map('trim', explode(',', $data['detail']['produk']));
        }

        // Handle removal of specific images (only for update)
        if ($request->has('remove_images') && !empty($request->remove_images)) {
            Log::info('=== REMOVAL DEBUG ===');
            Log::info('Remove images raw: ' . $request->remove_images);

            $removeImages = explode(',', $request->remove_images);
            // Use current galeri from data array (which might have been replaced)
            $currentGaleri = $data['galeri'] ?? [];
            Log::info('Images to remove:', $removeImages);
            Log::info('Current galeri before removal:', $currentGaleri);

            foreach ($removeImages as $imageName) {
                $imageName = trim($imageName);
                if (!empty($imageName) && in_array($imageName, $currentGaleri)) {
                    // Delete file from storage
                    $imagePath = public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $imageName);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                        Log::info('Deleted file: ' . $imageName);
                    }

                    // Remove from gallery array
                    $currentGaleri = array_diff($currentGaleri, [$imageName]);
                    Log::info('Removed from array: ' . $imageName);
                }
            }

            $data['galeri'] = array_values($currentGaleri);
            Log::info('Final galeri after removal:', $data['galeri']);
        }

        try {
            // Debug: Log data yang akan diupdate
            Log::info('Updating JelajahLekop ID: ' . $jelajahLekop->id);
            Log::info('Request type: ' . $request->tipe);
            Log::info('Request nama: ' . ($request->nama ?? 'NULL'));
            Log::info('Request deskripsi: ' . ($request->deskripsi ?? 'NULL'));
            Log::info('Request hero_image: ' . ($request->hero_image ? 'Has file' : 'No file'));
            Log::info('Has gallery files: ' . ($request->hasFile('galeri') ? 'Yes' : 'No'));
            Log::info('Gallery files count: ' . ($request->hasFile('galeri') ? count($request->file('galeri')) : 0));
            Log::info('Remove images: ' . ($request->remove_images ?? 'None'));
            Log::info('Data to update:', $data);

            $result = $jelajahLekop->update($data);

            Log::info('Update result: ' . ($result ? 'Success' : 'Failed'));
            Log::info('Updated data:', $jelajahLekop->fresh()->toArray());

            return redirect()
                ->route('admin.jelajah-lekop.index', ['tipe' => $request->tipe])
                ->with('success', htmlspecialchars('Data Jelajah Lekop berhasil diperbarui!'));
        } catch (\Exception $e) {
            // Debug: Log error untuk troubleshooting
            Log::error('Failed to update JelajahLekop ID: ' . $jelajahLekop->id);
            Log::error('Error message: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
            Log::error('Data that was being updated:', $data);

            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui data. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }

    public function destroy(JelajahLekop $jelajahLekop)
    {
        // Delete image
        if ($jelajahLekop->gambar) {
            $imagePath = public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $jelajahLekop->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete hero image
        if ($jelajahLekop->hero_image) {
            $heroImagePath = public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $jelajahLekop->hero_image);
            if (file_exists($heroImagePath)) {
                unlink($heroImagePath);
            }
        }

        // Delete gallery images
        if ($jelajahLekop->galeri) {
            foreach ($jelajahLekop->galeri as $gambar) {
                $imagePath = public_path('uploads' . DIRECTORY_SEPARATOR . 'jelajah-lekop' . DIRECTORY_SEPARATOR . $gambar);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $jelajahLekop->delete();

        return redirect()
            ->route('admin.jelajah-lekop.index')
            ->with('success', 'Data Jelajah Lekop berhasil dihapus!');
    }

    public function toggleStatus(JelajahLekop $jelajahLekop)
    {
        $jelajahLekop->status = $jelajahLekop->status === 'aktif' ? 'nonaktif' : 'aktif';
        $jelajahLekop->save();

        return redirect()
            ->route('admin.jelajah-lekop.index')
            ->with('success', 'Status berhasil diperbarui!');
    }

    private function getKategoriOptions($tipe)
    {
        $options = [
            'fasilitas' => [
                'puskesmas' => 'Puskesmas',
                'posyandu' => 'Posyandu',
                'sd' => 'SD',
                'smp' => 'SMP',
                'sma' => 'SMA/SMK/MAN',
                'masjid' => 'Masjid',
                'surau' => 'Surau',
                'tpa' => 'TPA/TPQ',
            ],
            'galeri_kegiatan' => [
                'pemerintahan' => 'Kegiatan Pemerintahan',
                'kemasyarakatan' => 'Kegiatan Kemasyarakatan',
                'pembangunan' => 'Kegiatan Pembangunan',
                'umkm' => 'Kegiatan UMKM',
            ],
        ];

        return $options[$tipe] ?? [];
    }
}
