<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'subject' => $this->faker->text(50),
            'content' => $this->faker->realText(250),
        ];
    }
}
