<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Beneficiario;
use Faker\Generator as Faker;

$factory->define(Beneficiario::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'password' => '123456789',
    ];
});
