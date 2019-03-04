<?php

use App\Models\Movie;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Models Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\Contact::class, function (Faker $faker) {
    return [
        'phone'     => $faker->phoneNumber,
        'user_id'    =>rand(1,15),
    ];
});

