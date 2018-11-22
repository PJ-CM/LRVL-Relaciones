<?php

use App\Departamento;
use Faker\Generator as Faker;

$factory->define(App\Empleado::class, function (Faker $faker) {
    ////$departamentos = Departamento::all();
    /**
     * Mejor que la anterior, poner como sigue:
     * para que no se consulte y se cargue la lista de nuevo cada vez que se genere
     * una instancia de Curso, lo que causaría lentitud en el proceso, se puede poner
     * la variable a STATIC
     */
    //static $departamentos = Departamento::all();
    /**
     * y como a las variables STATIC no se les puede asignar, directamente, un valor,
     * se deberá codificar de esta forma:
     */
    static $departamentos;
    $departamentos = Departamento::all();

    return [
            //name, para generar un nombre completo (Nombre y Apellido) aleatorio
            //firstName, para generar solo un nombre aleatorio
            //  => firstNameMale, para generar solo un nombre de hombre aleatorio
            //  => firstNameFemale, para generar solo un nombre de mujer aleatorio
            //lastname, para generar solo un apellido aleatorio
        'nombre' => $faker->firstName,
        'apellido1' => $faker->lastname,
        'apellido2' => $faker->lastname,
        'email' => $faker->email,
        'telefono' => $faker->tollFreePhoneNumber,
        'departamento_id' => $departamentos->random()->id,
    ];
});
