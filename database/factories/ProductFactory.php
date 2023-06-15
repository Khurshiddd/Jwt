<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'produc_category_id'=>rand(1,3),
            'title'=>fake()->title(),
            'body'=>fake()->paragraph(),
            'price'=>rand(1000,100000),
        ];
    }
}
