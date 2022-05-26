<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'GRUPO';
    protected $primaryKey = 'idGrupo';

    public function han()
    {
        return $this->belongsTo('App\Han', 'idHan'); 
    }
}
