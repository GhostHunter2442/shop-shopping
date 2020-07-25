<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence($nbWords = 4, $variableNbWords = true),
        'slug'=> $faker->slug,
        'price'=> $faker->biasedNumberBetween(800,10000),
        'stock'=> $faker->biasedNumberBetween(0,10),
        'discount'=> $faker->biasedNumberBetween(0,50),
        'weight'=> $faker->biasedNumberBetween(1,2),
        'detail'=> $faker->text($maxNbChars = 500),
        'category_id'=> $faker->biasedNumberBetween(1,5),
        'created_at'=> $faker->dateTime($max='now'),
        'updated_at'=> $faker->dateTime($max='now'),
    ];
});
