<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Han extends Model
{
    protected $table = 'HAN';
    protected $primaryKey = 'idHan';

    public function zona()
    {
        return $this->belongsTo('App\Zona', 'idZona'); 
    }
}
