<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    protected $valores_tipo = 'departamento';

    public function index ()
    {
        $valores = Departamento::all();

        return view ('departamentos.index')->with([
            'valores_tipo' => $this->valores_tipo,
            'valores' => $valores,
            'valoresTOT' => count($valores),
            //'accion' => $accion,
        ]);
    }

    public function get ($id)
    {
        $_arr_detalle = [];

        $valor = Departamento::findOrFail($id);
        $_arr_detalle['valor'] = $valor;

        return view ('departamentos.departamento')->with($_arr_detalle);
    }
}
