<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'customer_id' => $this->faker->numberBetween(1, 5),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'description' => $this->faker->text(),
            'currency_code' => 949, // TL
        ];
    }
}
