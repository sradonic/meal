<?php

use App\Model\Category;
use App\Model\Meal;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 5)->create()->each(function ($data) {
            $data->meal()->saveMany(factory(Meal::class, 3)->make());
        });
    }
}
