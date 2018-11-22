@extends('layouts.default')

@section('title', 'UD5. ORM')

@section('content')

    <h2>Nuevo Empleado</h2>

    <div class="row a_dcha">
        <a class="btn btn-primary" href="{{ route('empleados') }}" role="button">Volver al listado</a>
    </div>

    <div class="row flex-center">
        <div class="col-xs|sm|md|lg|xl-1-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="container">
            <form action="{{ route('empleado_store') }}" method="POST">
                @csrf
                <fieldset class="form-group row">
                    <legend> Datos </legend>
                    <div class="col-sm-1-12">

                        <div class="form-group">
                            <label for="nombre-id">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre-id" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="apellido1-id">1º Apellido:</label>
                            <input type="text" class="form-control" name="apellido1" id="apellido1-id" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="apellido2-id">2º Apellido:</label>
                            <input type="text" class="form-control" name="apellido2" id="apellido2-id" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email-id">Email:</label>
                            <input type="text" class="form-control" name="email" id="email-id" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="telefono-id">Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono-id" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="departamento_id-id">Departamento</label>
                            <select class="form-control" name="departamento_id" id="departamento_id-id">
                                <option value="0">Selecciona uno</option>
                                @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </fieldset>
                <small id="emailHelp" class="form-text text-muted">:: Todos los campos son requeridos ::</small>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
