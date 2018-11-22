<?php

namespace App;

use App\Tarea;
use App\Proyecto;
use App\Departamento;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido1', 'apellido2', 'email', 'telefono', 'departamento_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Un empleado está inscrito en un departamento
     *
     * @return void
     */
    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }

    /**
     * Un empleado puede ser el jefe de un departamento
     *
     * @return void
     */
    public function jefe_del_dep() {
        return $this->hasOne(Departamento::class, 'jefe_id');
    }

    /**
     * Un empleado puede dirigir un proyecto
     *
     * @return void
     */
    public function proyecto() {
        return $this->hasOne(Proyecto::class);
    }

    /**
     * Un empleado puede colaborar en uno o muchos proyectos
     *
     * @return void
     */
    public function proyectos() {
        //Devolviendo solo los campos que participan en la relación
        ////return $this->belongsToMany(Proyecto::class);
        //Devolviendo los campos indicados además de los campos que participan en la relación
        return $this->belongsToMany(Proyecto::class)->withPivot('fechahorainicio', 'fechahorafin');
    }

    /**
     * Un empleado puede tener asignada una o muchas tareas
     *
     * @return void
     */
    public function tareas() {
        return $this->belongsToMany(Tarea::class);
    }
}
