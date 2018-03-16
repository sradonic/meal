<?php

use App\Model\Ingredient;
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
        factory(App\Model\Ingredient::class, 20)->create();
    }
}
