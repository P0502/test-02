<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seasons;

class SeasonsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Seasons::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['春', '夏', '秋', '冬']),
        ];
    }
}
