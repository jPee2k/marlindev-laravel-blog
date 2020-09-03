<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text(50),
        'content' => $faker->text(500),
        'image' => 'photo' . $faker->unique()->randomDigit . '.jpg',
        'date' => $faker->date('d-m-Y', now()),
        'views' => $faker->numberBetween(0, 3000),
        'category_id' => $faker->numberBetween(1, 3),
        'user_id' => 14,
        'status' => 1,
        'is_featured' => rand(0, 1)
    ];
});
