<?php
// Update hero image untuk hero banner Jelajah Lekop
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\JelajahLekop;

// File yang ada di uploads/jelajah-lekop
$heroImageFile = '1770569250_hero_explore-bintan-timur.jpg';

// Cari hero banner
$hero = JelajahLekop::where('tipe', 'hero')->first();

if ($hero) {
    $hero->update([
        'hero_image' => $heroImageFile,
        'hero_content' => 'Menelusuri denyut nadi ekonomi kreatif, keramahan warga, dan potensi wilayah di gerbang Bintan Timur.',
    ]);
    echo "✓ Hero image updated successfully!\n";
    echo "Hero Image: " . $hero->hero_image . "\n";
    echo "Hero Content: " . $hero->hero_content . "\n";
} else {
    echo "✗ No hero found\n";
}
