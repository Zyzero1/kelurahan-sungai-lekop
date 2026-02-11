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
            'fasilitas_galeri.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
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

        $data = $request->except(['gambar', 'galeri', 'fasilitas_galeri', 'remove_images']);

        // Handle upload gambar utama
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/jelajah-lekop'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        // Handle upload hero image
        if ($request->hasFile('hero_image')) {
            $heroImage = $request->file('hero_image');
            $heroImageName = time() . '_hero_' . Str::slug($request->nama) . '.' . $heroImage->getClientOriginalExtension();
            $heroImage->move(public_path('uploads/jelajah-lekop'), $heroImageName);
            $data['hero_image'] = $heroImageName;
        }

        // Handle upload galeri
        if ($request->hasFile('galeri')) {
            $galeriNames = [];
            foreach ($request->file('galeri') as $index => $gambar) {
                $galeriName = time() . '_' . $index . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('uploads/jelajah-lekop'), $galeriName);
                $galeriNames[] = $galeriName;
            }
            $data['galeri'] = $galeriNames;
        }

        // Handle upload fasilitas galeri (for fasilitas type)
        if ($request->hasFile('fasilitas_galeri')) {
            $fasilitasGaleriNames = [];
            foreach ($request->file('fasilitas_galeri') as $index => $gambar) {
                $fasilitasGaleriName = time() . '_fasilitas_' . $index . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('uploads/jelajah-lekop'), $fasilitasGaleriName);
                $fasilitasGaleriNames[] = $fasilitasGaleriName;
            }
            // Merge with existing galeri or create new one
            $existingGaleri = $data['galeri'] ?? [];
            $data['galeri'] = array_merge($existingGaleri, $fasilitasGaleriNames);
        }

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
            'fasilitas_galeri.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
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

        $data = $request->except(['gambar', 'galeri', 'fasilitas_galeri', 'remove_images']);

        // Handle upload gambar utama
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($jelajahLekop->gambar) {
                $oldImagePath = public_path('uploads/jelajah-lekop/' . $jelajahLekop->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/jelajah-lekop'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        // Handle upload hero image
        if ($request->hasFile('hero_image')) {
            // Delete old hero image
            if ($jelajahLekop->hero_image) {
                $oldHeroImagePath = public_path('uploads/jelajah-lekop/' . $jelajahLekop->hero_image);
                if (file_exists($oldHeroImagePath)) {
                    unlink($oldHeroImagePath);
                }
            }

            $heroImage = $request->file('hero_image');
            $heroImageName = time() . '_hero_' . Str::slug($request->nama) . '.' . $heroImage->getClientOriginalExtension();
            $heroImage->move(public_path('uploads/jelajah-lekop'), $heroImageName);
            $data['hero_image'] = $heroImageName;
        }

        // Handle upload galeri
        if ($request->hasFile('galeri')) {
            // Delete old gallery images
            if ($jelajahLekop->galeri) {
                foreach ($jelajahLekop->galeri as $oldGambar) {
                    $oldImagePath = public_path('uploads/jelajah-lekop/' . $oldGambar);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $galeriNames = [];
            foreach ($request->file('galeri') as $index => $gambar) {
                $galeriName = time() . '_' . $index . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('uploads/jelajah-lekop'), $galeriName);
                $galeriNames[] = $galeriName;
            }
            $data['galeri'] = $galeriNames;
        }

        // Handle upload fasilitas galeri (for fasilitas type)
        if ($request->hasFile('fasilitas_galeri')) {
            $fasilitasGaleriNames = [];
            foreach ($request->file('fasilitas_galeri') as $index => $gambar) {
                $fasilitasGaleriName = time() . '_fasilitas_' . $index . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('uploads/jelajah-lekop'), $fasilitasGaleriName);
                $fasilitasGaleriNames[] = $fasilitasGaleriName;
            }
            // Merge with existing galeri or create new one
            $existingGaleri = $data['galeri'] ?? [];
            $data['galeri'] = array_merge($existingGaleri, $fasilitasGaleriNames);
        }

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
        if ($request->has('remove_images')) {
            $removeImages = explode(',', $request->remove_images);
            $currentGaleri = $jelajahLekop->galeri ?? [];

            foreach ($removeImages as $imageName) {
                $imageName = trim($imageName);
                if (in_array($imageName, $currentGaleri)) {
                    // Delete file from storage
                    $imagePath = public_path('uploads/jelajah-lekop/' . $imageName);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }

                    // Remove from gallery array
                    $currentGaleri = array_diff($currentGaleri, [$imageName]);
                }
            }

            $data['galeri'] = array_values($currentGaleri);
        }

        try {
            // Debug: Log data yang akan diupdate
            Log::info('Updating JelajahLekop ID: ' . $jelajahLekop->id);
            Log::info('Data to update:', $data);

            $jelajahLekop->update($data);

            Log::info('Successfully updated JelajahLekop ID: ' . $jelajahLekop->id);

            return redirect()
                ->route('admin.jelajah-lekop.index', ['tipe' => $request->tipe])
                ->with('success', htmlspecialchars('Data Jelajah Lekop berhasil diperbarui!'));
        } catch (\Exception $e) {
            // Debug: Log error untuk troubleshooting
            Log::error('Failed to update JelajahLekop ID: ' . $jelajahLekop->id);
            Log::error('Error message: ' . $e->getMessage());
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
            $imagePath = public_path('uploads/jelajah-lekop/' . $jelajahLekop->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete hero image
        if ($jelajahLekop->hero_image) {
            $heroImagePath = public_path('uploads/jelajah-lekop/' . $jelajahLekop->hero_image);
            if (file_exists($heroImagePath)) {
                unlink($heroImagePath);
            }
        }

        // Delete gallery images
        if ($jelajahLekop->galeri) {
            foreach ($jelajahLekop->galeri as $gambar) {
                $imagePath = public_path('uploads/jelajah-lekop/' . $gambar);
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
