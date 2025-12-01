<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory{
    
    public function definition(): array{
        return [
            "name" => fake()->sentence(4),
            "color" => fake()->randomElement(['yellow', 'red', 'blue']),
            "description" => fake()->sentence(10)
        ];
    }
}
