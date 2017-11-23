<?php

namespace sisTerminal;

use Illuminate\Database\Eloquent\Model;

class ViajeRuta extends Model
{
    protected $table='viaje_ruta';
    protected $primaryKey='id_viajeRuta';
    public $timestamps = false;

    protected $fillable=[
    	'bus',
    	'conductor',
    	'destino_terminal',
    	'fecha_viaje',
    	'origen',
    	'hora_salida',
    	'hora_llegada',
    	'precio_pasaje',
    	'carril_salida'
    ];

    protected $guarded =[];
}
