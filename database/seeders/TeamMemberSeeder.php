<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $description = '"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."';

        TeamMember::create([
            'name' => 'JOSMAR MENDOZA',
            'title' => 'FUNDADOR',
            'description' => $description,
            'image' => '/letiarepa/images/Team/Josmar-Mendoza-Founder.png',
            'sort_order' => 0,
        ]);

        TeamMember::create([
            'name' => 'JULIO PAREDES',
            'title' => 'ATENCIÓN AL CLIENTE',
            'description' => $description,
            'image' => '/letiarepa/images/Team/Julio-Paredes-Chef-Founder.png',
            'sort_order' => 1,
        ]);

        TeamMember::create([
            'name' => 'MARÍA QUIÑONES',
            'title' => 'ATENCIÓN AL CLIENTE',
            'description' => $description,
            'image' => '/letiarepa/images/Team/Maria-Quiñones-Customer-Service.png',
            'sort_order' => 2,
        ]);

        TeamMember::create([
            'name' => 'CARLOS GONZÁLEZ',
            'title' => 'ATENCIÓN AL CLIENTE',
            'description' => $description,
            'image' => '/letiarepa/images/Team/Carlos-Gonzalez-Kitchen-Lead.png',
            'sort_order' => 3,
        ]);

        /*TeamMember::create([
            'name' => 'ANA TORRES',
            'title' => 'ATENCIÓN AL CLIENTE',
            'description' => $description,
            'image' => null,
            'sort_order' => 4,
        ]);*/
    }
}
