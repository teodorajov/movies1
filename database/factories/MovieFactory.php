<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase,
            'duration' => $this->faker->numberBetween(70, 150),
            'rating' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->realText,
            'release_year' => $this->faker->numberBetween(1950, 2021),
        ];
    }
}
