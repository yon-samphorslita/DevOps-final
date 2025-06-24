<?php

namespace Database\Factories;

use App\Models\TerrainImage;
use App\Models\Terrain;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainImageFactory extends Factory
{
    protected $model = TerrainImage::class;

    public function definition()
    {
        return [
            'terrain_id' => Terrain::factory(),
            'image_path' => $this->faker->imageUrl(),
            'uploaded_at' => now(),
        ];
    }
}
