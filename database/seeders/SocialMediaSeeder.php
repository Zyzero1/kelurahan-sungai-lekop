<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMedia = [
            [
                'platform' => 'Instagram',
                'url' => 'https://instagram.com/kelurahan_sungailekop',
                'icon_class' => 'fab fa-instagram',
                'color_class' => 'bg-gradient-to-r from-purple-500 to-pink-500',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'platform' => 'Facebook',
                'url' => 'https://facebook.com/kelurahan.sungailekop',
                'icon_class' => 'fab fa-facebook',
                'color_class' => 'bg-blue-600',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'platform' => 'Twitter',
                'url' => 'https://twitter.com/kelurahan_lekop',
                'icon_class' => 'fab fa-twitter',
                'color_class' => 'bg-sky-500',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'platform' => 'YouTube',
                'url' => 'https://youtube.com/@kelurahan_sungailekop',
                'icon_class' => 'fab fa-youtube',
                'color_class' => 'bg-red-600',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($socialMedia as $sm) {
            SocialMedia::create($sm);
        }
    }
}
