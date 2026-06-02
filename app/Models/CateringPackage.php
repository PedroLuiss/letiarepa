<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CateringPackage extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'image', 'sort_order', 'is_available'];

    protected $casts = [
        'price' => 'float',
        'is_available' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(CateringPackageItem::class, 'package_id')->orderBy('sort_order');
    }
}
