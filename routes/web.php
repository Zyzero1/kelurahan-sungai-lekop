<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\JelajahLekopController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfilController as FrontProfil;
use App\Http\Controllers\Frontend\JelajahLekopController as FrontJelajahLekop;
use App\Http\Controllers\Frontend\BeritaController as FrontBerita;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\FooterController;



/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, LOGOUT, dll)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // === PROFIL (SINGLE DATA) ===
    Route::get('/profil', [ProfilController::class, 'index'])
        ->name('profil.index');

    Route::get('/profil/edit', [ProfilController::class, 'edit'])
        ->name('profil.edit');

    Route::put('/profil', [ProfilController::class, 'update'])
        ->name('profil.update');

    Route::post('/profil/population-by-age', [ProfilController::class, 'storePopulationByAge'])
        ->name('profil.population-by-age.store');

    Route::put('/profil/population-by-age/{populationByAge}', [ProfilController::class, 'updatePopulationByAge'])
        ->name('profil.population-by-age.update');

    Route::delete('/profil/population-by-age/{populationByAge}', [ProfilController::class, 'destroyPopulationByAge'])
        ->name('profil.population-by-age.destroy');

    // === HOME CONTENT MANAGEMENT ===
    Route::get('/home-content', [HomeContentController::class, 'index'])
        ->name('home-content.index');

    Route::put('/home-content', [HomeContentController::class, 'update'])
        ->name('home-content.update');

    // === JELAJAH LEKOP ===
    Route::resource('jelajah-lekop', JelajahLekopController::class);
    Route::put('jelajah-lekop/{jelajahLekop}/toggle-status', [JelajahLekopController::class, 'toggleStatus'])
        ->name('jelajah-lekop.toggle-status');
    Route::resource('berita', BeritaController::class)
        ->parameters(['berita' => 'berita']);

    // === KONTAK ===
    Route::resource('kontak', KontakController::class);

    // === SOCIAL MEDIA ===
    Route::resource('social-media', SocialMediaController::class);

    // === FOOTER ===
    Route::resource('footer', FooterController::class);
});

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/
// Test route for debugging
Route::get('/profil-test', function () {
    $profil = \App\Models\Profil::first();
    return view('frontend.profil', compact('profil'));
});

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

Route::get('/profil', [FrontProfil::class, 'index'])->name('profil');
Route::get('/layanan', [FrontJelajahLekop::class, 'index'])->name('layanan');

Route::get('/berita', [FrontBerita::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [FrontBerita::class, 'show'])->name('berita.show');

Route::get('/kontak', function () {
    $kontak = \App\Models\Kontak::first();
    return view('frontend.kontak', compact('kontak'));
})->name('kontak');


/*
|--------------------------------------------------------------------------
| DEFAULT DASHBOARD (REDIRECT)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');
