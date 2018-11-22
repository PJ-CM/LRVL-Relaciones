<?php

use App\Tarea;
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

        //cantidad MÁX empleados
        $cantidadEmpleados = 50;
        ////$empleados = factory(Empleado::class, $cantidadEmpleados)->create();
        //Como es una variable que no se va a usar, se obvia
        factory(Empleado::class, $cantidadEmpleados)->create();

        //cantidad MÁX proyectos
        $cantidadProyectos = 140;
        $minRangoProy = 1;
        ////$cantidadEmpleadosXProyecto = 7;
        ////$cantidadEmpleadosXProyecto = $cantidadEmpleadosXTarea = random_int(1, 10);
        ////$cantidadEmpleadosXProyecto = $cantidadEmpleadosXTarea = $this->getNumAleatorio(1, 10);
        $minEmpleadosXProyecto = 2;
        $maxEmpleadosXProyecto = 10;
        $proyectos = factory(Proyecto::class, $cantidadProyectos)->create()
            /*->each(function($proyecto) use ($empleados) {
                $proyecto->empleados()
                    ->attach($empleados->random(mt_rand(20, 30)));
            });*/
            /**
             * El bloque de código anterior tiene esta lectura como sigue:
             *      >> Por cada instancia de $proyecto generada
             *      y usando la variable exterior $empleados
             *      >> Obtener de entre 20 a 30 resultados aleatorios
             *          random(mt_rand(20, 30)
             *      de la lista de empleados disponibles
             *          $empleados
             *      por medio de la relación definida dentro del modelo Proyecto
             *          empleados()
             *      para que sean registrados en el $proyecto que se está creando
             */

            /**
             * en vez del bloque anterior, para mejorarlo y facilitar algo más el código,
             * se puede establecer, también, de esta forma, en la que se considera
             * una equivalencia entre la cantidad de empleados disponibles ($cantidadEmpleados)
             * y los IDs que cada proyecto poseerá en la tabla (que de manera
             * predeterminada, irán de $minRangoProy a $cantidadEmpleados).
             * La aleatoriedad de la elección vendrá dada gracias al empleo de
             *      array_rand()
             *          >> del rango obtenido, escoger $cantidadEmpleadosXProyecto resultados
             *          que serán aleatorios
             */
            /*
            ->each(function($proyecto) use ($cantidadEmpleados) {
                $proyecto->empleados()
                    //->attach(array_rand(range($minRangoProy, $cantidadEmpleados), $cantidadEmpleadosXProyecto));
                    ////->attach($this->getArrRangoNums($minRangoProy, $cantidadEmpleados, $cantidadEmpleadosXProyecto));
            });*/
            ->each(function($proyecto) use ($minRangoProy, $cantidadEmpleados, $minEmpleadosXProyecto, $maxEmpleadosXProyecto) {
                $proyecto->empleados()
                    ->attach(array_rand(array_flip(range($minRangoProy, $cantidadEmpleados)), $this->getNumAleatorio($minEmpleadosXProyecto, $maxEmpleadosXProyecto)));
            });

        //cantidad MÁX tareas
        $cantidadTareas = 47;
        $minRangoTarea = 1;
        $minEmpleadosXTarea = 1;
        $maxEmpleadosXTarea = 10;
        $tareas = factory(Tarea::class, $cantidadTareas)->create()
            ->each(function($tarea) use ($minRangoTarea, $cantidadEmpleados, $minEmpleadosXTarea, $maxEmpleadosXTarea) {
                $tarea->empleados()
                    ->attach(array_rand(array_flip(range($minRangoTarea, $cantidadEmpleados)), $this->getNumAleatorio($minEmpleadosXTarea, $maxEmpleadosXTarea)));
            });
    }

    /**
     * Array de Rango de Números.
     *
     * @return void
     */
    public function getNumAleatorio($rangoMin, $rangoMax)
    {
        return $numAleatorio = random_int($rangoMin, $rangoMax);
    }

    /**
     * Array de Rango de Números.
     *
     * @return void
     */
    public function getArrRangoNums($rangoMin, $rangoMax, $numElems)
    {
        /**
         * range(min. max) devuelve un ARRAY de números que va del "min" al "max"
         * array_rand(array, numElems), selecciona uno o numElems (si se especifica este
         * parámetro) elementos del array pasado y devuelve un array con los índices de dichos
         * valores aleatorios escogidos del array que recibe.
         *
         * Así que podría existir un valor 0 entre los elementos que albergará el
         * _arr_rangoIndices resultante.
         * El valor 0 no sería aceptado como un ID válido y se produciría un error de INTEGRIDAD
         * Por ello, se recorre el _arr_rangoIndices resultante y cada uno de sus valores es
         * insertado en otro array de nombre _arr_rangoNums tras sumarle 1.
         * Así, ya no habrá un elmento igual a 0 y se evitará el posible ERROR de Integridad.
         */
        $_arr_rangoIndices = array_rand(range($rangoMin, $rangoMax), $numElems);
        $_arr_rangoNums = [];
        foreach($_arr_rangoIndices as $k=>$v) {
            $_arr_rangoNums[$k] = $v + 1;
        }

        return $_arr_rangoNums;
    }
}
