<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->insert([
            ['id' => '1', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Albacete'],
            ['id' => '2', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Ciudad Real'],
            ['id' => '3', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Cuenca'],
            ['id' => '4', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Guadalajara'],
            ['id' => '5', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Toledo'],
            ['id' => '6', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Huesca'],
            ['id' => '7', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Teruel'],
            ['id' => '8', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Zaragoza'],
            ['id' => '9', 'country_id' => 1,'state_id' => 18, 'region_name' => 'Ceuta'],
            ['id' => '10', 'country_id' => 1,'state_id' => 13, 'region_name' => 'Madrid'],
            ['id' => '11', 'country_id' => 1,'state_id' => 14, 'region_name' => 'Murcia'],
            ['id' => '12', 'country_id' => 1,'state_id' => 19, 'region_name' => 'Melilla'],
            ['id' => '13', 'country_id' => 1,'state_id' => 15, 'region_name' => 'Navarra'],
            ['id' => '14', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Almería'],
            ['id' => '15', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Cádiz'],
            ['id' => '16', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Córdoba'],
            ['id' => '17', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Granada'],
            ['id' => '18', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Huelva'],
            ['id' => '19', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Jaén'],
            ['id' => '20', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Málaga'],
            ['id' => '21', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Sevilla'],
            ['id' => '22', 'country_id' => 1,'state_id' => 3, 'region_name' => 'Asturias'],
            ['id' => '23', 'country_id' => 1,'state_id' => 6, 'region_name' => 'Cantabria'],
            ['id' => '24', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Ávila'],
            ['id' => '25', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Burgos'],
            ['id' => '26', 'country_id' => 1,'state_id' => 7, 'region_name' => 'León'],
            ['id' => '27', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Palencia'],
            ['id' => '28', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Salamanca'],
            ['id' => '29', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Segovia'],
            ['id' => '30', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Soria'],
            ['id' => '31', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Valladolid'],
            ['id' => '32', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Zamora'],
            ['id' => '33', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Barcelona'],
            ['id' => '34', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Gerona'],
            ['id' => '35', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Lérida'],
            ['id' => '36', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Tarragona'],
            ['id' => '37', 'country_id' => 1, 'state_id' => 11, 'region_name' => 'Badajoz'],
            ['id' => '38', 'country_id' => 1, 'state_id' => 11, 'region_name' => 'Cáceres'],
            ['id' => '39', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Coruña, La'],
            ['id' => '40', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Lugo'],
            ['id' => '41', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Orense'],
            ['id' => '42', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Pontevedra'],
            ['id' => '43', 'country_id' => 1, 'state_id' => 17, 'region_name' => 'Rioja, La'],
            ['id' => '44', 'country_id' => 1, 'state_id' => 4, 'region_name' => 'Baleares, Islas'],
            ['id' => '45', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Álava'],
            ['id' => '46', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Guipúzcoa'],
            ['id' => '47', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Vizcaya'],
            ['id' => '48', 'country_id' => 1, 'state_id' => 5, 'region_name' => 'Palmas, Las'],
            ['id' => '49', 'country_id' => 1, 'state_id' => 5, 'region_name' => 'Tenerife, Santa Cruz De'],
            ['id' => '50', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Alicante'],
            ['id' => '51', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Castellón'],
            ['id' => '52', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Valencia']
        ]);
    }
}
