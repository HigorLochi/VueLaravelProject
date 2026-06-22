<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = Country::factory()->create([
            'name' => 'Brazil',
            'logo' => 'br'
        ]);

        $country->cities()->createMany([
            ['name' => 'São Paulo'],
            ['name' => 'Rio de Janeiro'],
            ['name' => 'Brasília'],
            ['name' => 'Salvador'],
            ['name' => 'Fortaleza'],
            ['name' => 'Belo Horizonte'],
            ['name' => 'Manaus'],
            ['name' => 'Curitiba'],
            ['name' => 'Recife'],
            ['name' => 'Goiânia'],
        ]);

        $country2 = Country::factory()->create([
            'name' => 'United States',
            'logo' => 'us'
        ]);

        $country2->cities()->createMany([
            ['name' => 'New York'],
            ['name' => 'Los Angeles'],
            ['name' => 'Chicago'],
            ['name' => 'Houston'],
            ['name' => 'Phoenix'],
            ['name' => 'Philadelphia'],
            ['name' => 'San Antonio'],
            ['name' => 'San Diego'],
            ['name' => 'Dallas'],
            ['name' => 'San Jose']
        ]);

        $country3 = Country::factory()->create([
            'name' => 'Canada',
            'logo' => 'ca'
        ]);

        $country3->cities()->createMany([
            ['name' => 'Toronto'],
            ['name' => 'Montreal'],
            ['name' => 'Vancouver'],
            ['name' => 'Calgary'],
            ['name' => 'Edmonton'],
            ['name' => 'Ottawa'],
            ['name' => 'Winnipeg'],
            ['name' => 'Quebec City'],
            ['name' => 'Hamilton'],
            ['name' => 'Kitchener']
        ]);
    }
}
