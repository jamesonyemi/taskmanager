<?php

use Faker\Generator as Faker;

$factory->define(App\Roles::class, function (Faker $faker) {
    return [
        'id'=>1,
        'name'=>'Admin',

    ];
});
