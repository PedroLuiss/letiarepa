<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use App\Models\RestaurantMenuItem;
use App\Models\RestaurantMenuItemImage;
use Illuminate\Database\Seeder;

class RestaurantMenuSeeder extends Seeder
{
    private function createItem(int $categoryId, string $name, string $slug, string $description, float $price, array $images, int $sort): void
    {
        $item = RestaurantMenuItem::create([
            'category_id' => $categoryId,
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'price' => $price,
            'image' => $images[0],
            'sort_order' => $sort,
        ]);

        foreach ($images as $i => $path) {
            RestaurantMenuItemImage::create([
                'menu_item_id' => $item->id,
                'image_path' => $path,
                'sort_order' => $i,
            ]);
        }
    }

    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        RestaurantMenuItemImage::truncate();
        RestaurantMenuItem::truncate();
        RestaurantCategory::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $catArepa = RestaurantCategory::create(['name' => 'AREpa', 'slug' => 'arepa', 'sort_order' => 0]);
        $catParrillas = RestaurantCategory::create(['name' => 'PARRILLAS', 'slug' => 'parrillas', 'sort_order' => 1]);
        $catPatacon = RestaurantCategory::create(['name' => 'PATACON', 'slug' => 'patacon', 'sort_order' => 2]);
        $catCachapas = RestaurantCategory::create(['name' => 'CACHAPAS', 'slug' => 'cachapas', 'sort_order' => 3]);
        $catBurgers = RestaurantCategory::create(['name' => 'BURGERS', 'slug' => 'burgers', 'sort_order' => 4]);
        $catPepitos = RestaurantCategory::create(['name' => 'PEPITOS', 'slug' => 'pepitos', 'sort_order' => 5]);
        $catAperitivos = RestaurantCategory::create(['name' => 'APERITIVOS', 'slug' => 'aperitivos', 'sort_order' => 6]);
        $catBebidas = RestaurantCategory::create(['name' => 'BEBIDAS', 'slug' => 'bebidas', 'sort_order' => 7]);

        $fallback = 'letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png';

        // AREpa items — each with 2 images (miniaturas + detalle)
        $this->createItem($catArepa->id, 'AREPA DE PABELLÓN', 'pabellon',
            'Carne mechada, caraotas, plátanos maduros, queso blanco.',
            13.00, [
                'letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-DE-PABELLON-DETALLE.png',
            ], 0);

        $this->createItem($catArepa->id, 'AREPA DE REINA PEPIADA', 'reina_pepiada',
            'Pollo mechado, aguacate (Palta), mayonesa, queso blanco.',
            12.00, [
                'letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-REINA-PEPIADA-DETALLE.png',
            ], 1);

        $this->createItem($catArepa->id, 'AREPA DE LETIAREPA', 'letiarepa',
            'Carne asada, pico de gallo (ensalada típica), queso blanco.',
            14.00, [
                'letiarepa/images/arepas/AREPA-LETIAREPA-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-LETIAREPA-DETALLE.png',
            ], 2);

        $this->createItem($catArepa->id, 'AREPA PELUA', 'pelua',
            'Carne mechada, queso amarillo.',
            12.00, [
                'letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-REINA-PEPIADA-DETALLE.png',
            ], 3);

        // PARRILLAS — 1 image each
        $this->createItem($catParrillas->id, 'PARRILLA MIXTA', 'parrilla-mixta',
            'Carne, pollo, chorizo y vegetales asados a la parrilla, servidos con guasacaca y arepas.',
            28.00, [$fallback], 0);

        $this->createItem($catParrillas->id, 'PARRILLA DE POLLO', 'parrilla-pollo',
            'Pechuga de pollo marinada a la parrilla, acompañada de vegetales salteados y papas.',
            18.00, [$fallback], 1);

        $this->createItem($catParrillas->id, 'PARRILLA DE RES', 'parrilla-res',
            'Carne asada al carbón, servida con chimichurri, vegetales asados y arepa.',
            22.00, [$fallback], 2);

