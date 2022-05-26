<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Visitante extends Model
{
    protected $table = 'VISITANTE';
    protected $primaryKey = 'idVisitante';
    public $timestamps = false;
}
