<?php

namespace Database\Seeders;

use App\Models\FrozenCategory;
use App\Models\FrozenPresentationItem;
use App\Models\FrozenProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrozenMenuSeeder extends Seeder
{
    public function run(): void
    {
        // --- Categories ---
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        FrozenPresentationItem::truncate();
        FrozenCategory::truncate();
        FrozenProduct::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $catProteinas = FrozenCategory::create([
            'name' => 'PROTEINAS',
            'slug' => 'proteinas',
            'sort_order' => 0,
            'is_active' => true,
            'is_available' => true,
            'has_combo' => true,
            'combo_slug' => 'protein-combo',
            'combo_name' => 'Combo Proteinas',
            'combo_price' => 26.00,
            'combo_image' => 'letiarepa/images/productos-congelados-header.png',
        ]);

        $catTequenos = FrozenCategory::create([
            'name' => 'TEQUEÑOS',
            'slug' => 'tequenos',
            'sort_order' => 1,
            'is_active' => false,
            'is_available' => true,
        ]);

        $catEmpanadas = FrozenCategory::create([
            'name' => 'EMPANADAS',
            'slug' => 'empanadas',
            'sort_order' => 2,
            'is_active' => false,
            'is_available' => true,
        ]);

        // --- Presentation items for PROTEINAS ---
        FrozenPresentationItem::create([
            'category_id' => $catProteinas->id,
            'name' => '1 LIBRA DE POLLO MECHADO',
            'sort_order' => 0,
        ]);

        FrozenPresentationItem::create([
            'category_id' => $catProteinas->id,
            'name' => '1 LIBRA DE CARNE MECHADA',
            'sort_order' => 1,
        ]);

        // --- Presentation items for TEQUEÑOS ---
        FrozenPresentationItem::create(['category_id' => $catTequenos->id, 'name' => '6 unidades', 'sort_order' => 0]);
        FrozenPresentationItem::create(['category_id' => $catTequenos->id, 'name' => '12 unidades', 'sort_order' => 1]);
        FrozenPresentationItem::create(['category_id' => $catTequenos->id, 'name' => '24 unidades', 'sort_order' => 2]);

        // --- Presentation items for EMPANADAS ---
        FrozenPresentationItem::create(['category_id' => $catEmpanadas->id, 'name' => '6 unidades', 'sort_order' => 0]);
        FrozenPresentationItem::create(['category_id' => $catEmpanadas->id, 'name' => '12 unidades', 'sort_order' => 1]);
        FrozenPresentationItem::create(['category_id' => $catEmpanadas->id, 'name' => '24 unidades', 'sort_order' => 2]);

        // --- Products ---
        FrozenProduct::create([
            'name' => 'CARNE MECHADA',
            'slug' => 'carne_mechada_frozen',
            'description' => 'Deliciosa carne mechada, cocida con una receta tradicional venezolana.',
            'price' => 13.00,
            'presentation' => '1 LIBRA',
            'image' => 'letiarepa/images/producto-congelado-miniatura-mechada.png',
            'category_slug' => 'proteinas',
            'sort_order' => 0,
        ]);

        FrozenProduct::create([
            'name' => 'POLLO MECHADO',
            'slug' => 'pollo_mechado_frozen',
            'description' => 'Delicioso pollo mechado, cocido con una receta tradicional venezolana.',
            'price' => 13.00,
            'presentation' => '1 LIBRA',
            'image' => 'letiarepa/images/producto-congelado-miniatura-pollo.png',
            'category_slug' => 'proteinas',
            'sort_order' => 1,
        ]);

        // --- TEQUEÑOS products ---
        FrozenProduct::create([
            'name' => 'TEQUEÑOS DE QUESO',
            'slug' => 'tequenos-de-queso',
            'description' => 'Tequeños crujientes rellenos de queso blanco.',
            'price' => 8.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Tequeños-2.jpg',
            'category_slug' => 'tequenos',
            'sort_order' => 2,
        ]);
        FrozenProduct::create([
            'name' => 'TEQUEÑOS DE CHOCOLATE',
            'slug' => 'tequenos-de-chocolate',
            'description' => 'Tequeños dulces rellenos de chocolate.',
            'price' => 9.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Tequeños-2.jpg',
            'category_slug' => 'tequenos',
            'sort_order' => 3,
        ]);
        FrozenProduct::create([
            'name' => 'TEQUEÑOS DE PLÁTANO',
            'slug' => 'tequenos-de-platano',
            'description' => 'Tequeños rellenos de plátano maduro.',
            'price' => 8.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Tequeños-2.jpg',
            'category_slug' => 'tequenos',
            'sort_order' => 4,
        ]);

        // --- EMPANADAS products ---
        FrozenProduct::create([
            'name' => 'EMPANADAS DE CARNE',
            'slug' => 'empanadas-de-carne',
            'description' => 'Empanadas de harina de maíz rellenas de carne mechada.',
            'price' => 7.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
            'category_slug' => 'empanadas',
            'sort_order' => 5,
        ]);
        FrozenProduct::create([
            'name' => 'EMPANADAS DE POLLO',
            'slug' => 'empanadas-de-pollo',
            'description' => 'Empanadas de harina de maíz rellenas de pollo mechado.',
            'price' => 7.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
            'category_slug' => 'empanadas',
            'sort_order' => 6,
        ]);
        FrozenProduct::create([
            'name' => 'EMPANADAS DE QUESO',
            'slug' => 'empanadas-de-queso',
            'description' => 'Empanadas de harina de maíz rellenas de queso.',
            'price' => 7.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
            'category_slug' => 'empanadas',
            'sort_order' => 7,
        ]);
        FrozenProduct::create([
            'name' => 'EMPANADAS DE QUESO',
            'slug' => 'empanadas-de-pabellon-con-queso',
            'description' => 'Empanadas de harina de maíz rellenas de queso.',
            'price' => 7.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
            'category_slug' => 'empanadas',
            'sort_order' => 8,
        ]);
        FrozenProduct::create([
            'name' => 'EMPANADAS DE QUESO',
            'slug' => 'empanadas-de-pabellon',
            'description' => 'Empanadas de harina de maíz rellenas de queso.',
            'price' => 7.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
            'category_slug' => 'empanadas',
            'sort_order' => 9,
        ]);
        FrozenProduct::create([
            'name' => 'EMPANADAS DE QUESO',
            'slug' => 'empanadas-de-peluass',
            'description' => 'Empanadas de harina de maíz rellenas de queso.',
            'price' => 7.00,
            'presentation' => '6 unidades',
            'image' => 'letiarepa/images/Aperitivos/Empanadas.jpg',
            'category_slug' => 'empanadas',
            'sort_order' => 10,
        ]);
    }
}
