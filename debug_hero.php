<?php
require_once __DIR__.'/bootstrap/app.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$hero = App\Models\JelajahLekop::where('tipe', 'hero')->first();
if ($hero) {
    echo 'Hero Banner Found:' . PHP_EOL;
    echo 'ID: ' . $hero->id . PHP_EOL;
    echo 'Nama: ' . $hero->nama . PHP_EOL;
    echo 'Hero Image: ' . $hero->hero_image . PHP_EOL;
    echo 'Status: ' . $hero->status . PHP_EOL;
    echo 'Hero Image URL: ' . $hero->hero_image_url . PHP_EOL;
    echo 'Created At: ' . $hero->created_at . PHP_EOL;
} else {
    echo 'No hero banner found!' . PHP_EOL;
}
?>
