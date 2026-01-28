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

        // Upload foto lurah
        if ($request->hasFile('foto_lurah')) {
            $file = $request->file('foto_lurah');
            $namaFotoLurah = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/lurah'), $namaFotoLurah);
        } else {
            $namaFotoLurah = $profil->foto_lurah;
        }

        // Upload struktur
        if ($request->hasFile('struktur')) {
            $file = $request->file('struktur');
            $namaStruktur = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/struktur'), $namaStruktur);
        } else {
            $namaStruktur = $profil->struktur;
        }

        // Update semua field
        $profil->update([
            // Informasi Umum
            'nama_kelurahan' => $request->nama_kelurahan,
            'alamat'         => $request->alamat,
            'kode_pos'       => $request->kode_pos,
            'luas_wilayah'   => $request->luas_wilayah,
            'jumlah_rw'      => $request->jumlah_rw,
            'jumlah_rt'      => $request->jumlah_rt,

            // Pimpinan & Identitas
            'nama_lurah'     => $request->nama_lurah,
            'nip_lurah'      => $request->nip_lurah,
            'foto_lurah'     => $namaFotoLurah,
            'email'          => $request->email,
            'telepon'        => $request->telepon,
            'motto_lurah'    => $request->motto_lurah,

            // Visi & Misi
            'visi'           => $request->visi,
            'misi'           => $request->misi,

            // Sejarah
            'sejarah'        => $request->sejarah,

            // Struktur
            'struktur'       => $namaStruktur,
        ]);

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Profil Kelurahan berhasil diperbarui');
    }
}
