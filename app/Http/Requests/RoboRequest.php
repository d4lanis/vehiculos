<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoboRequest extends FormRequest
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
            'date' => 'required|before_or_equal:dateAveriguacion',
            'dateAveriguacion' => 'required',
            'numExterior' => 'nullable|numeric',
            'codigoPostal' => 'nullable|numeric',
            'averiguacion' => 'nullable',
            /*'entidad' => 'regex:/^[A-Za-z0-9 ]+$/',
            'municipio' => 'regex:/^[A-Za-z0-9 ]+$/',
            'localidad' => 'regex:/^[A-Za-z0-9 ]+$/',
            'tipoLugar' => 'regex:/^[A-Za-z0-9 ]+$/',
            'modalidad' => 'regex:/^[A-Za-z0-9 ]+$/',*/
        ];
    }
}
