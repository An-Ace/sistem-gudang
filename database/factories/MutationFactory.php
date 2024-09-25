<?php

namespace Database\Factories;

use App\Models\Mutation;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class MutationFactory extends Factory
{
    protected $model = Mutation::class;

    public function definition()
    {
        return [
            'mutation_type' => $this->faker->randomElement(['IN', 'OUT']),
            'amount' => $this->faker->numberBetween(1, 100),
            'user_id' => User::factory(),
            'item_id' => Item::factory(),
        ];
    }
}
