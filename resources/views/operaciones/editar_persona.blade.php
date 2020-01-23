@extends('layouts.app')

@section('content')

<div class="container">
    <h2>
        @if ($persona->idpersona == null)
            Nueva persona
        @else
            Edición
        @endif
    </h2>

    <form class="border border-light p-5" method="POST" action="/personas/guardar">
        @csrf
        <input type="hidden" id="idpersona" name="idpersona" value="{{ $persona->idpersona }}" />

        <div class="row">
            <div class="md-form col-sm m-0">
                <input name="rut" type="text" id="rut" class="form-control" maxlength="12" required value="{{ $persona->rut }}">
                <label for="rut">RUT</label>
            </div>
            <div class="md-form col-sm"></div>
            <div class="md-form col-sm"></div>
        </div>
        <div class="row">
            <div class="md-form col-sm m-0">
                <input name="apellidopaterno" type="text" id="apellidopaterno" class="form-control" maxlength="45" required value="{{ $persona->apellidopaterno }}">
                <label for="apellidopaterno">Apellido Paterno</label>
            </div>
            <div class="md-form col-sm m-0">
                <input name="apellidomaterno" type="text" id="apellidomaterno" class="form-control" maxlength="45" required value="{{ $persona->apellidomaterno }}">
                <label for="apellidomaterno">Apellido Materno</label>
            </div>
        </div>
        <div class="row">
            <div class="md-form col-sm m-0">
                <input name="primernombre" type="text" id="primernombre" class="form-control" maxlength="45" required value="{{ $persona->primernombre }}">
                <label for="primernombre">Primer Nombre</label>
            </div>
            <div class="md-form col-sm m-0">
                <input name="segundonombre" type="text" id="segundonombre" class="form-control" maxlength="45" required value="{{ $persona->segundonombre }}">
                <label for="segundonombre">Segundo Nombre</label>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success" id="botonGuardar" name="botonGuardar">Guardar</button>
            <a type="button" class="btn btn-default" href="/personas">Cancelar</a>
        </div>

    </form>

    @if ($persona->idpersona > 0)
        <h4>Contratos</h4>


        <a type="button" class="btn btn-primary" href="/personas/contrato/editar/{{ $persona->idpersona }}/0">Agregar Contrato</a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Descripción</th>
                <th scope="col">Tipo Cotrato</th>
                <th scope="col">Cargo</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Término</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($persona->contratos as $contrato)
                    <tr>
                        <td>{{$contrato->descripcion}}</td>
                        <td>{{ $contrato->tipocontrato->tipocontrato }}</td>
                        <td>{{ $contrato->cargo->cargo }}</td>
                        <td>{{$contrato->fechainicio}}</td>
                        <td>{{$contrato->fechatermino}}</td>
                        <td>
                            <a type="button" class="btn btn-success btn-sm" href="/personas/contrato/editar/{{ $persona->idpersona }}/{{ $contrato->idpcontrato }}">Editar</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    @endif


</div>
@endsection
