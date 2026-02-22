<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Products::class;

    public function definition(): array
    {
        $images = [ 'products/kiwi.png', 
                    'products/strawberry.png', 
                    'products/orange.jpg', 
                    'products/watermelon.png',
                    'products/peach.png', 
                    'products/muscat.png', 
                    'products/pineapple.png',
                    'products/grapes.png', 
                    'products/banana.jpg', 
                    'products/melon.jpg', 
        ];

        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(0, 10000),
            'image' => $this->faker->randomElement(['sample.png', 'sample.jpeg']),
            'description' => $this->faker->text(120),
        ];
    }
}
