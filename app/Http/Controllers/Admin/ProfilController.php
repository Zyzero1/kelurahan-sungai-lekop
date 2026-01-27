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
        $profil = Profil::firstOrCreate([]);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::firstOrCreate([]);

        // upload struktur JPG
        if ($request->hasFile('struktur')) {
            $file = $request->file('struktur');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/struktur'), $namaFile);
        } else {
            $namaFile = $profil->struktur;
        }

        $profil->update([
            'nama_kelurahan' => $request->nama_kelurahan,
            'alamat'         => $request->alamat,
            'visi'           => $request->visi,
            'misi'           => $request->misi,
            'sejarah'        => $request->sejarah,
            'struktur'       => $namaFile,
        ]);

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Profil Kelurahan berhasil diperbarui');
    }
}
