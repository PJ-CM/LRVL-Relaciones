<?php

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(App\Proyecto::class, function (Faker $faker) {
    static $empleados;
    $empleados = Empleado::all();

    return [
        //
        //sentence, para frases aleatorias  || mt_ran(2,4) para generar una sentencia con un núm. de 2 a 4 palabras
        //'nombre' => $faker->sentence(mt_rand(1,2)),
        //      unique(),
        //      para sentencias únicas (no repetidas en cada vuelta)
        ////'nombre' => $faker->sentence(mt_rand(1,2)),
        'nombre' => 'Proy. ' . $faker->unique()->sentence(mt_rand(1,2)),
        'titulo' => $faker->sentence(mt_rand(2,4)),
        ////'fechainicio' => $faker->dateTimeThisCentury->format('Y-m-d'),
        ////'fechafin' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'fechainicio' => $faker->date,
        'fechafin' => $faker->date,
        'horasestimadas' => $faker->numberBetween($min = 200, $max = 500),
        'empleado_id' => $empleados->random()->id,
    ];
});
