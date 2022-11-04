<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'category_name' => 'Breakfast',
                'description' => 'Meals to start your day',
                "image" => 'public/images/categories/9RQ9tXuVVfzzv4ucmYpFTxyUUlSjStTAHYe3hkkN.jpg'
            ],
            [
                'category_name' => 'Lunch',
                'description' => 'Middle of the day? Have a meal with us then',
                "image" => 'public/images/categories/1FYVQCNLnCX8FxHNJZRfJcFJEmzqLQODGrJyWnUw.jpg'
            ],
            [
                'category_name' => 'Dinner',
                'description' => 'Nighttime already; Have something to eat before you sleep',
                "image" => 'public/images/categories/8UAiY5l0lTNsxr7HjlAFFX7I34CPdjLCi2NrUekR.jpg'
            ]
        ]);
    }
}
