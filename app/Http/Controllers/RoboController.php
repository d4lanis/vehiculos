<?php

namespace App\Http\Controllers;

use App\Models\Robo;
use App\Models\Entidad;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Lugar;
use App\Models\Estatus;
use Illuminate\Http\Request;

class RoboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['robos'] = Robo::paginate();
        return view('robos.index',$data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['entidad'] = Entidad::all();
        $data['municipio'] = Municipio::all();
        $data['lugar'] = Lugar::all();
        $data['estatus']= Estatus::all();
        $data['localidad'] = Localidad::all();
        return view('robos.create',compact('data'));
    }

    public function getMunicipio(Request $request)
    {
        $data = Municipio::select('municipio_id','nombre')
                            ->where('entidad_id', $request['id'])
                            ->get();

        $result = '<option value="">--Selecciona el municipio--</option>';

        for ($i=0; $i < sizeof($data); $i++) {
            $result.='<option value="'.$data[$i]['municipio_id'].'">'.$data[$i]['nombre'].'</option>'; 
       }

        return response()->json($result);
    }

    public function getLocalidad(Request $request)
    {
        $data = Localidad::select('localidad_id','nombre')
                            ->where('municipio_id', $request['id'])
                            ->get();

        $result = '<option value="">--Selecciona la localidad--</option>';

        for ($i=0; $i < sizeof($data); $i++) {
            $result.='<option value="'.$data[$i]['localidad_id'].'">'.$data[$i]['nombre'].'</option>'; 
       }

        return response()->json($result);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new Robo;
        $hora = $request -> hora;
        $fecha= $request -> fecha;
        $dateTime = $fecha.' '.$hora;
        $data-> dateTime = $dateTime;
        $data-> entidad_id = $request -> entidad_id;
        $data-> entidad = $request->entidad;
        $data-> municipio_id = $request -> municipio_id;
        $data-> municipio = $request -> municipio;
        $data-> localidad_id = $request -> localidad_id;
        $data-> localidad = $request -> localidad;
        $data-> calle = $request -> calle;
        $data-> numExterior = $request -> numExterior;
        $data-> codigoPostal = $request -> codigoPostal;
        $data-> tipoLugar_id = $request -> tipoLugar_id;
        $data-> tipoLugar = $request -> tipoLugar;
        $data-> descLugar = $request -> descLugar;
        $data-> delito = $request -> delito;
        $data-> armaAsociada = $request -> armaAsociada;
        $data-> estatus_id = $request -> estatus_id;
        $data-> estatus = $request-> estatus;
        $data->save();
        return redirect()->route('robos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Robo  $robo
     * @return \Illuminate\Http\Response
     */
    public function show(Robo $robo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Robo  $robo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['entidad'] = Entidad::all();
        $data['municipio'] = Municipio::all();
        $data['lugar'] = Lugar::all();
        $data['estatus']= Estatus::all();
        $data['localidad'] = Localidad::all();
        $robo = Robo::findOrFail($id);
        $date = strtotime($robo-> dateTime);
        $hora = date('H:i', $date);
        $fecha= date('Y-m-d',$date);
        
        $robo->hora = $hora;
        $robo->fecha= $fecha;
        //return response()->json($robo);
        return view('robos.edit', compact('robo','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Robo  $robo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $robo)
    {
        
        $data = $request->except(['_token','_method']);
        $dateTime = $data['fecha'].' '.$data['hora'].':00';
        $data['dateTime'] = $dateTime;
        unset($data['fecha'],$data['hora']);
        Robo::where('id','=',$robo)->update($data);
        $robo= Robo::findOrFail($robo);
        return redirect()->route('robos.index')->withSuccess('Registro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Robo  $robo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Robo $robo)
    {
        //
        $robo->delete();
        return redirect()->route('robos.index')->withSuccess('Registro Borrado');
    }
}
