<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\JelajahLekop;
use App\Models\Berita;
use App\Models\Kontak;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProfil' => Profil::count(),
            'totalJelajahLekop' => JelajahLekop::count(),
            'totalBerita' => Berita::count(),
            'totalKontak' => Kontak::count(),
        ]);
    }
}
