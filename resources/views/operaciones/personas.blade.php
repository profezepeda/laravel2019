@extends('layouts.app')

@section('content')

<div class="container">
    <h2>{{ $titulo }}</h2>

    <a type="button" class="btn btn-primary" href="/personas/editar/0">Agregar</a>

    <table id="tabla" class="display">
        <thead>
          <tr>
            <th scope="col">RUT</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Nombres</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)

                <tr>
                    <td>{{ $persona->rut }}</td>
                    <td>{{ $persona->apellidopaterno }}</td>
                    <td>{{ $persona->apellidomaterno }}</td>
                    <td>{{ $persona->primernombre }} {{ $persona->segundonombre }}</td>
                    <td>
                        <a type="button" class="btn btn-success btn-sm" href="/personas/editar/{{ $persona->idpersona }}">Editar</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
      </table>

</div>

@endsection

@section("javascript")
<script>
    $(document).ready( function () {
        $('#tabla').DataTable();
    } );
</script>
@endsection
