<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'PERSONA';
    protected $primaryKey = 'idPersona';
    public $timestamps = false;

    public function kumite()
    {
        return $this->hasOne('App\Kumite', 'idPersona');
    }
}
