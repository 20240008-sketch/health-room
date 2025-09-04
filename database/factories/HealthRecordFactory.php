<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthRecord>
 */
class HealthRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'height' => fake()->randomFloat(1, 140, 190),
            'weight' => fake()->randomFloat(1, 35, 85),
            'vision_left' => fake()->randomFloat(2, 0.1, 2.0),
            'vision_right' => fake()->randomFloat(2, 0.1, 2.0),
            'vision_left_corrected' => fake()->randomFloat(2, 0.3, 2.0),
            'vision_right_corrected' => fake()->randomFloat(2, 0.3, 2.0),
            'hearing_test' => fake()->boolean(20), // 20%の確率で要検査
            'dental_exam' => fake()->boolean(30),  // 30%の確率で虫歯あり
            'recorded_date' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
