<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use App\Models\RestaurantMenuItem;
use App\Models\RestaurantMenuItemImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        RestaurantMenuItemImage::truncate();
        RestaurantMenuItem::truncate();
        RestaurantCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

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
        $this->createItem(
            $catArepa->id,
            'AREPA DE PABELLÓN',
            'pabellon',
            'Carne mechada, caraotas, plátanos maduros, queso blanco.',
            13.00,
            [
                'letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-DE-PABELLON-DETALLE.png',
            ],
            0
        );

        $this->createItem(
            $catArepa->id,
            'AREPA DE REINA PEPIADA',
            'reina_pepiada',
            'Pollo mechado, aguacate (Palta), mayonesa, queso blanco.',
            12.00,
            [
                'letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-REINA-PEPIADA-DETALLE.png',
            ],
            1
        );

        $this->createItem(
            $catArepa->id,
            'AREPA DE LETIAREPA',
            'letiarepa',
            'Carne asada, pico de gallo (ensalada típica), queso blanco.',
            14.00,
            [
                'letiarepa/images/arepas/AREPA-LETIAREPA-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-LETIAREPA-DETALLE.png',
            ],
            2
        );

        $this->createItem(
            $catArepa->id,
            'AREPA PELUA',
            'pelua',
            'Carne mechada, queso amarillo.',
            12.00,
            [
                'letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-REINA-PEPIADA-DETALLE.png',
            ],
            3
        );

        // PARRILLAS — Usar imágenes reales de la carpeta Parrillas
        $this->createItem(
            $catParrillas->id,
            'PARRILLA MIXTA',
            'parrilla-mixta',
            'Carne, pollo, chorizo y vegetales asados a la parrilla, servidos con guasacaca y arepas.',
            28.00,
            ['letiarepa/images/Parrillas/Yaracuyana-1.jpg'],
            0
        );

        $this->createItem(
            $catParrillas->id,
            'PARRILLA DE POLLO',
            'parrilla-pollo',
            'Pechuga de pollo marinada a la parrilla, acompañada de vegetales salteados y papas.',
            18.00,
            ['letiarepa/images/Parrillas/Yaracuyana-2.jpg'],
            1
        );

        $this->createItem(
            $catParrillas->id,
            'PARRILLA DE RES',
            'parrilla-res',
            'Carne asada al carbón, servida con chimichurri, vegetales asados y arepa.',
            22.00,
            ['letiarepa/images/Parrillas/Yaracuyana-3.jpg'],
            2
        );

        // PATACON — Usar imágenes reales de la carpeta Patacones
        $this->createItem(
            $catPatacon->id,
            'PATACÓN DE POLLO',
            'patacon-pollo',
            'Patacón de plátano verde relleno de pollo mechado, lechuga, tomate y salsas.',
            14.00,
            ['letiarepa/images/Patacones/Patacon-de-pollo -1.jpg'],
            0
        );

        $this->createItem(
            $catPatacon->id,
            'PATACÓN DE CARNE',
            'patacon-carne',
            'Patacón de plátano verde relleno de carne mechada, queso amarillo y ensalada.',
            15.00,
            ['letiarepa/images/Patacones/patacon-carne.jpg'],
            1
        );

        $this->createItem(
            $catPatacon->id,
            'PATACÓN MIXTO',
            'patacon-mixto',
            'Patacón de plátano verde relleno de carne y pollo, con todos los acompañantes.',
            16.00,
            ['letiarepa/images/Patacones/Patacon-de-pollo-2.jpg'],
            2
        );

        // CACHAPAS — Usar imágenes reales de la carpeta cachapas
        $this->createItem(
            $catCachapas->id,
            'CACHAPA CON QUESO',
            'cachapa-queso',
            'Cachapa de maíz dulce rellena de queso blanco, crema de leche y mantequilla.',
            11.00,
            ['letiarepa/images/cachapas/Cachapa-de-queso 1.jpg'],
            0
        );

        $this->createItem(
            $catCachapas->id,
            'CACHAPA CON CARNE',
            'cachapa-carne',
            'Cachapa de maíz dulce rellena de carne mechada y queso blanco.',
            15.00,
            ['letiarepa/images/cachapas/Cachapa-carne-mechada-1.jpg'],
            1
        );

        $this->createItem(
            $catCachapas->id,
            'CACHAPA CON POLLO',
            'cachapa-pollo',
            'Cachapa de maíz dulce rellena de pollo mechado y queso blanco.',
            14.00,
            ['letiarepa/images/cachapas/cachapa-de-mechada-2.jpg'],
            2
        );

        // BURGERS — Usar imágenes reales de la carpeta Hamburgesas
        $this->createItem(
            $catBurgers->id,
            'HAMBURGUESA CLÁSICA',
            'burger-clasica',
            'Carne de res, lechuga, tomate, cebolla, pepinillos y nuestra salsa especial.',
            12.00,
            ['letiarepa/images/Hamburgesas/hamburguesa-criolla.jpg'],
            0
        );

        $this->createItem(
            $catBurgers->id,
            'HAMBURGUESA CON QUESO',
            'burger-queso',
            'Carne de res, queso amarillo, lechuga, tomate y salsa especial.',
            13.00,
            ['letiarepa/images/Hamburgesas/hamburguesa-picahna.jpg'],
            1
        );

        $this->createItem(
            $catBurgers->id,
            'HAMBURGUESA ESPECIAL',
            'burger-especial',
            'Doble carne, doble queso, tocineta, huevo, lechuga, tomate y nuestra salsa de la casa.',
            16.00,
            ['letiarepa/images/Hamburgesas/hamburguesa-triple.jpg'],
            2
        );

        // PEPITOS — Usar imágenes reales de la carpeta Pepitos
        $this->createItem(
            $catPepitos->id,
            'PEPITO DE CARNE',
            'pepito-carne',
            'Pan artesanal relleno de carne mechada, queso amarillo, vegetales y salsas.',
            14.00,
            ['letiarepa/images/Pepitos/pepito-guaro.jpg'],
            0
        );

        $this->createItem(
            $catPepitos->id,
            'PEPITO DE POLLO',
            'pepito-pollo',
            'Pan artesanal relleno de pollo mechado, queso amarillo, vegetales y salsas.',
            13.00,
            ['letiarepa/images/Pepitos/pepito-mar-y-tierra.jpg'],
            1
        );

        $this->createItem(
            $catPepitos->id,
            'PEPITO MIXTO',
            'pepito-mixto',
            'Pan artesanal relleno de carne y pollo, queso amarillo, vegetales y salsas.',
            15.00,
            ['letiarepa/images/Pepitos/pepito-parrillero.jpg'],
            2
        );
        $this->createItem(
            $catPepitos->id,
            'PEPITO MIXTO1',
            'pepito-mixto1',
            'Pan artesanal relleno de carne y pollo, queso amarillo, vegetales y salsas.',
            15.00,
            ['letiarepa/images/Pepitos/pepito-guaro-3.jpg'],
            3
        );
        $this->createItem(
            $catPepitos->id,
            'PEPITO MIXTO2',
            'pepito-mixto2',
            'Pan artesanal relleno de carne y pollo, queso amarillo, vegetales y salsas.',
            15.00,
            ['letiarepa/images/Pepitos/pepito-guaro-4.jpg'],
            3
        );
        $this->createItem(
            $catPepitos->id,
            'PEPITO MIXTO3',
            'pepito-mixto3',
            'Pan artesanal relleno de carne y pollo, queso amarillo, vegetales y salsas.',
            15.00,
            ['letiarepa/images/Pepitos/pepito-guaro-3.jpg'],
            4
        );
        $this->createItem(
            $catPepitos->id,
            'PEPITO MIXTO4',
            'pepito-mixto4',
            'Pan artesanal relleno de carne y pollo, queso amarillo, vegetales y salsas.',
            15.00,
            ['letiarepa/images/Pepitos/pepito-guaro-4.jpg'],
            5
        );

        // APERITIVOS — Usar imágenes reales de la carpeta Aperitivos
        $this->createItem(
            $catAperitivos->id,
            'TEQUEÑOS (6 UND)',
            'tequenos',
            '6 tequeños de queso blanco fritos, servidos con salsa de ajo.',
            9.00,
            ['letiarepa/images/Aperitivos/Tequeños-2.jpg'],
            0
        );

        $this->createItem(
            $catAperitivos->id,
            'EMPANADAS (2 UND)',
            'empanadas',
            '2 empanadas de carne o pollo, servidas con guasacaca.',
            8.00,
            ['letiarepa/images/Aperitivos/Empanadas.jpg'],
            1
        );

        $this->createItem(
            $catAperitivos->id,
            'YOYOS DE PLÁTANO',
            'yoyos',
            'Yoyos de plátano dulce rellenos de queso blanco, servidos con crema de leche.',
            7.00,
            ['letiarepa/images/Aperitivos/Pastel-1.jpg'],
            2
        );

        // BEBIDAS — 7 productos usando las imágenes reales de la carpeta Bebidas
        $this->createItem(
            $catBebidas->id,
            'CHICHA TRADICIONAL',
            'chicha-tradicional',
            'Bebida tradicional venezolana de arroz, leche y canela.',
            3.50,
            ['letiarepa/images/Bebidas/Chicha-1.jpg'],
            0
        );

        $this->createItem(
            $catBebidas->id,
            'CHICHA ESPECIAL',
            'chicha-especial',
            'Chicha artesanal con vainilla y leche condensada.',
            4.00,
            ['letiarepa/images/Bebidas/Chicha-2.jpg'],
            1
        );

        $this->createItem(
            $catBebidas->id,
            'JUGO DE GUANÁBANA',
            'jugo-guanabana',
            'Refrescante jugo natural de guanábana.',
            4.00,
            ['letiarepa/images/Bebidas/Jugo-guanabana.jpg'],
            2
        );

        $this->createItem(
            $catBebidas->id,
            'JUGO DE MORA',
            'jugo-mora',
            'Jugo natural de mora, dulce y antioxidante.',
            4.00,
            ['letiarepa/images/Bebidas/Jugo-Mora.jpg'],
            3
        );

        $this->createItem(
            $catBebidas->id,
            'JUGO DE PARCHITA',
            'jugo-parchita',
            'Jugo natural de parchita (maracuyá), tropical y refrescante.',
            4.00,
            ['letiarepa/images/Bebidas/Jugo-parchita.jpg'],
            4
        );

        $this->createItem(
            $catBebidas->id,
            'TODDY',
            'toddy',
            'Bebida chocolatada fría, cremosa y deliciosa.',
            3.00,
            ['letiarepa/images/Bebidas/Toddy.jpg'],
            5
        );

        $this->createItem(
            $catBebidas->id,
            'JUGO NATURAL MIXTO',
            'jugo-natural-mixto',
            'Combinación de jugos naturales de la estación.',
            4.50,
            ['letiarepa/images/Bebidas/Jugos.jpg'],
            6
        );
    }
}
