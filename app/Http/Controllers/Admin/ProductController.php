<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantCategory;
use App\Models\RestaurantMenuItem;
use App\Models\RestaurantMenuItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $categories = RestaurantCategory::orderBy('sort_order')->get();
        $items = RestaurantMenuItem::with('category', 'images')
            ->orderBy('category_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.products.index', compact('items', 'categories'));
    }

    public function create()
    {
        $categories = RestaurantCategory::orderBy('sort_order')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'required|exists:restaurant_categories,id',
            'is_available'=> 'boolean',
            'images'      => 'required|array|min:1',
            'images.*'    => 'image|max:4096',
        ]);

        $slug = Str::slug($data['name']);
        $base = $slug;
        $i = 1;
        while (RestaurantMenuItem::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        // Guardar primera imagen
        $firstImage = $request->file('images')[0];
        $filename   = $firstImage->getClientOriginalName();
        $folder     = 'letiarepa/images/' . $this->categoryFolder($data['category_id']);
        $firstImage->move(public_path($folder), $filename);
        $imagePath = $folder . '/' . $filename;

        $item = RestaurantMenuItem::create([
            'category_id'  => $data['category_id'],
            'name'         => $data['name'],
            'slug'         => $slug,
            'description'  => $data['description'],
            'price'        => $data['price'],
            'image'        => $imagePath,
            'sort_order'   => RestaurantMenuItem::max('sort_order') + 1,
            'is_available' => $request->boolean('is_available', true),
        ]);

        foreach ($request->file('images') as $idx => $file) {
            $fname  = $file->getClientOriginalName();
            $file->move(public_path($folder), $fname);
            RestaurantMenuItemImage::create([
                'menu_item_id' => $item->id,
                'image_path'   => $folder . '/' . $fname,
                'sort_order'   => $idx,
            ]);
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(RestaurantMenuItem $product)
    {
        $categories = RestaurantCategory::orderBy('sort_order')->get();
        $product->load('images');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, RestaurantMenuItem $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'required|exists:restaurant_categories,id',
            'is_available'=> 'boolean',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:4096',
        ]);

        $product->update([
            'name'         => $data['name'],
            'description'  => $data['description'],
            'price'        => $data['price'],
            'category_id'  => $data['category_id'],
            'is_available' => $request->boolean('is_available'),
        ]);

        // Reemplazar imágenes: mismo nombre → mismo path en BD, solo se sobreescribe el archivo
        if ($request->hasFile('images')) {
            $folder = 'letiarepa/images/' . $this->categoryFolder($data['category_id']);

            foreach ($request->file('images') as $idx => $file) {
                $filename = $file->getClientOriginalName();
                // Sobreescribir el archivo en disco con el mismo nombre
                $file->move(public_path($folder), $filename);
                $path = $folder . '/' . $filename;

                // Buscar si ya existe un registro con ese path exacto
                $existing = $product->images()->where('image_path', $path)->first();

                if ($existing) {
                    // El path no cambia, el archivo en disco ya fue reemplazado
                } else {
                    // Nueva imagen que no existía antes
                    RestaurantMenuItemImage::create([
                        'menu_item_id' => $product->id,
                        'image_path'   => $path,
                        'sort_order'   => $product->images()->max('sort_order') + 1,
                    ]);

                    // Si es la primera imagen subida y el producto no tiene imagen principal
                    if ($idx === 0 && !$product->image) {
                        $product->update(['image' => $path]);
                    }
                }
            }

            // Actualizar imagen principal si cambió la categoría
            if ($product->images()->count() > 0) {
                $product->update(['image' => $product->images()->orderBy('sort_order')->first()->image_path]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(RestaurantMenuItem $product)
    {
        $product->images()->delete();
        $product->delete();
        return back()->with('success', 'Producto eliminado.');
    }

    public function destroyImage(RestaurantMenuItemImage $image)
    {
        $productId = $image->menu_item_id;
        $image->delete();

        // Si era la imagen principal, actualizar con la siguiente
        $product = RestaurantMenuItem::find($productId);
        if ($product) {
            $first = $product->images()->orderBy('sort_order')->first();
            $product->update(['image' => $first?->image_path]);
        }

        return back()->with('success', 'Imagen eliminada.');
    }

    private function categoryFolder(int $categoryId): string
    {
        $map = [
            'arepa'      => 'arepas',
            'parrillas'  => 'Parrillas',
            'patacon'    => 'Patacones',
            'cachapas'   => 'cachapas',
            'burgers'    => 'Hamburgesas',
            'pepitos'    => 'Pepitos',
            'aperitivos' => 'Aperitivos',
            'bebidas'    => 'Bebidas',
        ];

        $cat = RestaurantCategory::find($categoryId);
        return $map[$cat?->slug] ?? 'general';
    }
}
