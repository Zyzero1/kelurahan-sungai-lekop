<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of resource.
     */
    public function index()
    {
        $socialMedia = SocialMedia::orderBy('sort_order')->get();
        return view('admin.social-media.index', compact('socialMedia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:50',
            'url' => 'required|url',
            'icon_class' => 'required|string|max:50',
            'color_class' => 'required|string|max:100',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        SocialMedia::create($request->all());

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Media sosial berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('admin.social-media.edit', compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'platform' => 'required|string|max:50',
            'url' => 'required|url',
            'icon_class' => 'required|string|max:50',
            'color_class' => 'required|string|max:100',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->update($request->all());

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Media sosial berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Media sosial berhasil dihapus.');
    }
}
