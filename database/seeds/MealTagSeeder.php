<?php

use App\Domain\Meal;
use App\Domain\Tag;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MealTagSeeder extends Seeder
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
        $tagIds = Tag::pluck('id')->all();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('meal_tag')->insert([
                'meal_id' => $faker->unique()->randomElement($mealIds),
                'tag_id' => $faker->randomElement($tagIds)
            ]);


        }
    }
}
