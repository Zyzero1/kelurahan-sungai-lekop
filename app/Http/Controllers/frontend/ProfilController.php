<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::orderBy('id', 'desc')->first();
        return view('frontend.profil', compact('profil'));
    }
}
