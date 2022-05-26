<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = 'VISITA';
    protected $primaryKey = 'idVisita';
    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'idPersona'); 
    }
}
