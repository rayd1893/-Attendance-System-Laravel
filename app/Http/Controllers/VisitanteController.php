<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitante;
use App\Persona;
use App\Kumite;
use App\Visita;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->nombres == "") {
            return response()->json([
                'status' => 0,
                'message' => 'Debe ingresar los nombres'
            ]);
        }

        if ($request->paterno == "") {
            return response()->json([
                'status' => 0,
                'message' => 'Debe ingresar el apellido paterno'
            ]);
        }

        if ($request->materno == "") {
            return response()->json([
                'status' => 0,
                'message' => 'Debe ingresar el apellido materno'
            ]);
        }

        $persona = new Persona();
        $persona->primerNombre = $request->nombres;
        $persona->apellidoPaterno = $request->paterno;
        $persona->apellidoMaterno = $request->materno;
        $persona->fechaNacimiento = $today = date("Y-m-d");
        $persona->fechaRegistro = date("Y-m-d H:i:s");
        $persona->codigoPais = '+51';
        $persona->telefonoCasaCel = '000000';
        $persona->telefonoTrabajo = '999999';
        $persona->estadoRegistro = 1;
        $persona->observaciones = 'Ninguna';
        $persona->usuarioRegistro = 0;

        $persona->save();

        $kumite = new Kumite();
        $kumite->idPersona = $persona->idPersona;
        $kumite->codigoKumite = "No tiene";
        $kumite->idGrupo = 43;
        $kumite->fechaRegistro = date("Y-m-d H:i:s");
        $kumite->usuarioRegistro = 0;

        $kumite->save();

        $visitante = new Visitante;
        $visitante->idPersona = $persona->idPersona;
        $visitante->estadoVisitante = 1;
        $visitante->fecharegistro = date("Y-m-d H:i:s");
        $visitante->usuarioRegistro = 0;

        $visitante->save();

        $visita = new Visita;
        $visita->idPersona = $persona->idPersona;
        $visita->fechaVisita = date("Y-m-d H:i:s");
        $visita->estadoVisita = 1;
        $visita->fechaRegistro = date("Y-m-d H:i:s");
        $visita->usuarioRegistro = 0;

        $visita->save();

        return response()->json([
            'status' => 1,
            'message' => 'Asistencia registrada con éxito'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
