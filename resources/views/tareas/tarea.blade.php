@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

    <div><a href="{{ route('tareas') }}" title="Ir al listado anterior">Volver al listado</a></div>

    <h2>Tarea: {{ $valor->nombre }}</h2>

    @if (count($valor->empleados) == 0)

    <h3>Esta tarea no tiene empleados asignados.</h3>

    @else

    <h3>Empleados con esta tarea asignada:</h3>
    <h4>Hay [<strong>{{ count($valor->empleados) }}</strong>] empleado(s):</h4>
    <ul>
    @foreach ($valor->empleados as $empleado)
        <li>
            <a href="{{ route('empleado', ['id' => $empleado->id]) }}" title="Ver detalle del colaborador">{{ $empleado->nombre . ' ' . $empleado->apellido1 . ' ' . $empleado->apellido2 . '.' }}</a>
        </li>
    @endforeach
    </ul>
    @endif

@endsection
