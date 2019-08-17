<?php

namespace sisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
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
    /*Archivo para las validaciones*/
    public function rules()
    {
        return [
            'nombre'=>'required|max:50',//El required es para que el campo sea obligatorio.
            'descripcion'=>'max:256',
        ];
    }
}
