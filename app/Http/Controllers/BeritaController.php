<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::latest()->get();
        return view('admin.berita.index', compact('data'));
    }

    public function store(Request $request)
    {
        Berita::create($request->all());
        return back()->with('success','Berita berhasil disimpan');
    }
}
