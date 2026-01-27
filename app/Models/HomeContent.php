<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        // Hero Banner
        'hero_title',
        'hero_subtitle',
        'hero_button1_text',
        'hero_button1_link',
        'hero_button2_text',
        'hero_button2_link',

        // Profil Singkat
        'profil_tentang',
        'profil_alamat',
        'profil_email',
        'profil_instagram',
        'profil_visi',
        'profil_misi',

        // Statistik
        'statistik_penduduk',
        'statistik_rt',
        'statistik_rw',
        'statistik_layanan',

        // Jelajah Lekop
        'jelajah_fasilitas_title',
        'jelajah_fasilitas_desc',
        'jelajah_umkm_title',
        'jelajah_umkm_desc',
        'jelajah_wisata_title',
        'jelajah_wisata_desc',

        // Testimonial
        'testimonial_text',
        'testimonial_author',

        // Berita Utama Section
        'berita_title',
        'berita_link_text',
        'berita_tab_terkini',
        'berita_tab_populer',
        'berita_featured_title',
        'berita_featured_desc',
        'berita_featured_image',
        'berita_featured_label',

        // Social Media Links
        'social_facebook',
        'social_instagram',
        'social_youtube'
    ];
}
