<?php

namespace sisTerminal;

use Illuminate\Database\Eloquent\Model;

class BoletoPasajero extends Model
{
    //
    protected $table='boletos_pasajero';
    protected $primaryKey='id_boleto';
    public $timestamps = false;

    protected $fillable=[
    	'id_viaje',
    	'asiento',
    	'nombrePasajero',
    	'estado',
    	'fecha'
    ];

    protected $guarded =[];
}
