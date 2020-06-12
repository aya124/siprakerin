<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    $nameWithoutSpace = str_replace(' ', '', $name);
    $nameWithoutDot = str_replace('.', '', $nameWithoutSpace);
    $email = strtolower($nameWithoutDot).'@gmail.com';

    return [
        'name' => $name,
        'email' => $email,
        'email_verified_at' => now(),
        'password' =>  Hash::make('password'),
        'remember_token' => Str::random(10),
    ];
});
