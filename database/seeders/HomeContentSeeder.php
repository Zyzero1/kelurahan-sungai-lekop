<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeContent;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeContent::create([
            // Hero Banner
            'hero_title' => 'Selamat Datang di Kelurahan Sungai Lekop',
            'hero_subtitle' => 'Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera.',
            'hero_button1_text' => 'Berita Utama',
            'hero_button1_link' => '#berita-utama',
            'hero_button2_text' => 'Jelajah Lekop',
            'hero_button2_link' => '#layanan-kami',

            // Profil Singkat
            'profil_tentang' => 'Kelurahan Sungai Lekop adalah salah satu kelurahan yang terletak di Kecamatan Bintan Timur, Kabupaten Bintan. Kami berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat dalam berbagai aspek administrasi dan pembangunan.',
            'profil_alamat' => 'Jl. Korindo Km. 22 No. 1A, Sungai Lekop',
            'profil_email' => 'kelurahan@sungailekop.id',
            'profil_instagram' => '@Kelurahansungailekop',
            'profil_visi' => 'Terwujudnya Kelurahan Sungai Lekop yang maju, mandiri, dan sejahtera berbasis pelayanan prima.',
            'profil_misi' => "• Memberikan pelayanan administrasi yang cepat dan transparan\n• Meningkatkan partisipasi masyarakat dalam pembangunan\n• Menjaga kebersihan dan keindahan lingkungan",

            // Statistik
            'statistik_penduduk' => 15203,
            'statistik_rt' => 32,
            'statistik_rw' => 9,
            'statistik_layanan' => 12,

            // Jelajah Lekop
            'jelajah_fasilitas_title' => 'Sudut Unik & Fasilitas',
            'jelajah_fasilitas_desc' => 'Mengenal lebih dekat infrastruktur dan kehidupan sosial di Sungai Lekop.',
            'jelajah_umkm_title' => 'UMKM Lokal',
            'jelajah_umkm_desc' => 'Dukung dan kenalkan produk Usaha Mikro Kecil Menengah khas Sungai Lekop.',
            'jelajah_wisata_title' => 'Potensi Wisata',
            'jelajah_wisata_desc' => 'Eksplorasi keindahan alam dan destinasi wisata di wilayah Sungai Lekop.',

            // Testimonial
            'testimonial_text' => 'Melayani dengan hati, mewujudkan pelayanan publik yang transparan, akuntabel, dan humanis menuju masyarakat sejahtera.',
            'testimonial_author' => 'Pemerintah Kelurahan Sungai Lekop',

            // Social Media Links
            'social_facebook' => 'https://facebook.com',
            'social_instagram' => 'https://instagram.com',
            'social_youtube' => 'https://youtube.com',
        ]);
    }
}
