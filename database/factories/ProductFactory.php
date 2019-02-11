<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder\ProductTableSeeder;

$factory->define(App\Product::class, function (Faker $faker) {
   
    return [
        'title' => $faker->sentence(),
        'description' => $faker -> paragraph(),
        'price' => $faker -> randomDigit(),
        'reference' => $faker -> word(),
        'size' => $faker -> numberBetween($min = 1, $max = 4),
        'code' => $faker -> numberBetween($min = 1, $max = 2),
        'price' => $faker -> numberBetween($min = 1, $max = 1000)
    ];
});
