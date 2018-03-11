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
        factory(App\Domain\Tag::class, 20)->create();
    }
}
