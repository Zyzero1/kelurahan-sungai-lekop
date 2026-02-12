<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    public function run()
    {
        // Data Tentang
        Footer::create([
            'kategori' => 'tentang',
            'judul' => 'Kelurahan Sungai Lekop',
            'konten' => 'Website resmi Kelurahan Sungai Lekop sebagai pusat informasi dan pelayanan masyarakat yang transparan, cepat, dan akurat.',
            'url' => null,
            'icon' => null,
            'urutan' => 1,
            'status' => true
        ]);

        // Social Media
        Footer::create([
            'kategori' => 'social',
            'judul' => 'Facebook',
            'konten' => null,
            'url' => 'http://facebook.com',
            'icon' => 'fab fa-facebook-f',
            'urutan' => 1,
            'status' => true
        ]);

        Footer::create([
            'kategori' => 'social',
            'judul' => 'Instagram',
            'konten' => null,
            'url' => 'http://instagram.com',
            'icon' => 'fab fa-instagram',
            'urutan' => 2,
            'status' => true
        ]);

        // Tautan Cepat
        Footer::create([
            'kategori' => 'tautan',
            'judul' => 'Beranda',
            'konten' => null,
            'url' => '/',
            'icon' => null,
            'urutan' => 1,
            'status' => true
        ]);

        Footer::create([
            'kategori' => 'tautan',
            'judul' => 'Profil',
            'konten' => null,
            'url' => '/profil',
            'icon' => null,
            'urutan' => 2,
            'status' => true
        ]);

        Footer::create([
            'kategori' => 'tautan',
            'judul' => 'Berita',
            'konten' => null,
            'url' => '/berita',
            'icon' => null,
            'urutan' => 3,
            'status' => true
        ]);

        Footer::create([
            'kategori' => 'tautan',
            'judul' => 'Jelajah Lekop',
            'konten' => null,
            'url' => '/layanan',
            'icon' => null,
            'urutan' => 4,
            'status' => true
        ]);

        // Layanan
        Footer::create([
            'kategori' => 'layanan',
            'judul' => 'Administrasi Kependudukan',
            'konten' => null,
            'url' => '/layanan#administrasi',
            'icon' => null,
            'urutan' => 1,
            'status' => true
        ]);

        Footer::create([
            'kategori' => 'layanan',
            'judul' => 'Surat Keterangan',
            'konten' => null,
            'url' => '/layanan#surat-keterangan',
            'icon' => null,
            'urutan' => 2,
            'status' => true
        ]);

        Footer::create([
            'kategori' => 'layanan',
            'judul' => 'Pelayanan Perizinan',
            'konten' => null,
            'url' => '/layanan#pelayanan-perizinan',
            'icon' => null,
            'urutan' => 3,
            'status' => true
        ]);

        // Kontak
        Footer::create([
            'kategori' => 'kontak',
            'judul' => 'Alamat',
            'konten' => 'Jalan Sungai Lekop, Kabupaten Bintan, Kepulauan Riau, Indonesia.',
            'url' => null,
            'icon' => 'fas fa-map-marker-alt',
            'urutan' => 1,
            'status' => true
        ]);

        Footer::create([
            'kategori' => 'kontak',
            'judul' => 'Email',
            'konten' => 'admin@sungailekop.go.id',
            'url' => null,
            'icon' => 'fas fa-envelope',
            'urutan' => 2,
            'status' => true
        ]);
    }
}
