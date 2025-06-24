<?php

namespace Database\Seeders;

use App\Models\Terrain;
use Illuminate\Database\Seeder;

class TerrainSeeder extends Seeder
{
    public function run()
    {
        Terrain::factory()->count(10)->create();
    }
}
