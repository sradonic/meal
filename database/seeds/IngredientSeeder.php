<?php

use App\Domain\Ingredient;
use App\Domain\Meal;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Domain\Ingredient::class, 20)->create();
    }
}
