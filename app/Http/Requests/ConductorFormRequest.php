<?php

namespace sisTerminal\Http\Requests;

use sisTerminal\Http\Requests\Request;

class ConductorFormRequest extends Request
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
            'nombre'=>'required|max:50',
            'telefono'=>'required',
            'salario'=>'required',
        ];
    }
}
