<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Beneficiario;
use App\Donacion;
use Faker\Generator as Faker;

$factory->define(Donacion::class, function (Faker $faker) {
    return [
        'beneficiario_id' => Beneficiario::all()->random()->id,
        'cantidad' => $faker->numberBetween(50, 2000),
        'donador_name' => $faker->name(),
    ];
});
