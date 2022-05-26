<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Visita;
use DB;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date("Y-m-d");
        $personas = Persona::All();
        $visitas = Visita::where("fechaVisita", ">=", $today)->where("estadoVisita", 1)->get();
        $resumen = DB::table('VISITA')
                    ->join('PERSONA', 'VISITA.idPersona', '=', 'PERSONA.idPersona')
                    ->join('KUMITE', 'PERSONA.idPersona', '=', 'KUMITE.idPersona')
                    ->join('GRUPO', 'GRUPO.idGrupo', '=', 'KUMITE.idGrupo')
                    ->join('HAN', 'GRUPO.idHan', '=', 'HAN.idHan')
                    ->join('ZONA', 'ZONA.idZona', '=', 'HAN.idZona')
                    ->join('LOCAL', 'ZONA.idLocal', '=', 'LOCAL.idLocal')
                    ->select('LOCAL.descLocal', DB::raw('COUNT(VISITA.idPersona) as total_visitas'))
                    ->where("fechaVisita", ">=", $today)
                    ->where("estadoVisita", 1)
                    ->groupBy('LOCAL.descLocal')
                    ->get();

        return view('welcome', ['personas' => $personas, 'visitas' => $visitas, 'resumen' => $resumen]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
