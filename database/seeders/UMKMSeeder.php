<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JelajahLekop;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $umkm = [
            [
                'tipe' => 'umkm',
                'kategori' => 'kuliner',
                'nama' => 'Kerupuk Pak Haji',
                'deskripsi' => 'Kerupuk khas Bintan dengan resep turun temurun, kualitas premium dan rasa autentik.',
                'detail' => json_encode([
                    'badge' => 'Best Seller',
                    'badge_color' => 'bg-red-500',
                    'ikon' => 'fire',
                    'produk' => ['Kerupuk Ikan', 'Kerupuk Udang'],
                    'harga' => 'Rp 25.000 - 60.000'
                ]),
                'status' => 'aktif',
                'urutan' => 1,
            ],
            [
                'tipe' => 'umkm',
                'kategori' => 'kuliner',
                'nama' => "Ibu Sumi's Snack",
                'deskripsi' => 'Makanan ringan homemade dengan bahan pilihan, tanpa pengawet dan pewarna buatan.',
                'detail' => json_encode([
                    'badge' => 'Organik',
                    'badge_color' => 'bg-green-500',
                    'ikon' => 'leaf',
                    'produk' => ['Kue Kering', 'Pisang Goreng'],
                    'harga' => 'Rp 15.000 - 45.000'
                ]),
                'status' => 'aktif',
                'urutan' => 2,
            ]
        ];

        foreach ($umkm as $item) {
            JelajahLekop::create($item);
        }
    }
}
