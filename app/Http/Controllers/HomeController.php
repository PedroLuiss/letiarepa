<?php

namespace App\Http\Controllers;

use App\Models\CateringPackage;
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

        $cateringPackages = CateringPackage::with('items')->orderBy('sort_order')->get();

        return view('home', compact('restaurantCategories', 'menuItems', 'frozenMenu', 'cateringPackages', 'teamMembers'));
    }
}
