<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'site_id' => Site::factory(), // This creates a new Site for each Post or use Site::inRandomOrder()->first()->id for existing.
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'notified_at' => null, // Assuming this field is used to track notification status
        ];
    }
}
