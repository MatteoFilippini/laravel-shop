<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $c = new Category();
            $c->name = $faker->word();
            $c->color = $faker->hexColor();
            $c->save();
        }
    }
}
