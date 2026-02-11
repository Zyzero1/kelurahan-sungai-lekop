<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JelajahLekop;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fasilitas = [
            [
                'tipe' => 'fasilitas',
                'kategori' => 'tpa',
                'nama' => 'TPA Al-Hikmah',
                'deskripsi' => 'Tempat Pendidikan Al-Quran untuk anak usia dini dengan metode pembelajaran yang menyenangkan dan islami.',
                'lokasi' => 'Perumahan Griya Indo Kencana',
                'detail' => json_encode([
                    'ikon' => 'graduation-cap',
                    'warna_label' => 'bg-purple-100 text-purple-800',
                    'jam_operasional' => '08:00 - 11:00',
                    'kapasitas' => '30 anak',
                    'usia' => '4-6 tahun'
                ]),
                'status' => 'aktif',
                'urutan' => 1,
            ],
            [
                'tipe' => 'fasilitas',
                'kategori' => 'sd',
                'nama' => 'SDN 015 Bintan Timur',
                'deskripsi' => 'Sekolah Dasar Negeri yang menyediakan pendidikan berkualitas dengan kurikulum nasional dan fasilitas lengkap.',
                'lokasi' => 'Jl. Korindo',
                'detail' => json_encode([
                    'ikon' => 'school',
                    'warna_label' => 'bg-blue-100 text-blue-800',
                    'jam_operasional' => '07:00 - 13:00',
                    'jumlah_siswa' => '250 siswa',
                    'jumlah_kelas' => '9 kelas'
                ]),
                'status' => 'aktif',
                'urutan' => 2,
            ],
            [
                'tipe' => 'fasilitas',
                'kategori' => 'kesehatan',
                'nama' => 'Posyandu Mawar',
                'deskripsi' => 'Pos pelayanan terpadu untuk kesehatan ibu dan anak dengan layanan imunisasi dan penimbangan balita.',
                'lokasi' => 'Kawasan Jl. Korindo',
                'detail' => json_encode([
                    'ikon' => 'heartbeat',
                    'warna_label' => 'bg-red-100 text-red-800',
                    'jam_operasional' => '08:00 - 12:00',
                    'layanan' => 'Imunisasi, Penimbangan, KIE Kesehatan'
                ]),
                'status' => 'aktif',
                'urutan' => 3,
            ]
        ];

        foreach ($fasilitas as $fasilitas) {
            JelajahLekop::create($fasilitas);
        }
    }
}
