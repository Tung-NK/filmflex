<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Showtime>
 */
class ShowtimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'movie_id' => Movie::all()->random()->id,
            'translation_id' => fake()->randomDigit(),
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
            'date' => fake()->date('Y-m-d'),
        ];
    }
}
