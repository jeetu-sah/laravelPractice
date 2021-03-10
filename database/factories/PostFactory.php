<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = Str::slug( $title, '-');
    
    return [
        'title' => $title,
        'title_slug' => $slug,
        'description' => $faker->text(),
        'user_id' => factory('App\User')->create()->id,
    ];
});
