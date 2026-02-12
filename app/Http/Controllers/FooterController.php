<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function getFooterData()
    {
        $data = [
            'tentang' => Footer::where('kategori', 'tentang')->aktif()->urut()->first(),
            'social' => Footer::where('kategori', 'social')->aktif()->urut()->get(),
            'tautan' => Footer::where('kategori', 'tautan')->aktif()->urut()->get(),
            'layanan' => Footer::where('kategori', 'layanan')->aktif()->urut()->get(),
            'kontak' => Footer::where('kategori', 'kontak')->aktif()->urut()->get(),
        ];

        return $data;
    }

    public function index()
    {
        $footerItems = Footer::orderBy('kategori')->orderBy('urutan')->get();
        return view('admin.footer.index', compact('footerItems'));
    }

    public function create()
    {
        return view('admin.footer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:tentang,social,tautan,layanan,kontak',
            'judul' => 'required|string|max:255',
            'konten' => 'nullable|string',
            'url' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'required|integer|min:0',
            'status' => 'required|boolean'
        ]);

        Footer::create($request->all());

        return redirect()->route('admin.footer.index')
            ->with('success', 'Data footer berhasil ditambahkan');
    }

    public function edit(Footer $footer)
    {
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer)
    {
        $request->validate([
            'kategori' => 'required|in:tentang,social,tautan,layanan,kontak',
            'judul' => 'required|string|max:255',
            'konten' => 'nullable|string',
            'url' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'required|integer|min:0',
            'status' => 'required|boolean'
        ]);

        $footer->update($request->all());

        return redirect()->route('admin.footer.index')
            ->with('success', 'Data footer berhasil diperbarui');
    }

    public function destroy(Footer $footer)
    {
        $footer->delete();

        return redirect()->route('admin.footer.index')
            ->with('success', 'Data footer berhasil dihapus');
    }
}
