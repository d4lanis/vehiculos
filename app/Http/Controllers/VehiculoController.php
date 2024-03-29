<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Submarca;
use App\Models\Colores;
use App\Models\TipoVehiculo;
use App\Models\ClaseVehiculo;
use App\Models\Procedencia;
use App\Models\Robo;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vehiculos'] = Vehiculo::paginate();
        return view('vehiculos.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['marca'] = Marca::all();
        $data['submarca'] = Submarca::all();
        $data['colores'] = Colores::all();
        $data['tipoVehiculo'] = TipoVehiculo::all();
        $data['claseVehiculo'] = ClaseVehiculo::all();
        $data['procedencia'] = Procedencia::all();
        //return response()->json($data);
        return view ('vehiculos.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Vehiculo;
        $data -> marca_id = $request -> marca_id;
        $data -> marca = $request -> marca;
        $data -> subMarca_id = $request -> subMarca_id;
        $data -> subMarca = $request -> subMarca;
        $data -> modelo = $request -> modelo;
        $data -> color_id = $request -> color_id;
        $data -> color = $request -> color;
        $data -> numSerie = $request -> numSerie;
        $data -> tipoVehiculo_id = $request -> tipoVehiculo_id;
        $data -> tipoVehiculo = $request -> tipoVehiculo;
        $data -> claseVehiculo_id = $request -> claseVehiculo_id;
        $data -> claseVehiculo = $request -> claseVehiculo;
        $data -> señas= $request -> señas;
        $data -> procedencia_id = $request -> procedencia_id;
        $data -> procedencia = $request -> procedencia;
        $data -> aseguradora = $request -> aseguradora;
        $robo_id = Robo::latest('id')->first('id');
        $data -> robo_id = $robo_id['id'];
        $data -> save();
        //return response()->json($data);
        return redirect()->route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['marca'] = Marca::all();
        $data['submarca'] = Submarca::all();
        $data['colores'] = Colores::all();
        $data['tipoVehiculo'] = TipoVehiculo::all();
        $data['claseVehiculo'] = ClaseVehiculo::all();
        $data['procedencia'] = Procedencia::all();
        $vehiculo = Vehiculo::findOrFail($id);
        //return response()->json($data);
        return view ('vehiculos.edit', compact('vehiculo','data'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vehiculo)
    {
        $data = $request->except(['_token','_method']);
        Vehiculo::where('id','=',$vehiculo)->update($data);
        $vehiculo= Vehiculo::findOrFail($vehiculo);
        return redirect()->route('vehiculos.index')->withSuccess('Registro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index');
    }
}
