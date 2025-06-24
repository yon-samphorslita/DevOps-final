<?php

namespace Database\Factories;

use App\Models\Terrain;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainFactory extends Factory
{
    protected $model = Terrain::class;

    public function definition()
    {
        return [
            'owner_id' => User::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->city(),
            'area_size' => $this->faker->randomFloat(2, 100, 10000),
            'price_per_day' => $this->faker->randomFloat(2, 10, 1000),
            'available_from' => $this->faker->date(),
            'available_to' => $this->faker->date(),
            'is_available' => $this->faker->boolean(80),
            'main_image' => null,
        ];
    }
}
