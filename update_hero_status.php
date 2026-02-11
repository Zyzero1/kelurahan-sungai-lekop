#!/usr/bin/env php
<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\JelajahLekop;

// Update hero banner status to aktif
$hero = JelajahLekop::where('tipe', 'hero')->first();
if ($hero) {
    $oldStatus = $hero->status;
    $hero->update(['status' => 'aktif']);
    echo "✓ Hero banner status updated from '$oldStatus' to 'aktif'" . PHP_EOL;
    echo "  - ID: " . $hero->id . PHP_EOL;
    echo "  - Nama: " . $hero->nama . PHP_EOL;
    echo "  - Hero Image: " . $hero->hero_image . PHP_EOL;
} else {
    echo "✗ No hero banner found!" . PHP_EOL;
}
?>
