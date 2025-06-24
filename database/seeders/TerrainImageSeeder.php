<?php

namespace Database\Seeders;

use App\Models\TerrainImage;
use Illuminate\Database\Seeder;

class TerrainImageSeeder extends Seeder
{
    public function run()
    {
        TerrainImage::factory()->count(10)->create();
    }
}
