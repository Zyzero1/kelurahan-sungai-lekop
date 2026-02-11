<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\HomeContent;
use App\Models\JelajahLekop;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->limit(3)->get();
        $homeContent = HomeContent::firstOrCreate([]);

        try {
            // Get gallery data for home page (limit to 3 items for compact display)
            $galeriKegiatan = JelajahLekop::tipe('galeri_kegiatan')->aktif()->urut()->take(3)->get();

            // Group gallery by category
            $galeriByCategory = $galeriKegiatan->groupBy(function ($item) {
                if (empty($item->detail)) {
                    return 'umum';
                }
                $detail = is_array($item->detail) ? $item->detail : json_decode($item->detail, true);
                return $detail['kategori_galeri'] ?? 'umum';
            });
        } catch (\Exception $e) {
            // If table doesn't exist or other database errors, return empty collections
            $galeriKegiatan = collect();
            $galeriByCategory = collect();
        }

        return view('frontend.home', compact('beritas', 'homeContent', 'galeriKegiatan', 'galeriByCategory'));
    }
}
