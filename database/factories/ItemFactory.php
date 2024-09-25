<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'code' => $this->faker->unique()->numerify('ITEM###'),
            'category' => $this->faker->randomElement(['Electronics', 'Furniture', 'Food']),
            'location' => $this->faker->city,
        ];
    }
}
