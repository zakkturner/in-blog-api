<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PostImage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->sentence),
            'body' => $this->faker->sentences(12, true),
            'user_id' => User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-30 days', now())

            //
        ];
    }
}
