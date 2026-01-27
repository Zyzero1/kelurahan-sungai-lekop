<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfilController as FrontProfil;
use App\Http\Controllers\Frontend\LayananController as FrontLayanan;
use App\Http\Controllers\Frontend\BeritaController as FrontBerita;



/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, LOGOUT, dll)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

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

    // === LAYANAN & BERITA ===
    Route::resource('layanan', LayananController::class);
    Route::resource('berita', BeritaController::class)
    ->parameters(['berita' => 'berita']);
});

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil', [FrontProfil::class, 'index'])->name('profil');
Route::get('/layanan', [FrontLayanan::class, 'index'])->name('layanan');

Route::get('/berita', [FrontBerita::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [FrontBerita::class, 'show'])->name('berita.show');

Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');


/*
|--------------------------------------------------------------------------
| DEFAULT DASHBOARD (REDIRECT)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');
