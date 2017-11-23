<?php

namespace sisTerminal;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table='conductores';
    protected $primaryKey='id_conductor';
    public $timestamps = false;

    protected $fillable=[
    	'nombre',
    	'telefono',
    	'salario'
    ];

    protected $guarded =[];
}
