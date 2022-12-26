<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text,
            'count_likes' => random_int(1, 300),
            'user_id' => User::get()->random()->id,
            'news_id' => News::get()->random()->id,
        ];
    }
}
