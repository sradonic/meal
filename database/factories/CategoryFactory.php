<?php

use Faker\Generator as Faker;

$factory->define(App\Domain\Category::class, function (Faker $faker) {
    return [
        'title:en' => $faker->name,
        'title:de' => $faker->name,
        'title:fr' => $faker->name,
        'slug' => $faker->text($maxNbChars = 100),
    ];
});
