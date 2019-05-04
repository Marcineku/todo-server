<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\TodoListRecord;
use Faker\Generator as Faker;
use Psy\Util\Str;

$factory->define(TodoListRecord::class, function (Faker $faker) {
    return [
        'content' => 'RecordBody'.Str::random(4)
    ];
});
