<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seasons;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $names = ['春', '夏', '秋', '冬'];

        foreach ($names as $name) {
            Seasons::factory()->create(['name' => $name]);
        }
    }
}
