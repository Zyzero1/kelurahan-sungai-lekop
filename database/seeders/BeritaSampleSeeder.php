<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSampleSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [
            [
                'judul' => 'Apel Desa Bulan Ini',
                'slug' => 'apel-desa-bulan-ini',
                'isi' => 'Kegiatan apel desa akan dilaksanakan pada tanggal 15 Februari 2026 di halaman kantor kelurahan. Seluruh pegawai dan staf diwajibkan hadir tepat waktu dengan menggunakan pakaian dinas lengkap.',
                'kategori' => 'pemerintahan',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Gotong Royong Bersihkan Lingkungan',
                'slug' => 'gotong-royong-bersihkan-lingkungan',
                'isi' => 'Masyarakat Kelurahan Sungai Lekop mengadakan gotong royong membersihkan lingkungan untuk menciptakan desa yang bersih dan sehat. Kegiatan ini diikuti oleh lebih dari 100 warga dari berbagai RT.',
                'kategori' => 'kegiatan',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pembagian BST Tahap Kedua',
                'slug' => 'pembagian-bst-tahap-kedua',
                'isi' => 'Pemerintah Kelurahan Sungai Lekop kembali membagikan Bantuan Sosial Tunai (BST) tahap kedua kepada 150 Keluarga Penerima Manfaat (KPM). Pembagian dilakukan secara bertahap untuk menghindari kerumunan.',
                'kategori' => 'pemerintahan',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Festival Seni dan Budaya Lokal',
                'slug' => 'festival-seni-dan-budaya-lokal',
                'isi' => 'Kelurahan Sungai Lekop akan mengadakan Festival Seni dan Budaya Lokal pada akhir bulan ini. Berbagai pertunjukan seni tradisional akan ditampilkan untuk melestarikan budaya lokal.',
                'kategori' => 'kegiatan',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Berita::insert($beritas);
    }
}
