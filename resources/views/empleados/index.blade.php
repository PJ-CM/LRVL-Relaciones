@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

    <h2>Empleados</h2>

    <div class="row a_dcha">
            <a class="btn btn-primary" href="{{ route('empleado_create') }}" role="button">Nuevo</a>
    </div>

    @if ($valoresTOT == 0)

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre/Apellido</th>
                <th>Departamento</th>
                <th>Responsable del proyecto</th>
            </tr>
        <thead>
        <tbody>
            <tr>
                <td colspan="4">{{ 'No existen ' . strtoupper($valores_tipo.'s') . ' disponibles en la actualidad. Vuelva en otro momento. Gracias.' }}</td>
            </tr>
        </tbody>
    </table>

    @else

    <h3>Hay [<strong>{{ $valoresTOT }}</strong>] {{ $valores_tipo }}(s) disponible(s)</h3>
    <table id="listado">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre/Apellido</th>
                <th>Departamento</th>
                <th>Responsable del proyecto</th>
            </tr>
        <thead>
        <tbody>
            <?php //var_dump($valores);
            $contador = 0; ?>
            @foreach ($valores as $valor)
                @php
                    $contador++;
                @endphp
            <tr class="filas">
                <td>{{ $contador < 10 ? '0'.$contador : $contador }}</td>
                <td><a href="{{ url('/'.$valores_tipo.'/'.$valor->id) }}" title="Ir al detalle" class="negrita">{{ $valor->nombre . ' ' . $valor->apellido1 . ' ' . $valor->apellido2 }}</a>@isset($valor->jefe_del_dep) <i class="fas fa-star" title="Jefe de Departamento" style="color: goldenrod;"></i>@endisset</td>
                <td><a href="{{ route('departamento', ['id' => $valor->departamento->id]) }}" title="Ver detalle del departamento">{{ $valor->departamento->nombre }}</a></td>
                @isset($valor->proyecto)
                <td><a href="{{ route('proyecto', ['id' => $valor->proyecto->id]) }}" title="Ver detalle del proyecto">{{ $valor->proyecto->nombre }}</a></td>
                @endisset
                @empty($valor->proyecto)
                <td>No es responsable de ninguno</td>
                @endempty
                {{-- isset($valor->proyecto) == 1 ? ' selected' : '' --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif

@endsection
