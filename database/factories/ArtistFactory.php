<?php

/** @var Factory $factory */

use App\artist;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(artist::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "biography" => $faker->paragraph,
        "image" => $faker->paragraph,
        "instagram"=> $faker->sentence,
        "facebook"=> $faker->sentence,
        "applemusic"=> $faker->sentence,
        "youtube"  => $faker->sentence,
        "soundcloud" => $faker->sentence,
       "spotify" => $faker->sentence
    ];
});
