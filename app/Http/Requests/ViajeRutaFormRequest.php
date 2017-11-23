<?php

namespace sisTerminal\Http\Requests;

use sisTerminal\Http\Requests\Request;

class ViajeRutaFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'viajebus'=>'required',
            'viajeconductor'=>'required',
            'destino_terminal'=>'required',
            'fecha_viaje',
            'origen',
            'hora_salida',
            'hora_llegada',
            'precio_pasaje',
            'carril_salida',
        ];
    }
}
