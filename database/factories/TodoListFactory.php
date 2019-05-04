<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\TodoList;
use Faker\Generator as Faker;
use Psy\Util\Str;

$factory->define(TodoList::class, function (Faker $faker) {
    return [
        'name' => 'List'.Str::random(4)
    ];
});
