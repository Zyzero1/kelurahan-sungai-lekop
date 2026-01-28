<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\HomeContent;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->limit(3)->get();
        $homeContent = HomeContent::firstOrCreate([]);

        return view('frontend.home', compact('beritas', 'homeContent'));
    }
}
