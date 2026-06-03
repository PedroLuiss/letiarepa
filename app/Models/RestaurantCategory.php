<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestaurantCategory extends Model
{
    protected $fillable = ['name', 'slug', 'sort_order'];

    public function menuItems(): HasMany
    {
        return $this->hasMany(RestaurantMenuItem::class, 'category_id');
    }
}
