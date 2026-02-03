<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Layanan;
use App\Models\Berita;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProfil' => Profil::count(),
            'totalLayanan' => Layanan::count(),
            'totalBerita' => Berita::count(),
        ]);
    }
}
