@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

  <h2>Departamento: {{ $valor->nombre }}</h2>
  <h3>Codigo: {{ $valor->codigo }}</h3>
  <h3>Empleados:</h3>

  @if (count($valor->empleados) == 0)
  <ul>
      <li>
          Este departamento no tiene asignado ningún empleado.
      </li>
  </ul>

  @else
  <h4>Hay [<strong>{{ count($valor->empleados) }}</strong>] empleado(s) disponible(s):</h4>
  <ul>
  @foreach ($valor->empleados as $empleado)
      <li>
            <a href="{{ route('empleado', ['id' => $empleado->id]) }}" title="Ver detalle del empleado">{{ $empleado->nombre . ' ' . $empleado->apellido1 . ' ' . $empleado->apellido2 }}</a>@if ($empleado->id == $valor->empleado_jefe->id) <i class="fas fa-star" title="Jefe de Departamento" style="color: goldenrod;"></i>@endif
      </li>
  @endforeach
  </ul>
  @endif

@endsection
