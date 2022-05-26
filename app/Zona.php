<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'ZONA';
    protected $primaryKey = 'idZona';

    public function local()
    {
        return $this->belongsTo('App\Local', 'idLocal'); 
    }
}
