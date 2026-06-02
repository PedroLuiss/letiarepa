<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestaurantMenuItem extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'description',
        'price', 'image', 'sort_order', 'is_available',
    ];

    protected $casts = [
        'price' => 'float',
        'is_available' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(RestaurantCategory::class, 'category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(RestaurantMenuItemImage::class, 'menu_item_id')->orderBy('sort_order');
    }

    public function getImagesCountAttribute(): int
    {
        return $this->images()->count();
    }
}
