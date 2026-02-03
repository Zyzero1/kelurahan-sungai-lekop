<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PopulationByAge;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::orderBy('id', 'desc')->first();
        $populations = PopulationByAge::orderBy('sort_order', 'asc')->get();
        return view('frontend.profil', compact('profil', 'populations'));
    }
}
