<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class JelajahLekop extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe',
        'kategori',
        'nama',
        'deskripsi',
        'lokasi',
        'gambar',
        'galeri',
        'detail',
        'status',
        'urutan',
        'hero_image',
        'hero_content',
    ];

    protected $casts = [
        'galeri' => 'array',
        'detail' => 'array',
    ];

    // Scope untuk filter berdasarkan tipe
    public function scopeTipe($query, $tipe)
    {
        return $query->where('tipe', $tipe);
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk yang aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk sorting berdasarkan urutan
    public function scopeUrut($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('created_at', 'asc');
    }

    // Accessor untuk gambar URL
    protected function gambarUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                $gambar = $this->gambar;
                if ($gambar && !empty($gambar)) {
                    return asset('uploads/jelajah-lekop/' . $gambar);
                }
                // Fallback to default image based on type
                return asset('images/default-' . ($this->tipe ?? 'fasilitas') . '.jpg');
            },
        );
    }

    // Method untuk cek apakah gambar ada
    public function hasGambar()
    {
        if ($this->gambar) {
            $path = public_path('uploads/jelajah-lekop/' . $this->gambar);
            $normalizedPath = str_replace('/', DIRECTORY_SEPARATOR, $path);
            return file_exists($normalizedPath);
        }
        return false;
    }

    // Accessor untuk hero image URL
    protected function heroImageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                $heroImage = $this->hero_image;
                if ($heroImage && !empty($heroImage)) {
                    return asset('uploads/jelajah-lekop/' . $heroImage);
                }
                return null;
            },
        );
    }

    // Accessor untuk galeri URLs
    protected function galeriUrls(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$this->galeri) return [];
                return collect($this->galeri)->map(function ($gambar) {
                    return asset('uploads/jelajah-lekop/' . $gambar);
                })->toArray();
            },
        );
    }

    // Method untuk mendapatkan detail spesifik berdasarkan tipe
    public function getDetailSpesifik()
    {
        $detail = $this->detail ?? [];

        switch ($this->tipe) {
            case 'sentra_industri':
                return [
                    'ikon' => $detail['ikon'] ?? 'fa-industry',
                    'highlight' => $detail['highlight'] ?? '',
                    'lokasi_spesifik' => $detail['lokasi_spesifik'] ?? '',
                    'produk_unggulan' => $detail['produk_unggulan'] ?? [],
                ];

            case 'fasilitas':
                return [
                    'ikon' => $detail['ikon'] ?? 'fa-building',
                    'warna_label' => $detail['warna_label'] ?? 'bg-blue-100 text-blue-800',
                    'kontak' => $detail['kontak'] ?? '',
                    'jam_operasional' => $detail['jam_operasional'] ?? '',
                ];

            case 'umkm':
                return [
                    'ikon' => $detail['ikon'] ?? 'fa-store',
                    'badge' => $detail['badge'] ?? '',
                    'badge_color' => $detail['badge_color'] ?? 'bg-gray-500',
                    'produk' => $detail['produk'] ?? [],
                    'harga' => $detail['harga'] ?? '',
                    'pemilik' => $detail['pemilik'] ?? '',
                    'telepon' => $detail['telepon'] ?? '',
                    'tahun_berdiri' => $detail['tahun_berdiri'] ?? '',
                    'keunikan' => $detail['keunikan'] ?? '',
                ];

            case 'galeri_kegiatan':
                return [
                    'kategori_galeri' => $detail['kategori_galeri'] ?? 'umum',
                    'tanggal' => $detail['tanggal'] ?? '',
                    'deskripsi_singkat' => $detail['deskripsi_singkat'] ?? '',
                ];

            default:
                return [];
        }
    }

    // Method untuk mendapatkan label kategori yang readable
    public function getLabelKategori()
    {
        $labels = [
            'puskesmas' => 'Puskesmas',
            'posyandu' => 'Posyandu',
            'sd' => 'SD',
            'smp' => 'SMP',
            'sma' => 'SMA/SMK/MAN',
            'masjid' => 'Masjid',
            'surau' => 'Surau',
            'tpa' => 'TPA/TPQ',
        ];

        return $labels[$this->kategori] ?? ucfirst($this->kategori);
    }

    // Method untuk mendapatkan label tipe yang readable
    public function getLabelTipe()
    {
        $labels = [
            'sentra_industri' => 'Sentra Industri',
            'fasilitas' => 'Fasilitas',
            'umkm' => 'UMKM',
            'galeri_kegiatan' => 'Galeri Kegiatan',
        ];

        return $labels[$this->tipe] ?? ucfirst($this->tipe);
    }

    // Method untuk menghapus gambar lama
    public function hapusGambarLama($gambarBaru = null)
    {
        // Hapus gambar utama lama jika ada dan berbeda dengan yang baru
        if ($this->gambar && $this->gambar !== $gambarBaru) {
            $pathLama = public_path('uploads/jelajah-lekop/' . $this->gambar);
            if (file_exists($pathLama)) {
                unlink($pathLama);
            }
        }

        // Hapus gambar dari galeri lama jika ada
        if ($this->galeri && is_array($this->galeri)) {
            foreach ($this->galeri as $gambarLama) {
                if ($gambarBaru && is_array($gambarBaru) && !in_array($gambarLama, $gambarBaru)) {
                    $pathLama = public_path('uploads/jelajah-lekop/' . $gambarLama);
                    if (file_exists($pathLama)) {
                        unlink($pathLama);
                    }
                }
            }
        }
    }

    // Method untuk membersihkan gambar yang tidak terpakai
    public static function bersihkanGambarTidakTerpakai()
    {
        $path = public_path('uploads/jelajah-lekop/');
        $files = glob($path . '*');

        // Dapatkan semua gambar yang terpakai di database
        $gambarTerpakai = [];
        $allRecords = self::all();

        foreach ($allRecords as $record) {
            if ($record->gambar) {
                $gambarTerpakai[] = $record->gambar;
            }
            if ($record->galeri && is_array($record->galeri)) {
                $gambarTerpakai = array_merge($gambarTerpakai, $record->galeri);
            }
            if ($record->hero_image) {
                $gambarTerpakai[] = $record->hero_image;
            }
        }

        // Hapus file yang tidak terpakai
        foreach ($files as $file) {
            $filename = basename($file);
            if (!in_array($filename, $gambarTerpakai) && is_file($file)) {
                unlink($file);
            }
        }
    }

    // Boot model untuk auto-cleanup
    protected static function boot()
    {
        parent::boot();

        // Event saat update
        static::updating(function ($model) {
            // Simpan data lama sebelum update
            $model->original_gambar = $model->getOriginal('gambar');
            $model->original_galeri = $model->getOriginal('galeri');
            $model->original_hero_image = $model->getOriginal('hero_image');
        });

        // Event setelah update
        static::updated(function ($model) {
            // Hapus gambar lama jika berubah
            if ($model->original_gambar && $model->original_gambar !== $model->gambar) {
                $pathLama = public_path('uploads/jelajah-lekop/' . $model->original_gambar);
                if (file_exists($pathLama)) {
                    unlink($pathLama);
                }
            }

            // Hapus galeri lama jika berubah
            if ($model->original_galeri && is_array($model->original_galeri)) {
                $galeriBaru = $model->galeri ?? [];
                foreach ($model->original_galeri as $gambarLama) {
                    if (!in_array($gambarLama, $galeriBaru)) {
                        $pathLama = public_path('uploads/jelajah-lekop/' . $gambarLama);
                        if (file_exists($pathLama)) {
                            unlink($pathLama);
                        }
                    }
                }
            }

            // Hapus hero image lama jika berubah
            if ($model->original_hero_image && $model->original_hero_image !== $model->hero_image) {
                $pathLama = public_path('uploads/jelajah-lekop/' . $model->original_hero_image);
                if (file_exists($pathLama)) {
                    unlink($pathLama);
                }
            }
        });

        // Event saat delete
        static::deleting(function ($model) {
            // Hapus semua gambar terkait
            if ($model->gambar) {
                $path = public_path('uploads/jelajah-lekop/' . $model->gambar);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            if ($model->galeri && is_array($model->galeri)) {
                foreach ($model->galeri as $gambar) {
                    $path = public_path('uploads/jelajah-lekop/' . $gambar);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }

            if ($model->hero_image) {
                $path = public_path('uploads/jelajah-lekop/' . $model->hero_image);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        });
    }
}
