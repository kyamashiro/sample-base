<?php

namespace Database\Factories;

use App\Models\ShopMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'shop_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->unique()->sentence,
            'body' => $this->faker->unique()->paragraph,
            'sent_at' => $this->faker->dateTime,
            'is_read' => $this->faker->boolean,
        ];
    }
}
