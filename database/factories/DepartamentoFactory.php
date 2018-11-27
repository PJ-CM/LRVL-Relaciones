<?php

use Faker\Generator as Faker;

$factory->define(App\Departamento::class, function (Faker $faker) {
    return [
        //
        //sentence, para frases aleatorias  || mt_ran(2,4) para generar una sentencia con un núm. de 2 a 4 palabras
        'codigo' => $faker->unique()->uuid,
        'nombre' => $faker->sentence(mt_rand(1,2)),
        //Campo añadido
        'jefe_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
