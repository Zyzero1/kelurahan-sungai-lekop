<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelurahanSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelurahan',
        'logo_path'
    ];

    public static function getSetting()
    {
        return self::firstOrCreate([], [
            'nama_kelurahan' => 'Kelurahan Sungai Lekop',
            'logo_path' => 'images/Bintan-Logo.png'
        ]);
    }
}
