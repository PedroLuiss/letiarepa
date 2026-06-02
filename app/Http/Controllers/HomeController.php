<?php

namespace App\Http\Controllers;

use App\Models\RestaurantCategory;
use App\Models\RestaurantMenuItem;
use App\Models\TeamMember;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(): View
    {
        $teamMembers = TeamMember::orderBy('sort_order')->get();

        $restaurantCategories = RestaurantCategory::orderBy('sort_order')->with('menuItems')->get();
        $menuItems = RestaurantMenuItem::with('category', 'images')->where('is_available', true)->orderBy('sort_order')->get();

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

        return view('home', compact('restaurantCategories', 'menuItems', 'frozenMenu', 'cateringMenu', 'teamMembers'));
    }
}
