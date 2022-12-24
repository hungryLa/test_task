<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(2),
            'description' => $this->faker->text(),
            'small_description' => $this->faker->sentence(6),
            'image' => 'news.jpg',
            'user_id' => User::get()->random()->id,
        ];
    }
}
