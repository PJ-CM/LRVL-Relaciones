<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Departamento;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    protected $valores_tipo = 'empleado';

    public function index ()
    {
        $valores = Empleado::all();

        return view ('empleados.index')->with([
            'valores_tipo' => $this->valores_tipo,
            'valores' => $valores,
            'valoresTOT' => count($valores),
            //'accion' => $accion,
        ]);
    }

    public function get ($id)
    {
        $_arr_detalle = [];

        $valor = Empleado::findOrFail($id);
        $_arr_detalle['valor'] = $valor;

        return view ('empleados.empleado')->with($_arr_detalle);
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('empleados.create')->with([
            'departamentos' => $departamentos,
        ]);
    }

    public function store(Request $request)
    {
        //Estableciendo reglas de validación
        $reglas = [
            'nombre' => 'required|max:190',
            'apellido1' => 'required|max:190',
            'apellido2' => 'required|max:190',
            'email' => 'required|max:190',
            'telefono' => 'required|max:190',
            'departamento_id' => 'required|not_in:0',
        ];
        //Validando petición
        $request->validate($reglas);

        //Insertando nuevo registro y recuperando el ID
        //------------------------------------------------
        $empleado = Empleado::create($request->all());
        if(empty($empleado->id)) {
            //Log::error('Failed to insert row into database.');
            dd('ERROR al insertar en la tabla ['.$this->valores_tipo.'s'.'] de la base de datos. ['. $empleado->id.']');
        } else {
            //dd('Inserto efectuado. ['. $empleado->id.']');

            //Redirigiendo al Listado
            //==========================================
            //  -> Redirigiendo hacia nombre de Ruta
            ////return redirect()->route('empleados');
            $accion = 'insertar_'.$empleado->id;
            return redirect()->route('empleados', ['accion' => $accion]);
        }
    }
}
