<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_tarea', function (Blueprint $table) {
            $table->integer('empleado_id')->unsigned();
            $table->integer('tarea_id')->unsigned();

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('tarea_id')->references('id')->on('tareas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_tarea');
    }
}
