<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text(100),
        'content' => $faker->text(1000),
        'image' => 'photo' . rand(1, 6) . '.jpg',
        'date' => $faker->date('d-m-Y', now()),
        'views' => $faker->numberBetween(0, 3000),
        'category_id' => $faker->numberBetween(1, 5),
        'user_id' => 1,
        'status' => rand(0, 1),
        'is_featured' => rand(0, 1)
    ];
});
