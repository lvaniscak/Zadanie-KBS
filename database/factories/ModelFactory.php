<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Users\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});


$factory->define(App\Hobbies\Hobby::class, function(Faker\Generator $faker) {

    $result = array();
    foreach ((new \App\Hobbies\Hobby())->getFillable() as $hobby)
        $result[$hobby] = $faker->boolean;

    return $result;
});
