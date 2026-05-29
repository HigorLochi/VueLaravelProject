<?php

namespace Database\Seeders;

use App\Models\DangerLevel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DangerLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DangerLevel::factory()->count(3)->create();
    }
}
