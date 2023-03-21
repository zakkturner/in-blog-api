<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BlogPost;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostImage>
 */
class PostImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_image_caption' => $this->faker->sentence(),
            'post_image_path' => $this->faker->imageUrl(),
            'blog_post_id' => BlogPost::factory(),

        ];
    }
}
