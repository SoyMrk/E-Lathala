<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'body' => $this->faker->sentence(10),
            'post_type' => $this->faker->sentence(4),
            'title' => $this->faker->sentence(5),
            'category' => $this->faker->sentence(4),
            'price' => $this->faker->numerify('###')
        ];
    }
}
