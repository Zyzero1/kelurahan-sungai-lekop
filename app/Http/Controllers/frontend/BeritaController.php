<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Http\Controllers\FooterController;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('urutan', 'asc')->orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.berita.index', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();

        // Get footer data untuk social media
        $footerController = new FooterController();
        $footerData = $footerController->getFooterData();

        return view('frontend.berita.show', compact('berita', 'footerData'));
    }
}
