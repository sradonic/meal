<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Meal::class, function (Faker $faker) {
    return [
        'title:en' => $faker->name,
        'description:en' => $faker->text($maxNbChars = 180),
        'title:de' => $faker->name,
        'description:de' => $faker->text($maxNbChars = 180),
        'title:fr' => $faker->name,
        'description:fr' => $faker->text($maxNbChars = 180),
        'slug' => $faker->text($maxNbChars = 60),
    ];
});
