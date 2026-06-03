<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RestaurantMenuItemImage extends Model
{
    protected $fillable = ['menu_item_id', 'image_path', 'sort_order'];

    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(RestaurantMenuItem::class, 'menu_item_id');
    }
}
