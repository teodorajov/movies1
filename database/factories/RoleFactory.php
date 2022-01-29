<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_name' => $this->faker->name,
            'main_role' => $this->faker->boolean(15),
            'movie_id' => $this->faker->numberBetween(1, 10),
            'actor_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
