<?php

namespace App\Http\Controllers;

use App\Models\Denunciante;
use App\Models\Entidad;
use App\Models\Municipio;
use App\Models\Robo;
use Illuminate\Http\Request;

class DenuncianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['denunciantes'] = Denunciante::paginate();
        return view('denunciantes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['entidad'] = Entidad::all();
        $data['municipio'] = Municipio::all();
        return view('denunciantes.create', compact('data')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Denunciante;
        $data -> nombre = $request -> nombre;
        $data -> paterno = $request -> paterno;
        $data -> materno = $request -> materno;
        $data -> rfc = $request -> rfc;
        $data -> curp= $request -> curp;
        $data -> licencia= $request -> licencia;
        $data -> pasaporte= $request -> pasaporte;
        $data -> telefono= $request -> telefono;
        $data -> correo= $request -> correo;
        $data -> domicilio= $request -> domicilio;
        $data -> numExterior = $request -> numExterior;
        $data -> numInterior = $request -> numInterior;
        $data -> codigoPostal = $request -> codigoPostal;
        $data -> entidad_id = $request -> entidad_id;
        $data -> entidad= $request -> entidad;
        $data -> municipio_id= $request -> municipio_id;
        $data -> municipio= $request -> municipio;
        $data -> colonia= $request -> colonia;
        $robo_id = Robo::latest('id')->first('id');
        $data -> robo_id = $robo_id['id'];
        $data -> save();

        //return response()->json($data);
        return redirect()-> route('denunciantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function show(Denunciante $denunciante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['entidad'] = Entidad::all();
        $data['municipio'] = Municipio::all();
        $denunciante = Denunciante::findOrFail($id);
        return view ('denunciantes.edit', compact('data','denunciante')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $denunciante)
    {
        $data = $request->except(['_token','_method']);
        Denunciante::where('id','=',$denunciante)->update($data);
        $denunciante= Denunciante::findOrFail($denunciante);
        return redirect()->route('denunciantes.index')->withSuccess('Registro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denunciante $denunciante)
    {
        $denunciante->delete();
        return redirect()->route('denunciantes.index');
    }
}
