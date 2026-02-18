<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelurahanSetting;
use Illuminate\Support\Facades\Storage;

class KelurahanSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = KelurahanSetting::getSetting();
        return view('admin.kelurahan-setting.edit', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not needed for single settings
        return redirect()->route('admin.kelurahan-setting.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Not needed for single settings
        return redirect()->route('admin.kelurahan-setting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not needed for single settings
        return redirect()->route('admin.kelurahan-setting.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = KelurahanSetting::getSetting();
        return view('admin.kelurahan-setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelurahan' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $setting = KelurahanSetting::getSetting();
        $setting->nama_kelurahan = $request->nama_kelurahan;

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($setting->logo_path) {
                $oldPath = str_replace('storage/', '', $setting->logo_path);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            // Upload new logo
            $logoPath = $request->file('logo')->store('kelurahan-logo', 'public');
            $setting->logo_path = 'storage/' . $logoPath;
        }

        $setting->save();

        return redirect()->route('admin.kelurahan-setting.index')
            ->with('success', 'Pengaturan Kelurahan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Not needed for single settings
        return redirect()->route('admin.kelurahan-setting.index');
    }
}
