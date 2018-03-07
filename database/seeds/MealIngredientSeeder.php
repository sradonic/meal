<?php

use App\Domain\Ingredient;
use App\Domain\Meal;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MealIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $mealIds = Meal::pluck('id')->all();
        $ingredientIds = Ingredient::pluck('id')->all();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('meal_ingredient')->insert([
                'meal_id' => $faker->unique()->randomElement($mealIds),
                'ingredient_id' => $faker->randomElement($ingredientIds)
            ]);


        }
    }
}
