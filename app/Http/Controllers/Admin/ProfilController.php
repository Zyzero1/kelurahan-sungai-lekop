<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopulationByAge;
use App\Models\Profil;
use App\Models\Kontak;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::orderBy('id', 'desc')->first();
        $populations = PopulationByAge::orderBy('sort_order', 'asc')->get();
        return view('admin.profil.index', compact('profil', 'populations'));
    }

    public function edit()
    {
        $profil = Profil::orderBy('id', 'desc')->first();
        if (!$profil) {
            $profil = Profil::create([]);
        }
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::orderBy('id', 'desc')->first();
        if (!$profil) {
            $profil = Profil::create([]);
        }

        $validated = $request->validate([
            'nama_kelurahan' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string'],
            'kode_pos' => ['nullable', 'string', 'max:50'],
            'luas_wilayah' => ['nullable', 'string', 'max:50'],
            'jumlah_rw' => ['nullable', 'integer', 'min:0'],
            'jumlah_rt' => ['nullable', 'integer', 'min:0'],
            'jumlah_laki_laki' => ['nullable', 'integer', 'min:0'],
            'jumlah_perempuan' => ['nullable', 'integer', 'min:0'],
            'jumlah_kk' => ['nullable', 'integer', 'min:0'],
            'demografi_deskripsi' => ['nullable', 'string'],
            'nama_lurah' => ['nullable', 'string', 'max:255'],
            'nip_lurah' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'string', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'motto_lurah' => ['nullable', 'string'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'sejarah' => ['nullable', 'string'],
            'foto_lurah' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'struktur' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        // Upload foto lurah
        if ($request->hasFile('foto_lurah')) {
            try {
                $file = $request->file('foto_lurah');
                $namaFotoLurah = time() . '_lurah.' . $file->getClientOriginalExtension();
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
                $namaStruktur = time() . '_struktur.' . $file->getClientOriginalExtension();
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
            'nama_kelurahan' => $validated['nama_kelurahan'] ?? null,
            'alamat'         => $validated['alamat'] ?? null,
            'kode_pos'       => $validated['kode_pos'] ?? null,
            'luas_wilayah'   => $validated['luas_wilayah'] ?? null,
            'jumlah_rw'      => $validated['jumlah_rw'] ?? null,
            'jumlah_rt'      => $validated['jumlah_rt'] ?? null,

            // Demografi Penduduk
            'jumlah_laki_laki'     => $validated['jumlah_laki_laki'] ?? null,
            'jumlah_perempuan'     => $validated['jumlah_perempuan'] ?? null,
            'jumlah_kk'            => $validated['jumlah_kk'] ?? null,
            'demografi_deskripsi'  => $validated['demografi_deskripsi'] ?? null,

            // Pimpinan & Identitas
            'nama_lurah'     => $validated['nama_lurah'] ?? null,
            'nip_lurah'      => $validated['nip_lurah'] ?? null,
            'foto_lurah'     => $namaFotoLurah,
            'email'          => $validated['email'] ?? null,
            'telepon'        => $validated['telepon'] ?? null,
            'motto_lurah'    => $validated['motto_lurah'] ?? null,

            // Visi & Misi
            'visi'           => $validated['visi'] ?? null,
            'misi'           => $validated['misi'] ?? null,

            // Sejarah
            'sejarah'        => $validated['sejarah'] ?? null,

            // Struktur
            'struktur'       => $namaStruktur,
        ]);

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil Kelurahan berhasil diperbarui');
    }

    public function storePopulationByAge(Request $request)
    {
        $validated = $request->validate([
            'age_group' => ['required', 'string', 'max:50'],
            'male_count' => ['required', 'integer', 'min:0'],
            'female_count' => ['required', 'integer', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $male = (int) $validated['male_count'];
        $female = (int) $validated['female_count'];
        $sortOrder = array_key_exists('sort_order', $validated) && $validated['sort_order'] !== null
            ? (int) $validated['sort_order']
            : ((int) (PopulationByAge::max('sort_order') ?? 0) + 1);

        PopulationByAge::create([
            'age_group' => $validated['age_group'],
            'male_count' => $male,
            'female_count' => $female,
            'total_count' => $male + $female,
            'sort_order' => $sortOrder,
        ]);

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Data kelompok umur berhasil ditambahkan');
    }

    public function updatePopulationByAge(Request $request, PopulationByAge $populationByAge)
    {
        $validated = $request->validate([
            'age_group' => ['required', 'string', 'max:50'],
            'male_count' => ['required', 'integer', 'min:0'],
            'female_count' => ['required', 'integer', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $male = (int) $validated['male_count'];
        $female = (int) $validated['female_count'];

        $populationByAge->update([
            'age_group' => $validated['age_group'],
            'male_count' => $male,
            'female_count' => $female,
            'total_count' => $male + $female,
            'sort_order' => array_key_exists('sort_order', $validated) ? $validated['sort_order'] : $populationByAge->sort_order,
        ]);

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Data kelompok umur berhasil diperbarui');
    }

    public function destroyPopulationByAge(PopulationByAge $populationByAge)
    {
        $populationByAge->delete();

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Data kelompok umur berhasil dihapus');
    }

    public function kontak()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.index', compact('kontak'));
    }
}
