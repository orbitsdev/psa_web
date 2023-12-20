<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataCollection>
 */
class DataCollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'middle_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date,
            'place_of_birth_city' => $this->faker->city,
            'place_of_birth_province' => $this->faker->state,
            'place_of_birth_country' => $this->faker->country,
            'father_first_name' => $this->faker->firstNameMale,
            'father_last_name' => $this->faker->lastName,
            'father_middle_name' => $this->faker->lastName,
            'mother_first_name' => $this->faker->firstNameFemale,
            'mother_last_name' => $this->faker->lastName,
            'mother_middle_name' => $this->faker->lastName,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'place_id' => $this->faker->randomNumber(6),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
