<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\RoboRequest;
use App\Http\Requests\VehiculoRequest;
use App\Http\Requests\DenuncianteRequest;

class OperacionRequest extends FormRequest
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
        $formRequests = [
            RoboRequest::class,
            VehiculoRequest::class,
            DenuncianteRequest::class,
        ];

        $rules = [];

        foreach($formRequests as $source)
        {
            $rules = array_merge(
                $rules,(new $source) -> rules()
            );
        }
        return $rules;
    }
}
