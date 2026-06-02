<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FrozenCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'sort_order', 'is_active', 'is_available',
        'has_combo', 'combo_slug', 'combo_name', 'combo_price', 'combo_image',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_available' => 'boolean',
        'has_combo' => 'boolean',
        'combo_price' => 'float',
    ];

    public function presentationItems(): HasMany
    {
        return $this->hasMany(FrozenPresentationItem::class, 'category_id')->orderBy('sort_order');
    }
}
