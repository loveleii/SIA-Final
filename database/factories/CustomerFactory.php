<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'location' => fake()->address,
            'phone' => fake()->phoneNumber,
            'stylist' => fake()->name,
            'price' =>fake()->numberBetween($min = 100, $max = 1000),
            'adate' =>fake()->date('Y-m-d', '2011-01-02'),
            'email' =>fake()->unique()->freeEmail,
        ];
    }
}
