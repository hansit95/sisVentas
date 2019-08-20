<?php

namespace sisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloFormRequest extends FormRequest
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
            'idcategoria' => 'requered',
            'codigo' => 'requered|max:50',
            'nombre' => 'requered|max:100',
            'stock' => 'requered|numeric',
            'descripcion' => 'requered|max:512',
            'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }
}
