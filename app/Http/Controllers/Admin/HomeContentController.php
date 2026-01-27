<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;

class HomeContentController extends Controller
{
    public function index()
    {
        $homeContent = HomeContent::firstOrCreate([]);
        return view('admin.home-content.index', compact('homeContent'));
    }

    public function update(Request $request)
    {
        $homeContent = HomeContent::firstOrCreate([]);

        $validated = $request->validate([
            // Hero Banner
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',

            // Profil Singkat
            'profil_tentang' => 'nullable|string',
            'profil_alamat' => 'nullable|string|max:255',
            'profil_email' => 'nullable|email|max:255',
            'profil_instagram' => 'nullable|string|max:255',
            'profil_visi' => 'nullable|string',
            'profil_misi' => 'nullable|string',

            // Statistik
            'statistik_penduduk' => 'nullable|integer|min:0',
            'statistik_rt' => 'nullable|integer|min:0',
            'statistik_rw' => 'nullable|integer|min:0',
            'statistik_layanan' => 'nullable|integer|min:0',

            // Jelajah Lekop
            'jelajah_fasilitas_title' => 'nullable|string|max:255',
            'jelajah_fasilitas_desc' => 'nullable|string',
            'jelajah_umkm_title' => 'nullable|string|max:255',
            'jelajah_umkm_desc' => 'nullable|string',
            'jelajah_wisata_title' => 'nullable|string|max:255',
            'jelajah_wisata_desc' => 'nullable|string',

            // Testimonial
            'testimonial_text' => 'nullable|string',
            'testimonial_author' => 'nullable|string|max:255',

            // Berita Utama Section
            'berita_title' => 'nullable|string|max:255',
            'berita_link_text' => 'nullable|string|max:255',
            'berita_tab_terkini' => 'nullable|string|max:255',
            'berita_tab_populer' => 'nullable|string|max:255',
            'berita_featured_title' => 'nullable|string|max:255',
            'berita_featured_desc' => 'nullable|string',
            'berita_featured_image' => 'nullable|string|max:255',
            'berita_featured_label' => 'nullable|string|max:255',

            // Social Media Links
            'social_facebook' => 'nullable|string|max:255',
            'social_instagram' => 'nullable|string|max:255',
            'social_youtube' => 'nullable|string|max:255',
        ]);

        $homeContent->update($validated);

        return redirect()->route('admin.home-content.index')
            ->with('success', 'Konten halaman beranda berhasil diperbarui!');
    }
}
