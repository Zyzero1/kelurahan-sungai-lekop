<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $namaFile);
        }

        Berita::create([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul),
            'isi'    => $request->isi,
            'gambar' => $namaFile, // ✅ hanya nama file
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = $berita->gambar;

        if ($request->hasFile('gambar')) {
            // hapus gambar lama
            if ($berita->gambar && file_exists(public_path('uploads/berita/'.$berita->gambar))) {
                unlink(public_path('uploads/berita/'.$berita->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $namaFile);
        }

        $berita->update([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul),
            'isi'    => $request->isi,
            'gambar' => $namaFile,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && file_exists(public_path('uploads/berita/'.$berita->gambar))) {
            unlink(public_path('uploads/berita/'.$berita->gambar));
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
