<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
        $userIds = User::pluck('id')->toArray();


        return [
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(4),
            'image' => "/post_placeholder.png",
            'user_id' => fake()->randomElement($userIds),
        ];
    }
}
