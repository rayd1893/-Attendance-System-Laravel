<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kumite extends Model
{
    protected $table = 'KUMITE';
    protected $primaryKey = 'idKumite';
    public $timestamps = false;

    public function grupo()
    {
        return $this->belongsTo('App\Grupo', 'idGrupo'); 
    }
}
