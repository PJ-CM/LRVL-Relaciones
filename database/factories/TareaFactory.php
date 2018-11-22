<?php

use Faker\Generator as Faker;

$factory->define(App\Tarea::class, function (Faker $faker) {
    return [
        //
        //sentence, para frases aleatorias  || mt_ran(2,4) para generar una sentencia con un núm. de 2 a 4 palabras
        //      unique(),
        //      para sentencias únicas (no repetidas en cada vuelta)
        'nombre' => 'Tarea ' . $faker->unique()->sentence(mt_rand(1, 4)),
    ];
});
