<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlackList;
use Faker\Generator as Faker;

$factory->define(BlackList::class, function (Faker $faker) {
    return [
        //
        'category' => 'doctors',
        'name' => $faker->name,
        'company' => $faker->text,
        'address' => $faker->text,
        'position' => $faker->text,
        'comment' => $faker->text,
    ]; 
});
