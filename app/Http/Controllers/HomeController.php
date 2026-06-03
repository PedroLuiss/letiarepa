<?php

namespace App\Http\Controllers;

use App\Models\CateringPackage;
use App\Models\FrozenCategory;
use App\Models\FrozenProduct;
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

        $frozenProducts = FrozenProduct::orderBy('sort_order')->get();
        $frozenCategories = FrozenCategory::with('presentationItems')->orderBy('sort_order')->get();

        $cateringPackages = CateringPackage::with('items')->orderBy('sort_order')->get();

        return view('home', compact('restaurantCategories', 'menuItems', 'frozenProducts', 'frozenCategories', 'cateringPackages', 'teamMembers'));
    }
}
