<?php

namespace sisTerminal;

use Illuminate\Database\Eloquent\Model;

class DptoTerminal extends Model
{
    protected $table='dpto_terminal';
    protected $primaryKey='id_destino';
    public $timestamps = false;

    protected $fillable=[
    	'NombreDestino'
    ];

    protected $guarded =[];
}
