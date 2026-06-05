<?php

namespace Database\Seeders;

use App\Models\CateringPackage;
use App\Models\CateringPackageItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CateringMenuSeeder extends Seeder
{
    private function createPackage(string $name, string $slug, float $price, string $image, int $sort, array $items): void
    {
        $pkg = CateringPackage::create([
            'name' => $name,
            'slug' => $slug,
            'price' => $price,
            'image' => $image,
            'sort_order' => $sort,
        ]);

        foreach ($items as $i => $itemName) {
            CateringPackageItem::create([
                'package_id' => $pkg->id,
                'name' => $itemName,
                'sort_order' => $i,
            ]);
        }
    }

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        CateringPackageItem::truncate();
        CateringPackage::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->createPackage('PAQUETE DORADO', 'paquete_dorado', 150.00,
            'letiarepa/images/catering-ifografia.png', 0, [
                '20 TEQUEÑOS',
                '20 CACHAPITAS CON QUESO',
                '20 AREPITAS RELLENAS',
                '20 PASTELITOS',
                '20 EMPANADITAS',
                '1 SALSA DE AJO 8oz',
                'SERVILLETAS',
            ]);

        $this->createPackage('PAQUETE PLATA', 'paquete_plata', 110.00,
            'letiarepa/images/cateringheader.png', 1, [
                '20 TEQUEÑOS',
                '20 CACHAPITAS CON QUESO',
                '20 PASTELITOS',
                '20 EMPANADITAS',
                '1 SALSA DE AJO 8oz',
                'SERVILLETAS',
            ]);

        $this->createPackage('PAQUETE BRONCE', 'paquete_bronce', 80.00,
            'letiarepa/images/cateringheader.png', 2, [
                '20 TEQUEÑOS',
                '20 PASTELITOS',
                '20 EMPANADITAS',
                '1 SALSA DE AJO 8oz',
                'SERVILLETAS',
            ]);
    }
}
