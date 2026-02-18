<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Navigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'url',
        'ikon',
        'is_active',
        'urutan',
        'target'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('nama', 'asc');
    }
}
