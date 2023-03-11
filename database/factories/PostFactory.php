<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                User::factory()->create()->id;
            },
            'community_id' => function () {
                Community::factory()->create()->id;
            },
            'title' => $this->faker->company,
            'post' => $this->faker->paragraph(),
            'url' => $this->faker->url()
        ];
    }
}
