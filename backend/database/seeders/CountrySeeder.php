<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::factory()->hasCities(
            ['name' => 'São Paulo'],
            ['name' => 'Rio de Janeiro'],
            ['name' => 'Brasília'],
            ['name' => 'Salvador'],
            ['name' => 'Fortaleza'],
            ['name' => 'Belo Horizonte'],
            ['name' => 'Manaus'],
            ['name' => 'Curitiba'],
            ['name' => 'Recife'],
            ['name' => 'Goiânia']
        )->create(['name' => 'Brazil']);
    }
}
