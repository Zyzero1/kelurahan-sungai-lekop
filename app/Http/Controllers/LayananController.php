<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data = Layanan::all();
        return view('admin.layanan.index', compact('data'));
    }

    public function store(Request $request)
    {
        Layanan::create($request->all());
        return back()->with('success','Layanan berhasil disimpan');
    }
}