        // PATACON — 1 image each
        $this->createItem($catPatacon->id, 'PATACÓN DE POLLO', 'patacon-pollo',
            'Patacón de plátano verde relleno de pollo mechado, lechuga, tomate y salsas.',
            14.00, [$fallback], 0);

        $this->createItem($catPatacon->id, 'PATACÓN DE CARNE', 'patacon-carne',
            'Patacón de plátano verde relleno de carne mechada, queso amarillo y ensalada.',
            15.00, [$fallback], 1);

        $this->createItem($catPatacon->id, 'PATACÓN MIXTO', 'patacon-mixto',
            'Patacón de plátano verde relleno de carne y pollo, con todos los acompañantes.',
            16.00, [$fallback], 2);

        // CACHAPAS — 1 image each
        $this->createItem($catCachapas->id, 'CACHAPA CON QUESO', 'cachapa-queso',
            'Cachapa de maíz dulce rellena de queso blanco, crema de leche y mantequilla.',
            11.00, [$fallback], 0);

        $this->createItem($catCachapas->id, 'CACHAPA CON CARNE', 'cachapa-carne',
            'Cachapa de maíz dulce rellena de carne mechada y queso blanco.',
            15.00, [$fallback], 1);

        $this->createItem($catCachapas->id, 'CACHAPA CON POLLO', 'cachapa-pollo',
            'Cachapa de maíz dulce rellena de pollo mechado y queso blanco.',
            14.00, [$fallback], 2);

        // BURGERS — 1 image each
        $this->createItem($catBurgers->id, 'HAMBURGUESA CLÁSICA', 'burger-clasica',
            'Carne de res, lechuga, tomate, cebolla, pepinillos y nuestra salsa especial.',
            12.00, [$fallback], 0);

        $this->createItem($catBurgers->id, 'HAMBURGUESA CON QUESO', 'burger-queso',
            'Carne de res, queso amarillo, lechuga, tomate y salsa especial.',
            13.00, [$fallback], 1);

        $this->createItem($catBurgers->id, 'HAMBURGUESA ESPECIAL', 'burger-especial',
            'Doble carne, doble queso, tocineta, huevo, lechuga, tomate y nuestra salsa de la casa.',
            16.00, [$fallback], 2);

        // PEPITOS — 1 image each
        $this->createItem($catPepitos->id, 'PEPITO DE CARNE', 'pepito-carne',
            'Pan artesanal relleno de carne mechada, queso amarillo, vegetales y salsas.',
            14.00, [$fallback], 0);

        $this->createItem($catPepitos->id, 'PEPITO DE POLLO', 'pepito-pollo',
            'Pan artesanal relleno de pollo mechado, queso amarillo, vegetales y salsas.',
            13.00, [$fallback], 1);

        $this->createItem($catPepitos->id, 'PEPITO MIXTO', 'pepito-mixto',
            'Pan artesanal relleno de carne y pollo, queso amarillo, vegetales y salsas.',
            15.00, [$fallback], 2);

        // APERITIVOS — 1 image each
        $this->createItem($catAperitivos->id, 'TEQUEÑOS (6 UND)', 'tequenos',
            '6 tequeños de queso blanco fritos, servidos con salsa de ajo.',
            9.00, [$fallback], 0);

        $this->createItem($catAperitivos->id, 'EMPANADAS (2 UND)', 'empanadas',
            '2 empanadas de carne o pollo, servidas con guasacaca.',
            8.00, [$fallback], 1);

        $this->createItem($catAperitivos->id, 'YOYOS DE PLÁTANO', 'yoyos',
            'Yoyos de plátano dulce rellenos de queso blanco, servidos con crema de leche.',
            7.00, [$fallback], 2);

        // BEBIDAS — 1 image each
        $this->createItem($catBebidas->id, 'COCA COLA', 'coca-cola',
            'Coca Cola personal 355ml.',
            2.00, [$fallback], 0);

        $this->createItem($catBebidas->id, 'AGUA', 'agua',
            'Agua embotellada 500ml.',
            2.00, [$fallback], 1);

        $this->createItem($catBebidas->id, 'JUGO NATURAL', 'jugo-natural',
            'Jugo natural de parchita, mango o guayaba.',
            4.00, [$fallback], 2);
    }
}
