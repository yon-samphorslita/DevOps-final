<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'booking_id' => Booking::factory(),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'amount_paid' => $this->faker->randomFloat(2, 100, 1000),
            'payment_date' => now(),
            'status' => $this->faker->randomElement(['paid', 'failed', 'refunded']),
            'transaction_id' => $this->faker->uuid,
        ];
    }
}
