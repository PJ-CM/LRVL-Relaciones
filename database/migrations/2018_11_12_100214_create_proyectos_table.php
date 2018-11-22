<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            ////$table->string('nombre');
            $table->string('titulo');
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->integer('horasestimadas');
            $table->integer('empleado_id')->unsigned();
            $table->timestamps();

            //Indicando que se añade una clave foránea referida
            //al campo 'id' de la otra tabla 'empleados'
            $table->foreign('empleado_id')->references('id')->on('empleados');

            /**
             * Al haber un campo que está definido como "unique",
             * en este caso, el campo 'nombre', ¿el Primary Key de la tabla
             * es, únicamente, el campo 'id' o el Primary Key sería una
             * clave compuesta formada por los campos 'id' y 'nombre'?
             * Si no se especifica nada, el sistema establece como Primary Key
             * el campo definido como autoincremental (increments), en este caso
             * el campo 'id'. Sino, para indicar, explícitamente, qué campo se
             * define como Primary Key, se puede hacer así:
             *      $table->primary('nombre_campo');
             * Para crear una clave compuesta (¡¡¿¿compound o composite??!!) entre
             * más de uno de los campos de la tabla, es posible que la forma sea así,
             * si la clave se tiene que crear con, por ejemplo, el campo 'nombre_campo_1'
             * y el campo 'nombre_campo_2':
             *      $table->index(['nombre_campo_1', 'nombre_campo_2']);
             * o, más concretamente, así:
             *      $table->primary(['nombre_campo_1', 'nombre_campo_2']);
             *
             * Esto equivale a hacer lo que sigue a través de SQL:
             *  create table vehiculos(
             *      patente char(6) not null,
             *      tipo char(4),
             *      horallegada time not null,
             *      horasalida time,
             *      primary key(patente, horallegada)
             *  );
             *      dónde los campos 'patente' y 'horallegada' se unen para establecer
             *      la clave compuesta
             *
             * Este caso o duda se presenta, también, dentro de la tabla 'departamentos'
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
