<?php

/** @var Factory $factory */

use App\artist;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(artist::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "biography" => $faker->paragraph,
        "image" => $faker->url,
        "instagram"=> $faker->url,
        "facebook"=> $faker->url,
        "applemusic"=> $faker->url,
        "youtube"  => $faker->url,
        "soundcloud" => $faker->url,
       "spotify" => $faker->url
    ];
});
