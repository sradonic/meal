<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(MealIngredientSeeder::class);
        $this->call(MealTagSeeder::class);

    }
}
