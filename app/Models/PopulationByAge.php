<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopulationByAge extends Model
{
    protected $table = 'population_by_age';

    protected $fillable = [
        'age_group',
        'male_count',
        'female_count',
        'total_count',
        'sort_order'
    ];

    protected $casts = [
        'male_count' => 'integer',
        'female_count' => 'integer',
        'total_count' => 'integer',
        'sort_order' => 'integer'
    ];
}
