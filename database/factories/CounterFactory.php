<?php

namespace Database\Factories;

use App\Models\Counter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Counter>
 */
class CounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Counter::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'counter_number' => $this->faker->numerify('###'),
            'address' => $this->faker->city,
            'location' => $this->faker->paragraph,
            'location_number' => $this->faker->numerify('##'),
            'column_number' => $this->faker->numerify('##'),
            'street_number' => $this->faker->numerify('##'),
            'phone' => fake()->unique()->e164PhoneNumber(),
        ];
    }
}
