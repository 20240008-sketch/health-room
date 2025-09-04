<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'grade' => fake()->numberBetween(1, 3),
            'class' => fake()->randomElement(['総合1', '総合2', '総合3', '調理', '福祉', '進学', '特別進学', '情報会計']),
        ];
    }
}
