<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('frontend.layanan', compact('layanans'));
    }
}
