<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $sampleBeritas = [
            [
                'judul' => 'Sosialisasi E-KTP Digital untuk Seluruh Ketua RT dan RW',
                'slug' => 'sosialisasi-e-ktp-digital-untuk-seluruh-ketua-rt-dan-rw',
                'isi' => 'Kelurahan Bintan mengadakan sosialisasi mengenai E-KTP Digital bagi seluruh Ketua RT dan RW di wilayah kerja kelurahan. Kegiatan ini bertujuan untuk memperkenalkan dan mengedukasi masyarakat mengenai penggunaan E-KTP Digital yang akan segera diterapkan secara nasional.',
                'gambar' => 'berita1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Rapat Koordinasi Infrastruktur Desa',
                'slug' => 'rapat-koordinasi-infrastruktur-desa',
                'isi' => 'Pemerintah Kelurahan Bintan mengadakan rapat koordinasi membahas rencana pembangunan infrastruktur desa untuk tahun anggaran mendatang. Beberapa program prioritas akan segera direalisasikan untuk meningkatkan kualitas layanan publik.',
                'gambar' => 'berita2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kelurahan Raih Penghargaan Adipura Tingkat Kota',
                'slug' => 'kelurahan-raih-penghargaan-adipura-tingkat-kota',
                'isi' => 'Kelurahan Bintan berhasil meraih penghargaan Adipura tingkat kota berkat keberhasilannya dalam menjaga kebersihan dan keindahan lingkungan. Penghargaan ini diberikan sebagai apresiasi atas komitmen kelurahan dalam program kebersihan.',
                'gambar' => 'berita3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Bantuan Langsung Tunai (BLT) Tahap II Mulai Dicairkan',
                'slug' => 'bantuan-langsung-tunai-blt-tahap-ii-mulai-dicairkan',
                'isi' => 'Pemerintah Kelurahan Bintan mulai mencairkan Bantuan Langsung Tunai (BLT) tahap II bagi warga yang memenuhi kriteria. Proses pencairan dilakukan secara bertahap untuk memastikan bantuan tepat sasaran.',
                'gambar' => 'berita4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Festival Budaya Melayu Bintan 2024',
                'slug' => 'festival-budaya-melayu-bintan-2024',
                'isi' => 'Kelurahan Bintan akan menyelenggarakan Festival Budaya Melayu Bintan 2024 untuk melestarikan dan mengembangkan seni budaya Melayu. Berbagai kegiatan akan digelar selama festival berlangsung.',
                'gambar' => 'berita5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pembangunan Jalan Lingkungan RW 08 Dimulai',
                'slug' => 'pembangunan-jalan-lingkungan-rw-08-dimulai',
                'isi' => 'Pembangunan jalan lingkungan di RW 08 Kelurahan Bintan telah dimulai. Proyek ini diharapkan dapat meningkatkan aksesibilitas dan kualitas infrastruktur jalan di wilayah tersebut.',
                'gambar' => 'berita6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($sampleBeritas as $berita) {
            $data = $berita;
            unset($data['created_at'], $data['updated_at']);
            Berita::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
