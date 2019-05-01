<?php

use Faker\Generator as Faker;
use App\Post;
$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(100),
        'detail' => $faker-> realText(200)
    ];
});
