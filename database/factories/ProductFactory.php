<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

    // factory(App\Products::class,1)->create()->each(function($image)
    //     {
    //         $image->userable()->save(
    //             factory(App\Image::class)->create()
    //         );
    //     });

    $factory->define(Products::class, function (Faker $faker) {
        return [
            'name'=> $faker->name,
            'description'=>$faker->paragraph,
            'price'=> $faker->numberBetween($min=10, $max=1000),
        ];
    });
