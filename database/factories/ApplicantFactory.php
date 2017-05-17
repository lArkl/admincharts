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
$factory->define(App\Applications::class, function (Faker\Generator $faker) {
    return [
       'first_name' => $faker->name,
       'middle_name' => $faker->name,
       'first_surname' => $faker->name,
       'second_surname' => $faker->name,
       'birth_date' => $faker->date,
       'document' => $faker->number(6),
       'home_phone' => $faker->number(6),
       'mobile_phone' => $faker->number(6),
       'email' => $faker->safeEmail,
       'workshop_name' => $faker->name,
       'status' => 'pending',
       'created_at' => $faker->date,
       'updated_at' => Carbon::now(), 
    ];
});
