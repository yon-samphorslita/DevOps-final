<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Terrain;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        $start = $this->faker->dateTimeBetween('now', '+1 month');
        $end = $this->faker->dateTimeBetween($start, '+1 month');

        return [
            'terrain_id' => Terrain::factory(),
            'renter_id' => User::factory(),
            'start_date' => $start->format('Y-m-d'),
            'end_date' => $end->format('Y-m-d'),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'cancelled', 'completed']),
        ];
    }
}
