<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';

    protected $fillable = [
        'alamat',
        'telepon',
        'email',
        'jam_operasional',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'google_maps_embed'
    ];
}
