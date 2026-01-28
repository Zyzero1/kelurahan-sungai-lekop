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

        // Upload hero banner image 1
        if ($request->hasFile('hero_banner_image_1')) {
            $file = $request->file('hero_banner_image_1');
            $heroBannerImage1 = time() . '_1.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/hero'), $heroBannerImage1);
        } else {
            $heroBannerImage1 = $homeContent->hero_banner_image_1;
        }

        // Upload hero banner image 2
        if ($request->hasFile('hero_banner_image_2')) {
            $file = $request->file('hero_banner_image_2');
            $heroBannerImage2 = time() . '_2.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/hero'), $heroBannerImage2);
        } else {
            $heroBannerImage2 = $homeContent->hero_banner_image_2;
        }

        $validated = $request->validate([
            // Hero Banner
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_banner_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'hero_banner_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

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

        $homeContent->update(array_merge($validated, [
            'hero_banner_image_1' => $heroBannerImage1,
            'hero_banner_image_2' => $heroBannerImage2,
        ]));

        return redirect()->route('admin.home-content.index')
            ->with('success', 'Konten halaman beranda berhasil diperbarui!');
    }
}
