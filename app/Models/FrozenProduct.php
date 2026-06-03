<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrozenProduct extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'price',
        'presentation', 'image', 'is_available', 'sort_order',
    ];

    protected $casts = [
        'price' => 'float',
        'is_available' => 'boolean',
    ];
}
