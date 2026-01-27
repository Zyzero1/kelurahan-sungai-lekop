<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->limit(3)->get();
        return view('frontend.home', compact('beritas'));
    }
}
