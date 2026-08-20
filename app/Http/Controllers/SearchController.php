<?php

namespace App\Http\Controllers;

use App\Models\CateringPackage;
use App\Models\FrozenCategory;
use App\Models\FrozenProduct;
use App\Models\RestaurantMenuItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $query = trim((string) $request->query('q', ''));

        if (mb_strlen($query) < 1) {
            return response()->json([
                'query' => $query,
                'results' => [],
            ]);
        }

        $like = '%' . $query . '%';

        $restaurantItems = RestaurantMenuItem::query()
            ->with('category')
            ->where('is_available', true)
            ->where(function ($q) use ($like) {
                $q->where('name', 'like', $like)
                    ->orWhere('description', 'like', $like);
            })
            ->orderBy('name')
            ->limit(8)
            ->get();

        $frozenItems = FrozenProduct::query()
            ->where('is_available', true)
            ->where(function ($q) use ($like) {
                $q->where('name', 'like', $like)
                    ->orWhere('description', 'like', $like);
            })
            ->orderBy('name')
            ->limit(8)
            ->get();

        $cateringItems = CateringPackage::query()
            ->where('is_available', true)
            ->where('name', 'like', $like)
            ->orderBy('name')
            ->limit(8)
            ->get();

        $frozenCategoryNames = FrozenCategory::query()->whereIn('slug', $frozenItems->pluck('category_slug'))->pluck('name', 'slug');

        $results = [];

        foreach ($restaurantItems as $item) {
            $results[] = [
                'type' => 'restaurant',
                'type_label' => __('menu.title'),
                'name' => $item->name,
                'slug' => $item->slug,
                'image' => $item->image,
                'price' => (float) $item->price,
                'description' => $item->description,
                'category' => $item->category?->name,
                'category_slug' => $item->category?->slug,
            ];
        }

        foreach ($frozenItems as $item) {
            $results[] = [
                'type' => 'frozen',
                'type_label' => __('nav.frozen'),
                'name' => $item->name,
                'slug' => $item->slug,
                'image' => $item->image,
                'price' => (float) $item->price,
                'description' => $item->description,
                'category' => $frozenCategoryNames[$item->category_slug] ?? null,
                'category_slug' => $item->category_slug,
            ];
        }

        foreach ($cateringItems as $item) {
            $results[] = [
                'type' => 'catering',
                'type_label' => __('nav.catering'),
                'name' => $item->name,
                'slug' => $item->slug,
                'image' => $item->image,
                'price' => (float) $item->price,
                'description' => null,
            ];
        }

        return response()->json([
            'query' => $query,
            'count' => count($results),
            'results' => $results,
        ]);
    }
}
