<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'marca_id' => 'required|numeric',
            'subMarca_id' => 'required|numeric',
            /*'marca' => 'regex:/^[A-Za-z0-9 ]+$/',
            'subMarca' => 'regex:/^[A-Za-z0-9 \- \. \/]+$/',
            'color' => 'regex:/^[A-Za-z0-9 ]+$/',
            'claseVehiculo' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'tipoVehiculo' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'tipoUso' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'procedencia' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',*/
        ];
    }
}
