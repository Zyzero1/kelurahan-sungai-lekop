<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'persyaratan'  => 'nullable|string',
            'status'       => 'required|in:aktif,non_aktif',
        ]);

        Layanan::create([
            'nama'         => $request->nama,
            'deskripsi'    => $request->deskripsi,
            'persyaratan'  => $request->persyaratan,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'persyaratan'  => 'nullable|string',
            'status'       => 'required|in:aktif,non_aktif',
        ]);

        $layanan->update([
            'nama'         => $request->nama,
            'deskripsi'    => $request->deskripsi,
            'persyaratan'  => $request->persyaratan,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function toggleStatus(Layanan $layanan)
    {
        $layanan->update([
            'status' => $layanan->status === 'aktif' ? 'non_aktif' : 'aktif'
        ]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Status layanan berhasil diperbarui');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
}
