<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::orderBy('id', 'desc')->first();
        return view('admin.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = Profil::orderBy('id', 'desc')->firstOrCreate([]);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::orderBy('id', 'desc')->firstOrCreate([]);

        // Upload foto lurah
        if ($request->hasFile('foto_lurah')) {
            try {
                $file = $request->file('foto_lurah');
                $namaFotoLurah = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/lurah'), $namaFotoLurah);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.profil.edit')
                    ->with('error', 'Gagal upload foto lurah: ' . $e->getMessage());
            }
        } else {
            $namaFotoLurah = $profil->foto_lurah;
        }

        // Upload struktur
        if ($request->hasFile('struktur')) {
            try {
                $file = $request->file('struktur');
                $namaStruktur = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/struktur'), $namaStruktur);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.profil.edit')
                    ->with('error', 'Gagal upload struktur organisasi: ' . $e->getMessage());
            }
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

            // Demografi Penduduk
            'jumlah_laki_laki'     => $request->jumlah_laki_laki,
            'jumlah_perempuan'     => $request->jumlah_perempuan,
            'jumlah_kk'            => $request->jumlah_kk,
            'demografi_deskripsi'   => $request->demografi_deskripsi,

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
            ->route('admin.profil.edit')
            ->with('success', 'Profil Kelurahan berhasil diperbarui');
    }
}
