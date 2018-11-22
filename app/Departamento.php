<?php

namespace App;

use App\Empleado;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Un departamento puede tener inscritos uno o muchos empleados
     *
     * @return void
     */
    public function empleados() {
        return $this->hasMany(Empleado::class);
    }

    /**
     * Un departamento tiene un empleado como jefe
     *
     * @return void
     */
    public function empleado_jefe() {
        return $this->belongsTo(Empleado::class, 'jefe_id');
    }
}
