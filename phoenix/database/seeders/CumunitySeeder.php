<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CumunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('communities')->insert([
            ['id' => '1', 'country_id' => 1, 'state_name' => "Andalucía"],
            ['id' => '2', 'country_id' => 1, 'state_name' => "Aragón"],
            ['id' => '3', 'country_id' => 1, 'state_name' => "Asturias, Principado de"],
            ['id' => '4', 'country_id' => 1, 'state_name' => "Baleares, Islas"],
            ['id' => '5', 'country_id' => 1, 'state_name' => "Canarias"],
            ['id' => '6', 'country_id' => 1, 'state_name' => "Cantabria"],
            ['id' => '7', 'country_id' => 1, 'state_name' => "Castilla y León"],
            ['id' => '8', 'country_id' => 1, 'state_name' => "Castilla - La Mancha"],
            ['id' => '9', 'country_id' => 1, 'state_name' => "Cataluña"],
            ['id' => '10', 'country_id' => 1, 'state_name' => "Comunidad Valenciana"],
            ['id' => '11', 'country_id' => 1, 'state_name' => "Extramadura"],
            ['id' => '12', 'country_id' => 1, 'state_name' => "Galicia"],
            ['id' => '13', 'country_id' => 1, 'state_name' => "Madrid, Comunidad de"],
            ['id' => '14', 'country_id' => 1, 'state_name' => "Murcia, Región de"],
            ['id' => '15', 'country_id' => 1, 'state_name' => "Navarra, Comunidad Foral de"],
            ['id' => '16', 'country_id' => 1, 'state_name' => "País Vasco"],
            ['id' => '17', 'country_id' => 1, 'state_name' => "Rioja, La"],
            ['id' => '18', 'country_id' => 1, 'state_name' => "Ceuta"],
            ['id' => '19', 'country_id' => 1, 'state_name' => "Melilla"]
        ]);
    }
}
