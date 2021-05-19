<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence,
            'body' => $this->faker->unique()->paragraph,
            'is_public' => $this->faker->boolean,
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
