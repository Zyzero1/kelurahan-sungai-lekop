<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        return view('admin.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = Profil::first();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_kelurahan' => 'required',
            'alamat' => 'nullable',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'sejarah' => 'nullable',
        ]);

        $profil = Profil::first();

        if (!$profil) {
            $profil = Profil::create($request->all());
        } else {
            $profil->update($request->all());
        }

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil kelurahan berhasil diperbarui');
    }
}
