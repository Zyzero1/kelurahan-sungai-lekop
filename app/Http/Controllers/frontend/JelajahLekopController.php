<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JelajahLekop;

class JelajahLekopController extends Controller
{
    public function index()
    {
        try {
            // Get all data grouped by type
            $sentraIndustri = JelajahLekop::tipe('sentra_industri')->aktif()->urut()->get();
            $fasilitas = JelajahLekop::tipe('fasilitas')->aktif()->urut()->get();
            $umkm = JelajahLekop::tipe('umkm')->aktif()->urut()->get();
            $galeriKegiatan = JelajahLekop::tipe('galeri_kegiatan')->aktif()->urut()->get();

            // Get hero data
            $heroData = JelajahLekop::where('tipe', 'hero')->aktif()->first();

            // Group facilities by category
            $fasilitasByCategory = $fasilitas->groupBy('kategori');

            // Group gallery by category with safe array access
            $galeriByCategory = $galeriKegiatan->groupBy(function ($item) {
                if (empty($item->detail)) {
                    return 'umum';
                }
                $detail = is_array($item->detail) ? $item->detail : json_decode($item->detail, true);
                return $detail['kategori_galeri'] ?? 'umum';
            });
        } catch (\Exception $e) {
            // If table doesn't exist or other database errors, return empty collections
            $sentraIndustri = collect();
            $fasilitas = collect();
            $umkm = collect();
            $galeriKegiatan = collect();
            $fasilitasByCategory = collect();
            $galeriByCategory = collect();
            $heroData = null;
        }

        return view('frontend.layanan', compact(
            'sentraIndustri',
            'fasilitas',
            'fasilitasByCategory',
            'umkm',
            'galeriKegiatan',
            'galeriByCategory',
            'heroData'
        ));
    }
}
