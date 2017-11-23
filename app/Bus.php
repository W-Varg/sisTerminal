<?php

namespace sisTerminal;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    //
    protected $table='buses';
    protected $primaryKey='id';
    public $timestamps = false;

    protected $fillable=[
    	'placa',
    	'tipoBus',
    	'plazas',
    	'estado'
    ];

    protected $guarded =[];
}
