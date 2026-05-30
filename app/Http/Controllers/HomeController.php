<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(): View
    {
        // 1. Restaurant Menu Items (Arepas)
        $restaurantMenu = [
            [
                'id' => 'pabellon',
                'nombre' => 'AREPA DE PABELLÓN',
                'descripcion' => 'Carne mechada, caraotas, plátanos maduros, queso blanco.',
                'precio' => 13.00,
                'imagen' => 'letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png',
                'dots' => 3
            ],
            [
                'id' => 'reina_pepiada',
                'nombre' => 'AREPA DE REINA PEPIADA',
                'descripcion' => 'Pollo mechado, aguacate (Palta), mayonesa, queso blanco.',
                'precio' => 12.00,
                'imagen' => 'letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png',
                'dots' => 3
            ],
            [
                'id' => 'letiarepa',
                'nombre' => 'AREPA DE LETIAREPA',
                'descripcion' => 'Carne asada, pico de gallo (ensalada típica), queso blanco.',
                'precio' => 14.00,
                'imagen' => 'letiarepa/images/arepas/AREPA-LETIAREPA-MINIATURA.png',
                'dots' => 3
            ],
            [
                'id' => 'pelua',
                'nombre' => 'AREPA PELUA',
                'descripcion' => 'Carne mechada, queso amarillo.',
                'precio' => 12.00,
                'imagen' => 'letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png', // Fallback to Pabellón style
                'dots' => 3
            ]
        ];

        // 2. Frozen Products Menu Items
        $frozenMenu = [
            [
                'id' => 'carne_mechada_frozen',
                'nombre' => 'CARNE MECHADA',
                'descripcion' => 'Deliciosa carne mechada, cocida con una receta tradicional venezolana.',
                'precio' => 13.00,
                'presentacion' => '1 LIBRA',
                'imagen' => 'letiarepa/images/arepas/detalle/AREPA-DE-PABELLON-DETALLE.png'
            ],
            [
                'id' => 'pollo_mechado_frozen',
                'nombre' => 'POLLO MECHADO',
                'descripcion' => 'Delicioso pollo mechado, cocido con una receta tradicional venezolana.',
                'precio' => 13.00,
                'presentacion' => '1 LIBRA',
                'imagen' => 'letiarepa/images/arepas/detalle/AREPA-REINA-PEPIADA-DETALLE.png'
            ]
        ];

        // 3. Catering Packages
        $cateringMenu = [
            [
                'id' => 'paquete_dorado',
                'nombre' => 'PAQUETE DORADO',
                'precio' => 150.00,
                'items' => [
                    '20 TEQUEÑOS',
                    '20 CACHAPITAS CON QUESO',
                    '20 AREPITAS RELLENAS',
                    '20 PASTELITOS',
                    '20 EMPANADITAS',
                    '1 SALSA DE AJO 8oz',
                    'SERVILLETAS'
                ]
            ],
            [
                'id' => 'paquete_plata',
                'nombre' => 'PAQUETE PLATA',
                'precio' => 110.00,
                'items' => [
                    '20 TEQUEÑOS',
                    '20 CACHAPITAS CON QUESO',
                    '20 PASTELITOS',
                    '20 EMPANADITAS',
                    '1 SALSA DE AJO 8oz',
                    'SERVILLETAS'
                ]
            ],
            [
                'id' => 'paquete_bronce',
                'nombre' => 'PAQUETE BRONCE',
                'precio' => 80.00,
                'items' => [
                    '20 TEQUEÑOS',
                    '20 PASTELITOS',
                    '20 EMPANADITAS',
                    '1 SALSA DE AJO 8oz',
                    'SERVILLETAS'
                ]
            ]
        ];

        return view('home', compact('restaurantMenu', 'frozenMenu', 'cateringMenu'));
    }
}
