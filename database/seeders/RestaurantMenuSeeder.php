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
            14.99,
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
            14.49,
            [
                'letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-REINA-PEPIADA-DETALLE.png',
            ],
            1
        );

        $this->createItem(
            $catArepa->id,
            'LETIAREPA',
            'letiarepa',
            'Carne asada, pico de gallo (ensalada típica), queso blanco.',
            14.75,
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
            12.99,
            [
                'letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png',
                'letiarepa/images/arepas/detalle/AREPA-REINA-PEPIADA-DETALLE.png',
            ],
            3
        );

        // PARRILLAS — Usar imágenes reales de la carpeta Parrillas
        $this->createItem(
            $catParrillas->id,
            'PARRILLA YARACUYANA',
            'parrilla-mixta',
            'Carne, pollo, chorizo y vegetales asados a la parrilla, servidos con guasacaca y arepas.',
            32.99,
            ['letiarepa/images/Parrillas/Yaracuyana-1.jpg'],
            0
        );

        $this->createItem(
            $catParrillas->id,
            'PARRILLA INDIVIDUAL',
            'parrilla-pollo',
            'Pechuga de pollo marinada a la parrilla, acompañada de vegetales salteados y papas.',
            21.99,
            ['letiarepa/images/Parrillas/Yaracuyana-2.jpg'],
            1
        );

        $this->createItem(
            $catParrillas->id,
            'PARRILLA GRANDE',
            'parrilla-res',
            'Carne asada al carbón, servida con chimichurri, vegetales asados y arepa.',
            59.99,
            ['letiarepa/images/Parrillas/Yaracuyana-3.jpg'],
            2
        );

        // PATACON — Usar imágenes reales de la carpeta Patacones
        $this->createItem(
            $catPatacon->id,
            'PATACÓN DE CARNE',
            'patacon-carne',
            'Patacón de plátano verde relleno de carne mechada, queso amarillo y ensalada.',
            16.99,
            ['letiarepa/images/Patacones/patacon-carne.jpg'],
            0
        );

        $this->createItem(
            $catPatacon->id,
            'PATACÓN DE POLLO',
            'patacon-pollo',
            'Patacón de plátano verde relleno de pollo mechado, lechuga, tomate y salsas.',
            14.99,
            ['letiarepa/images/Patacones/Patacon-de-pollo -1.jpg'],
            1
        );

        $this->createItem(
            $catPatacon->id,
            'PATACÓN MIXTO',
            'patacon-mixto',
            'Patacón de plátano verde relleno de carne y pollo, con todos los acompañantes.',
            17.99,
            ['letiarepa/images/Patacones/Patacon-de-pollo-2.jpg'],
            2
        );

        // CACHAPAS — Usar imágenes reales de la carpeta cachapas
        $this->createItem(
            $catCachapas->id,
            'CACHAPA CON QUESO',
            'cachapa-queso',
            'Cachapa de maíz dulce rellena de queso blanco, crema de leche y mantequilla.',
            13.99,
            ['letiarepa/images/cachapas/Cachapa-de-queso 1.jpg'],
            0
        );

        $this->createItem(
            $catCachapas->id,
            'CACHAPA CON CARNE',
            'cachapa-carne',
            'Cachapa de maíz dulce rellena de carne mechada y queso blanco.',
            16.99,
            ['letiarepa/images/cachapas/Cachapa-carne-mechada-1.jpg'],
            1
        );

        $this->createItem(
            $catCachapas->id,
            'CACHAPA CON POLLO',
            'cachapa-pollo',
            'Cachapa de maíz dulce rellena de pollo mechado y queso blanco.',
            14.99,
            ['letiarepa/images/cachapas/cachapa-de-mechada-2.jpg'],
            2
        );

        // BURGERS — Usar imágenes reales de la carpeta Hamburgesas
        $this->createItem(
            $catBurgers->id,
            'BURGER CRIOLLA',
            'burger-clasica',
            'Carne de res, lechuga, tomate, cebolla, pepinillos y nuestra salsa especial.',
            18.49,
            ['letiarepa/images/Hamburgesas/hamburguesa-criolla.jpg'],
            0
        );

        $this->createItem(
            $catBurgers->id,
            'BURGER PICAÑA',
            'burger-queso',
            'Carne de res, queso amarillo, lechuga, tomate y salsa especial.',
            18.49,
            ['letiarepa/images/Hamburgesas/hamburguesa-picahna.jpg'],
            1
        );

        $this->createItem(
            $catBurgers->id,
            'BURGER DE CARNE O POLLO',
            'burger-especial',
            'Doble carne, doble queso, tocineta, huevo, lechuga, tomate y nuestra salsa de la casa.',
            14.99,
            ['letiarepa/images/Hamburgesas/hamburguesa-triple.jpg'],
            2
        );

        // PEPITOS — 3 productos usando las imágenes reales de la carpeta Pepitos
        $this->createItem(
            $catPepitos->id,
            'PEPITO GUARO',
            'pepito-guaro',
            'Pan artesanal relleno de carne mechada, queso amarillo, vegetales y salsas.',
            28.99,
            ['letiarepa/images/Pepitos/pepito-guaro.jpg'],
            0
        );

        $this->createItem(
            $catPepitos->id,
            'PEPITO PARRILLERO',
            'pepito-parrillero',
            'Pan artesanal relleno de carne y pollo, queso amarillo, vegetales y salsas.',
            27.99,
            ['letiarepa/images/Pepitos/pepito-parrillero.jpg'],
            1
        );

        $this->createItem(
            $catPepitos->id,
            'PEPITO MAR Y TIERRA',
            'pepito-mar-y-tierra',
            'Pan artesanal relleno de pollo mechado, queso amarillo, vegetales y salsas.',
            28.99,
            ['letiarepa/images/Pepitos/pepito-mar-y-tierra.jpg'],
            2
        );

        // APERITIVOS — Usar imágenes reales de la carpeta Aperitivos
        $this->createItem(
            $catAperitivos->id,
            'TEQUEÑOS (5)',
            'tequenos',
            '5 tequeños de queso blanco fritos, servidos con salsa de ajo.',
            11.49,
            ['letiarepa/images/Aperitivos/Tequeños-2.jpg'],
            0
        );

        $this->createItem(
            $catAperitivos->id,
            'EMPANADA (1)',
            'empanadas',
            '1 empanada de carne o pollo, servida con guasacaca.',
            5.99,
            ['letiarepa/images/Aperitivos/Empanadas.jpg'],
            1
        );

        $this->createItem(
            $catAperitivos->id,
            'PASTEL (1)',
            'pastel',
            '1 pastel artesanal, servido con crema de leche.',
            5.99,
            ['letiarepa/images/Aperitivos/Pastel-1.jpg'],
            2
        );

        // BEBIDAS — 5 productos, algunos con selector de sabor en el modal
        $this->createItem(
            $catBebidas->id,
            'JUGOS NATURALES',
            'jugos-naturales',
            'Elige tu sabor: parchita, mango, mora, guanábana o tamarindo.',
            8.49,
            ['letiarepa/images/Bebidas/Jugo-parchita.jpg'],
            0
        );

        $this->createItem(
            $catBebidas->id,
            'CHICHA VENEZOLANA',
            'chicha-venezolana',
            'Bebida tradicional venezolana de arroz, leche y canela.',
            7.50,
            ['letiarepa/images/Bebidas/Chicha-1.jpg'],
            1
        );

        $this->createItem(
            $catBebidas->id,
            'TODDY',
            'toddy',
            'Bebida chocolatada fría, cremosa y deliciosa.',
            8.99,
            ['letiarepa/images/Bebidas/Toddy.jpg'],
            2
        );

        $this->createItem(
            $catBebidas->id,
            'SODAS INTERNACIONAL',
            'sodas-internacional',
            'Internacional (Malta, Frescolita, Postobon).',
            3.75,
            ['letiarepa/images/Bebidas/malta.jpg'],
            3
        );

        $this->createItem(
            $catBebidas->id,
            'SODAS NACIONALES',
            'sodas-nacionales',
            'Nacional (Coca cola, Sprite).',
            2.76,
            ['letiarepa/images/Bebidas/coca-cola.jpg'],
            4
        );
    }
}
