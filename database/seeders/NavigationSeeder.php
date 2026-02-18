<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Navigation;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navigations = [
            [
                'nama' => 'Beranda',
                'url' => '/',
                'ikon' => 'fas fa-home',
                'is_active' => true,
                'urutan' => 1,
                'target' => '_self'
            ],
            [
                'nama' => 'Profil',
                'url' => '/profil',
                'ikon' => 'fas fa-user',
                'is_active' => true,
                'urutan' => 2,
                'target' => '_self'
            ],
            [
                'nama' => 'Berita',
                'url' => '/berita',
                'ikon' => 'fas fa-newspaper',
                'is_active' => true,
                'urutan' => 3,
                'target' => '_self'
            ],
            [
                'nama' => 'Jelajah Lekop',
                'url' => '/layanan',
                'ikon' => 'fas fa-compass',
                'is_active' => true,
                'urutan' => 4,
                'target' => '_self'
            ],
            [
                'nama' => 'Kontak',
                'url' => '/kontak',
                'ikon' => 'fas fa-envelope',
                'is_active' => true,
                'urutan' => 5,
                'target' => '_self'
            ]
        ];

        foreach ($navigations as $nav) {
            Navigation::create($nav);
        }
    }
}
