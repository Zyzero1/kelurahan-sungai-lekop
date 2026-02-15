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
        $beritas = Berita::orderBy('urutan', 'asc')->orderBy('created_at', 'desc')->get();
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
            'tanggal' => 'nullable|date',
            'admin_kelurahan' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|in:pemerintahan,kegiatan',
            'urutan' => 'nullable|integer|min:0|max:999',
        ]);

        $namaFile = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $namaFile);
        }

        Berita::create([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul),
            'isi'    => $request->isi,
            'gambar' => $namaFile, // ✅ hanya nama file
            'tanggal' => $request->tanggal,
            'admin_kelurahan' => $request->admin_kelurahan,
            'kategori' => $request->kategori,
            'urutan' => $request->has('urutan') ? (int)$request->urutan : 0,
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
            'tanggal' => 'nullable|date',
            'admin_kelurahan' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|in:pemerintahan,kegiatan',
            'urutan' => 'nullable|integer|min:0|max:999',
        ]);

        $namaFile = $berita->gambar;

        if ($request->hasFile('gambar')) {
            // hapus gambar lama
            if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
                unlink(public_path('uploads/berita/' . $berita->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $namaFile);
        }

        $berita->update([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul),
            'isi'    => $request->isi,
            'gambar' => $namaFile,
            'tanggal' => $request->tanggal,
            'admin_kelurahan' => $request->admin_kelurahan,
            'kategori' => $request->kategori,
            'urutan' => $request->has('urutan') ? (int)$request->urutan : $berita->urutan,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
            unlink(public_path('uploads/berita/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
