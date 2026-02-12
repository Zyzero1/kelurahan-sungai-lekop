<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footer';

    protected $fillable = [
        'kategori',
        'judul',
        'konten',
        'url',
        'icon',
        'urutan',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'urutan' => 'integer'
    ];

    public function scopeAktif($query)
    {
        return $query->where('status', true);
    }

    public function scopeUrut($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
