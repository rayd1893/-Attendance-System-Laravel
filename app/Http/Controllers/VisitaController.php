<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visita;
use App\Exports\VisitasExport;
use Maatwebsite\Excel\Facades\Excel;
use File;

class VisitaController extends Controller
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
        $today = date("Y-m-d");

        $findVisita = Visita::where("fechaVisita", ">=", $today)->
                                where("estadoVisita", 1)->
                                where("idPersona", $request->idPersona)->
                                get();
        

        if(count($findVisita)){
            return response()->json([
                'status' => 0,
                'message' => 'La persona ya tiene un registro el día de hoy'
            ]);
        }

        $visita = new Visita;

        $visita->idPersona = $request->idPersona;
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
        $visita = Visita::find($id);
 
        $visita->estadoVisita = 0;
        
        $visita->save();

        return response()->json([
            'status' => 1,
            'message' => 'Asistencia Eliminada'
        ]);

    }

    /**
     * Download report
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function download(Request $request)
     {
        $fecha = $request->fecha;
        $filename = 'visitas_' . date('Ymd', strtotime($fecha)). '.xlsx';
        Excel::store(new VisitasExport(strtotime($fecha)), 'visitas.xlsx');
        File::move(storage_path('app\visitas.xlsx'), public_path('files\\'. $filename));
        return $filename;
     }
}
