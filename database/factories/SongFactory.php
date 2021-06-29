<?php

/** @var Factory $factory */

use App\Album;
use App\artist;
use App\Song;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Song::class, function (Faker $faker) {

    return [
        "title" => $faker->title,
        "link" => $faker->url,
        "image" => $faker->url,
        "producer" => $faker->name,
        "writer" => $faker->name,
        "feature" => $faker->name,
        "downloads" => $faker->numberBetween(0, 100),
        "streams" => $faker->numberBetween(0, 200),
        'artist_id'=>function(){return factory(artist::class)->create()->id;},
        'album_id'=>function(){return factory(Album::class)->create()->id;}
    ];
});
