<?php

namespace Database\Seeders;

use App\Models\DangerLevel;
use Illuminate\Database\Seeder;

class DangerLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [[
            'title' => 'Low',
            'color' => 'green',
            'order' => 1
        ],[
            'title' => 'Moderate',
            'color' => 'yellow',
            'order' => 2
        ],[
            'title' => 'Dangerous',
            'color' => 'red',
            'order' => 3
        ]];

        foreach($levels as $levels){
            DangerLevel::factory()->create($levels);
        }
    }
}
