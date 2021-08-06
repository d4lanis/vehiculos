<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DenuncianteRequest extends FormRequest
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
            'email' => 'nullable|email',
            'telefono' => 'nullable|numeric',
            'numExteriorD' => 'nullable|numeric',
            'numInteriorD' => 'nullable|numeric',
            'codigoPostalD' => 'nullable|numeric',
            /*'entidadD' => 'regex:/^[A-Za-z0-9 ]+$/',
            'municipioD' => 'regex:/^[A-Za-z0-9 ]+$/',*/
        ];
    }
}
