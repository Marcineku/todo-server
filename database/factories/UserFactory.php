<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('123'),
        'remember_token' => Str::random(10)
    ];
});
