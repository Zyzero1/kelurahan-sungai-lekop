<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        // Informasi Umum
        'nama_kelurahan',
        'alamat',
        'kode_pos',
        'luas_wilayah',
        'jumlah_rw',
        'jumlah_rt',

        // Pimpinan & Identitas
        'nama_lurah',
        'nip_lurah',
        'foto_lurah',
        'email',
        'telepon',
        'motto_lurah',

        // Visi & Misi
        'visi',
        'misi',

        // Sejarah
        'sejarah',

        // Struktur
        'struktur',
    ];
}
