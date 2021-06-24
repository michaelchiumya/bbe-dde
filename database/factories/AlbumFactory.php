<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Album;
use App\artist;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [

      "title" => $faker->title,
      "label" => $faker->company,
      "link" => $faker->url,
      "release_date" => $faker->date("y-m-d"),
      "image"=> $faker->url,
     'artist_id'=>function(){return factory(artist::class)->create()->id;}
    ];
});
