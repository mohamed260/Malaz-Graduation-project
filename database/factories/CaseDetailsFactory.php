<?php

namespace Database\Factories;

use App\Models\CaseDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseDetails>
 */
class CaseDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CaseDetails::class;

    public function definition(): array
    {
        return [
            'notes' => $this->faker->sentence,
        ];
    }
}
