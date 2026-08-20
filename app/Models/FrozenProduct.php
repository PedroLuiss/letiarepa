<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrozenProduct extends Model
{
    private const IMAGE_OVERRIDES = [
        'carne_mechada_frozen' => 'letiarepa/images/producto-congelado-miniatura-mechada.png',
        'pollo_mechado_frozen' => 'letiarepa/images/producto-congelado-miniatura-pollo.png',
        'tequenos-de-queso' => 'letiarepa/images/Aperitivos/Tequeños-2.jpg',
        'tequenos-de-chocolate' => 'letiarepa/images/Aperitivos/Tequeños-2.jpg',
        'tequenos-de-platano' => 'letiarepa/images/Aperitivos/Tequeños-2.jpg',
        'empanadas-de-carne' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
        'empanadas-de-pollo' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
        'empanadas-de-queso' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
        'empanadas-de-pabellon-con-queso' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
        'empanadas-de-pabellon' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
        'empanadas-de-peluass' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
    ];

    protected $fillable = [
        'name', 'slug', 'description', 'price',
        'presentation', 'image', 'is_available', 'sort_order',
    ];

    protected $casts = [
        'price' => 'float',
        'is_available' => 'boolean',
    ];

    public function getImageAttribute($value): string
    {
        $slug = $this->attributes['slug'] ?? '';

        return self::IMAGE_OVERRIDES[$slug] ?? $value;
    }
}
