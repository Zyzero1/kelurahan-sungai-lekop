<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
{
    $beritas = Berita::latest()->paginate(6);
    return view('frontend.berita.index', compact('beritas'));
}

public function show($slug)
{
    $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();

    return view('frontend.berita.show', compact('berita'));
}


}
