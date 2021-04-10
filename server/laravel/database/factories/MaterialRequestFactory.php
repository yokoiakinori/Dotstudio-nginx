<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MaterialRequest;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(MaterialRequest::class, function (Faker $faker) {
    $title = $faker->array;
    $contents = $faker->sentence;
    return [
        'title' => $title,
        'contents' => $contents,
        'user_id' => factory(App\User::class)->create()->id,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
