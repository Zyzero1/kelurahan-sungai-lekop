<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use Illuminate\Support\Facades\Log;

class HomeContentController extends Controller
{
    public function index()
    {
        $homeContent = HomeContent::firstOrCreate([]);
        return view('admin.home-content.index', compact('homeContent'));
    }

    public function update(Request $request)
    {
        // Debug: Log request data
        Log::info('HomeContent Update Request Data:', [
            'all_data' => $request->all(),
            'has_files' => $request->allFiles(),
            'file_1_exists' => $request->hasFile('hero_banner_image_1'),
            'file_2_exists' => $request->hasFile('hero_banner_image_2'),
            'file_3_exists' => $request->hasFile('hero_banner_image_3'),
        ]);

        $homeContent = HomeContent::firstOrCreate([]);

        // Initialize variables
        $heroBannerImage1 = $homeContent->hero_banner_image_1;
        $heroBannerImage2 = $homeContent->hero_banner_image_2;
        $heroBannerImage3 = $homeContent->hero_banner_image_3;

        Log::info('Initial image values:', [
            'image1' => $heroBannerImage1,
            'image2' => $heroBannerImage2,
            'image3' => $heroBannerImage3,
        ]);

        // Upload hero banner image 1
        if ($request->hasFile('hero_banner_image_1')) {
            try {
                $file = $request->file('hero_banner_image_1');
                Log::info('Processing file 1:', [
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType(),
                    'error' => $file->getError(),
                ]);

                $heroBannerImage1 = time() . '_1.' . $file->getClientOriginalExtension();
                $targetPath = public_path('uploads/hero/' . $heroBannerImage1);

                // Try copy instead of move
                if (copy($file->getPathname(), $targetPath)) {
                    Log::info('File 1 uploaded successfully as: ' . $heroBannerImage1);
                } else {
                    throw new \Exception('Failed to copy file');
                }
            } catch (\Exception $e) {
                Log::error('Failed to upload hero_banner_image_1: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal upload banner image 1: ' . $e->getMessage());
            }
        }

        // Upload hero banner image 2
        if ($request->hasFile('hero_banner_image_2')) {
            try {
                $file = $request->file('hero_banner_image_2');
                Log::info('Processing file 2:', [
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType(),
                    'error' => $file->getError(),
                ]);

                $heroBannerImage2 = time() . '_2.' . $file->getClientOriginalExtension();
                $targetPath = public_path('uploads/hero/' . $heroBannerImage2);

                // Try copy instead of move
                if (copy($file->getPathname(), $targetPath)) {
                    Log::info('File 2 uploaded successfully as: ' . $heroBannerImage2);
                } else {
                    throw new \Exception('Failed to copy file');
                }
            } catch (\Exception $e) {
                Log::error('Failed to upload hero_banner_image_2: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal upload banner image 2: ' . $e->getMessage());
            }
        }

        // Upload hero banner image 3
        if ($request->hasFile('hero_banner_image_3')) {
            try {
                $file = $request->file('hero_banner_image_3');
                Log::info('Processing file 3:', [
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType(),
                    'error' => $file->getError(),
                ]);

                $heroBannerImage3 = time() . '_3.' . $file->getClientOriginalExtension();
                $targetPath = public_path('uploads/hero/' . $heroBannerImage3);

                // Try copy instead of move
                if (copy($file->getPathname(), $targetPath)) {
                    Log::info('File 3 uploaded successfully as: ' . $heroBannerImage3);
                } else {
                    throw new \Exception('Failed to copy file');
                }
            } catch (\Exception $e) {
                Log::error('Failed to upload hero_banner_image_3: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal upload banner image 3: ' . $e->getMessage());
            }
        }

        // Add validation with exception handling
        try {
            $validated = $request->validate([
                // Hero Banner
                'hero_title' => 'nullable|string|max:255',
                'hero_subtitle' => 'nullable|string',
                'hero_banner_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
                'hero_banner_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
                'hero_banner_image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',

                // Profil Singkat
                'profil_tentang' => 'nullable|string',
                'profil_alamat' => 'nullable|string|max:255',
                'profil_email' => 'nullable|email|max:255',
                'profil_instagram' => 'nullable|string|max:255',
                'profil_visi' => 'nullable|string',
                'profil_misi' => 'nullable|string',

                // Statistik
                'statistik_penduduk' => 'nullable|integer|min:0',
                'statistik_rt' => 'nullable|integer|min:0',
                'statistik_rw' => 'nullable|integer|min:0',
                'statistik_layanan' => 'nullable|integer|min:0',

                // Layanan Publik
                'layanan_publik_title' => 'nullable|string|max:255',
                'layanan_publik_desc' => 'nullable|string',
                'layanan_kk_baru' => 'nullable|boolean',
                'layanan_nikah' => 'nullable|boolean',
                'layanan_akte_lahir' => 'nullable|boolean',
                'layanan_akte_mati' => 'nullable|boolean',
                'layanan_uang_duka' => 'nullable|boolean',
                'layanan_tambah_anak' => 'nullable|boolean',
                'layanan_sktm' => 'nullable|boolean',
                'layanan_bpjs' => 'nullable|boolean',
                'layanan_sku' => 'nullable|boolean',

                // Layanan Publik - Persyaratan (arrays)
                'layanan_kk_baru_syarat.*' => 'nullable|string|max:500',
                'layanan_nikah_syarat.*' => 'nullable|string|max:500',
                'layanan_akte_lahir_syarat.*' => 'nullable|string|max:500',
                'layanan_akte_mati_syarat.*' => 'nullable|string|max:500',
                'layanan_uang_duka_syarat.*' => 'nullable|string|max:500',
                'layanan_tambah_anak_syarat.*' => 'nullable|string|max:500',
                'layanan_sktm_syarat.*' => 'nullable|string|max:500',
                'layanan_bpjs_syarat.*' => 'nullable|string|max:500',
                'layanan_sku_syarat.*' => 'nullable|string|max:500',

                // Jelajah Lekop
                'jelajah_fasilitas_title' => 'nullable|string|max:255',
                'jelajah_fasilitas_desc' => 'nullable|string',
                'jelajah_umkm_title' => 'nullable|string|max:255',
                'jelajah_umkm_desc' => 'nullable|string',
                'jelajah_wisata_title' => 'nullable|string|max:255',
                'jelajah_wisata_desc' => 'nullable|string',

                // Testimonial
                'testimonial_text' => 'nullable|string',
                'testimonial_author' => 'nullable|string|max:255',

                // Berita Utama Section
                'berita_title' => 'nullable|string|max:255',
                'berita_link_text' => 'nullable|string|max:255',
                'berita_tab_terkini' => 'nullable|string|max:255',
                'berita_tab_populer' => 'nullable|string|max:255',
                'berita_featured_title' => 'nullable|string|max:255',
                'berita_featured_desc' => 'nullable|string',
                'berita_featured_image' => 'nullable|string|max:255',
                'berita_featured_label' => 'nullable|string|max:255',

                // Social Media Links
                'social_facebook' => 'nullable|string|max:255',
                'social_instagram' => 'nullable|string|max:255',
                'social_youtube' => 'nullable|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed:', [
                'errors' => $e->errors(),
                'request_data' => $request->all(),
            ]);
            return redirect()->back()
                ->withErrors($e->errors())
                ->with('error', 'Validation failed. Please check your input.');
        }

        $homeContent->update(array_merge($validated, [
            'hero_banner_image_1' => $heroBannerImage1,
            'hero_banner_image_2' => $heroBannerImage2,
            'hero_banner_image_3' => $heroBannerImage3,
        ]));

        // Handle layanan persyaratan arrays separately
        $layananSyaratFields = [
            'layanan_kk_baru_syarat',
            'layanan_nikah_syarat',
            'layanan_akte_lahir_syarat',
            'layanan_akte_mati_syarat',
            'layanan_uang_duka_syarat',
            'layanan_tambah_anak_syarat',
            'layanan_sktm_syarat',
            'layanan_bpjs_syarat',
            'layanan_sku_syarat',
        ];

        foreach ($layananSyaratFields as $field) {
            $syaratArray = $request->input($field, []);
            // Filter out empty values and re-index
            $filteredArray = array_values(array_filter($syaratArray, function ($value) {
                return !is_null($value) && trim($value) !== '';
            }));
            $homeContent->{$field} = !empty($filteredArray) ? implode("\n", $filteredArray) : null;
        }

        // Handle layanan status checkboxes
        $layananStatusFields = [
            'layanan_kk_baru',
            'layanan_nikah',
            'layanan_akte_lahir',
            'layanan_akte_mati',
            'layanan_uang_duka',
            'layanan_tambah_anak',
            'layanan_sktm',
            'layanan_bpjs',
            'layanan_sku',
        ];

        // Store checkbox states in session for restoration after redirect
        $checkboxStates = [];
        foreach ($layananStatusFields as $field) {
            $isChecked = $request->has($field) ? 1 : 0;
            $homeContent->{$field} = $isChecked;
            $checkboxStates[$field] = $isChecked;
        }

        // Flash checkbox states to session
        session()->flash('layanan_checkbox_states', $checkboxStates);

        $homeContent->save();

        Log::info('HomeContent updated successfully:', [
            'id' => $homeContent->id,
            'final_image1' => $heroBannerImage1,
            'final_image2' => $heroBannerImage2,
            'final_image3' => $heroBannerImage3,
        ]);

        return redirect()->route('admin.home-content.index')
            ->with('success', 'Konten halaman beranda berhasil diperbarui!');
    }
}
