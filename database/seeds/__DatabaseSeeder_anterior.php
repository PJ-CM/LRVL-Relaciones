<?php

use App\Empleado;
use App\Proyecto;
use App\Departamento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersSeeder::class);
        $num_departamentos_crear = 10;
        factory(Departamento::class, $num_departamentos_crear)->create();

        //cantidad MÁX proyectos
        $cantidadProyectos = 40;
        ////$proyectos = factory(Proyecto::class, $cantidadProyectos)->create();
        //Como es una variable que no se va a usar, se obvia
        factory(Proyecto::class, $cantidadProyectos)->create();/**/

        //cantidad MÁX empleados
        $cantidadEmpleados = 40;
        $empleados = factory(Empleado::class, $cantidadEmpleados)->create()
            /*->each(function($empleado) use ($proyectos) {
                $empleado->proyectos()
                    ->attach($proyectos->random(mt_rand(20, 30)));
            });*/
            /**
             * El bloque de código anterior tiene esta lectura como sigue:
             *      >> Por cada instancia de $empleado generada
             *      y usando la variable exterior $proyectos
             *      >> Obtener de entre 20 a 30 resultados aleatorios
             *          random(mt_rand(20, 30)
             *      de la lista de proyectos disponibles
             *          $proyectos
             *      por medio de la relación definida dentro del modelo Empleado
             *          proyectos()
             *      para que sean registrados en el $empleado que se está creando
             */

            /**
             * en vez del bloque anterior, para mejorarlo y facilitar algo más el código,
             * se puede establecer, también, de esta forma, en la que se considera
             * una equivalencia entre la cantidad de proyectos disponibles (40)
             * y los IDs que cada proyecto poseerá en la tabla (que de manera
             * predeterminada, irán de 1 a 40).
             * La aleatoriedad de la elección vendrá dada gracias al empleo de
             *      array_rand()
             *          >> del rango obtenido, escoger 20 resultados que serán aleatorios
             */
            ->each(function($empleado) use ($cantidadProyectos) {
                $empleado->proyectos()
                    ->attach(array_rand(range(1, $cantidadProyectos), 20));
            });
    }
}
