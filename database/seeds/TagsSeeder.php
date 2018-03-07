<?php

use App\Domain\Meal;
use App\Domain\Tag;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Domain\Tag::class, 2)->create();
        /*
        $faker = Faker::create();

        $meals = Meal::all()->pluck('id')->toArray();

        Tag::create([
            'title' => $faker->name,
            'slug' => $faker->text($maxNbChars = 100),
            'meal_id' => $faker->randomElement($meals),
        ]);
*/

    }
}
