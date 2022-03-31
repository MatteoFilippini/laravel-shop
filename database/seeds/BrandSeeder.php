<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['name' => 'Nike', 'country' => 'Italia', 'color' => 'red'],
            ['name' => 'Adidas', 'country' => 'Italia', 'color' => 'blue'],
            ['name' => 'Monkey', 'country' => 'Francia', 'color' => 'green'],
        ];

        foreach ($brands as $brand) {
            $b = new Brand();
            $b->name = $brand['name'];
            $b->country = $brand['country'];
            $b->color = $brand['color'];
            $b->save();
        }
    }
}
