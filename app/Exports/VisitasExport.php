<?php

namespace App\Exports;

use App\Visita;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitasExport implements FromQuery, WithMapping, WithHeadings
{

    public function headings(): array
    {
        return [
            'Nombres y Apellidos',
            'Fecha Registro',
            'Hora Registro',
            'Local',
        ];
    }
    
    public function __construct($day)
    {
        $this->day = $day;
    }

    public function query()
    {
        $dayFormat = date('Y-m-d H:i:s',$this->day);
        $afterDay = date('Y-m-d H:i:s', strtotime($dayFormat . ' +1 day' ));
        return Visita::query()->where('fechaVisita', '>=', $dayFormat)->where('fechaVisita', '<', $afterDay)->where('estadoVisita', '=', 1);
    }

    public function map($visita): array
    {
        return [
            $visita->persona->primerNombre . ' ' . $visita->persona->apellidoPaterno . ' ' . $visita->persona->apellidoMaterno . ' ',
            substr($visita->fechaVisita,0, 10),
            substr($visita->fechaVisita,-8),
            $visita->persona->kumite->grupo->han->zona->local->descLocal,
        ];
    }
}
