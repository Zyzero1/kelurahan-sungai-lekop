<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Navigation;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navigations = Navigation::ordered()->get();
        return view('admin.navigation.index', compact('navigations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.navigation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'ikon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'urutan' => 'integer|min:0',
            'target' => 'required|in:_self,_blank'
        ]);

        Navigation::create($request->all());
        return redirect()->route('admin.navigation.index')
            ->with('success', 'Navigation berhasil ditambahkan');
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
    public function edit(Navigation $navigation)
    {
        return view('admin.navigation.edit', compact('navigation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Navigation $navigation)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'ikon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'urutan' => 'integer|min:0',
            'target' => 'required|in:_self,_blank'
        ]);

        $navigation->update($request->all());
        return redirect()->route('admin.navigation.index')
            ->with('success', 'Navigation berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Navigation $navigation)
    {
        $navigation->delete();
        return redirect()->route('admin.navigation.index')
            ->with('success', 'Navigation berhasil dihapus');
    }
}
