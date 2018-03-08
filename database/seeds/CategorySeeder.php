<?php

use App\Domain\Category;
use App\Domain\Meal;
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
        factory(Category::class, 20)->create()->each(function ($data) {
            $data->meal()->saveMany(factory(Meal::class, 20)->make());
        });
    }
}
