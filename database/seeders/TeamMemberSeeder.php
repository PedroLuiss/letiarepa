<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::create([
            'name' => 'JOSMAR MENDOZA',
            'title' => 'C.E.O',
            'description' => '"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."',
            'image' => null,
            'sort_order' => 0,
        ]);

        TeamMember::create([
            'name' => 'JULIO PAREDES',
            'title' => 'FUNDADOR',
            'description' => '"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."',
            'image' => null,
            'sort_order' => 1,
        ]);

        TeamMember::create([
            'name' => 'MARÍA QUIÑONES',
            'title' => 'ATENCIÓN AL CLIENTE',
            'description' => '"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."',
            'image' => null,
            'sort_order' => 2,
        ]);

        TeamMember::create([
            'name' => 'CARLOS GÓMEZ',
            'title' => 'CHEF EJECUTIVO',
            'description' => '"Apasionado por la cocina venezolana, cada plato que preparamos lleva el sabor de casa y el corazón de nuestra tierra."',
            'image' => null,
            'sort_order' => 3,
        ]);

        TeamMember::create([
            'name' => 'ANA TORRES',
            'title' => 'COORDINADORA DE EVENTOS',
            'description' => '"Hacemos de cada evento una experiencia inolvidable con el auténtico sabor venezolano que nos caracteriza."',
            'image' => null,
            'sort_order' => 4,
        ]);
    }
}
