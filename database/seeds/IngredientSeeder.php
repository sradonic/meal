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
        factory(App\Domain\Ingredient::class, 2)->create();
        /*
        $faker = Faker::create();

        $meals = Meal::all()->pluck('id')->toArray();

        Ingredient::create([
            'title' => $faker->name,
            'slug' => $faker->text($maxNbChars = 100),
            'meal_id' => $faker->randomElement($meals),
        ]);*/
    }
}
