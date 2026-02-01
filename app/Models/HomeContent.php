<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        // Hero Banner
        'hero_title',
        'hero_subtitle',
        'hero_banner_image_1',
        'hero_banner_image_2',
        'hero_banner_image_3',
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

        // Layanan Publik
        'layanan_publik_title',
        'layanan_publik_desc',
        'layanan_kk_baru',
        'layanan_nikah',
        'layanan_akte_lahir',
        'layanan_akte_mati',
        'layanan_uang_duka',
        'layanan_tambah_anak',
        'layanan_sktm',
        'layanan_bpjs',
        'layanan_sku',

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

        // Social Media Links
        'social_facebook',
        'social_instagram',
        'social_youtube'
    ];
}
