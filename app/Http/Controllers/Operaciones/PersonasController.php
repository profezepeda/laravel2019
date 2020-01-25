<?php

namespace App\Http\Controllers\Operaciones;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Persona;
use App\Modelos\PersonaTipoContrato;
use App\Modelos\Cargo;


class PersonasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $personas = Persona::orderBy("apellidopaterno")->orderBy("apellidomaterno")->get();
        return view("operaciones.personas", array("personas" => $personas, "titulo" => "Gestión de Personas"));
    }

    public function editar($idpersona)  {
        $persona = new Persona();
        if ($idpersona > 0) {
            $persona = Persona::find((int)$idpersona);
        }
        $tiposcontrato = PersonaTipoContrato::all();
        $cargos = Cargo::all();
        return view("operaciones.editar_persona", array("persona" => $persona, "tiposcontrato" => $tiposcontrato, "cargos" => $cargos));
    }

    public function guardar(Request $request)   {
        $persona = new Persona();
        if ((int)$request->idpersona > 0)  {
            $persona = Persona::find((int)$request->idpersona);
        }
        $persona->rut = $request->rut;
        $persona->apellidopaterno = $request->apellidopaterno;
        $persona->apellidomaterno = $request->apellidomaterno;
        $persona->primernombre = $request->primernombre;
        $persona->segundonombre = $request->segundonombre;
        $persona->fechanacimiento = "2019-01-01";
        $persona->save();

        return redirect("/personas/editar/".$persona->idpersona);
    }


}
