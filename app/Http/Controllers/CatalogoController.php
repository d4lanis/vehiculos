<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entidad;
use App\Models\Municipio;
use App\Models\Localidad;

class CatalogoController extends Controller
{
    public function getMunicipio(Request $request)
    {
        $data = Municipio::select('municipio_id','nombre')->where('entidad_id', $request['id'])->get();

        $result = '<option value="">--Selecciona el municipio--</option>';

        for ($i=0; $i < sizeof($data); $i++) {
            $result.='<option value="'.$data[$i]['municipio_id'].'">'.$data[$i]['nombre'].'</option>'; 
       }

        return response()->json($result);
    }

    public function getLocalidad(Request $request)
    {
        $data = Localidad::select('localidad_id','nombre')->where('municipio_id', $request['id'])->get();

        $result = '<option value="">--Selecciona la localidad--</option>';

        for ($i=0; $i < sizeof($data); $i++) {
            $result.='<option value="'.$data[$i]['localidad_id'].'">'.$data[$i]['nombre'].'</option>'; 
       }

        return response()->json($result);
    }
}
