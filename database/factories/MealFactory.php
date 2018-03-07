<?php

use App\Domain\Category;
use Faker\Generator as Faker;

$categories = Category::all()->pluck('id')->toArray();

$factory->define(App\Domain\Meal::class, function (Faker $faker) use ($categories) {
    return [
        'title:en' => $faker->name,
        'description:en' => $faker->text($maxNbChars = 180),
        'title:de' => $faker->name,
        'description:de' => $faker->text($maxNbChars = 180),
        'title:fr' => $faker->name,
        'description:fr' => $faker->text($maxNbChars = 180),
        'status' => 'created',
        'slug' => $faker->text($maxNbChars = 60),
        'category_id' => $faker->randomElement($categories),
    ];
});
