<?php

namespace App\Http\Controllers;

use App\Models\Operacion;
use App\Models\Entidad;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Lugar;
use App\Models\Estatus;
use App\Models\Marca;
use App\Models\Submarca;
use App\Models\Colores;
use App\Models\TipoVehiculo;
use App\Models\ClaseVehiculo;
use App\Models\Procedencia;
use App\Models\Robo;
use App\Models\Vehiculo;
use App\Models\Denunciante;
use Illuminate\Http\Request;

class OperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['robos']=Robo::paginate();
        $data['vehiculos']=Vehiculo::paginate();
        $data['denunciantes']=Denunciante::paginate();
        return view('index',compact('data'));
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
        $data['lugar'] = Lugar::all();
        $data['estatus']= Estatus::all();
        $data['localidad'] = Localidad::all();
        $data['marca'] = Marca::all();
        $data['submarca'] = Submarca::all();
        $data['colores'] = Colores::all();
        $data['tipoVehiculo'] = TipoVehiculo::all();
        $data['claseVehiculo'] = ClaseVehiculo::all();
        $data['procedencia'] = Procedencia::all();
        return view('create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data['robo'] = new Robo;
        $hora = $request -> hora;
        $fecha= $request -> fecha;
        $dateTime = $fecha.' '.$hora;
        $data['robo']-> dateTime = $dateTime;
        $data['robo']-> entidad_id = $request -> entidad_id;
        $data['robo']-> entidad = $request->entidad;
        $data['robo']-> municipio_id = $request -> municipio_id;
        $data['robo']-> municipio = $request -> municipio;
        $data['robo']-> localidad_id = $request -> localidad_id;
        $data['robo']-> localidad = $request -> localidad;
        $data['robo']-> calle = $request -> calle;
        $data['robo']-> numExterior = $request -> numExterior;
        $data['robo']-> codigoPostal = $request -> codigoPostal;
        $data['robo']-> tipoLugar_id = $request -> tipoLugar_id;
        $data['robo']-> tipoLugar = $request -> tipoLugar;
        $data['robo']-> descLugar = $request -> descLugar;
        $data['robo']-> delito = $request -> delito;
        $data['robo']-> armaAsociada = $request -> armaAsociada;
        $data['robo']-> estatus_id = $request -> estatus_id;
        $data['robo']-> estatus = $request-> estatus;
        $data['robo']-> save();
        $data['vehiculo'] = new Vehiculo;
        $data['vehiculo'] -> marca_id = $request -> marca_id;
        $data['vehiculo'] -> marca = $request -> marca;
        $data['vehiculo'] -> subMarca_id = $request -> subMarca_id;
        $data['vehiculo'] -> subMarca = $request -> subMarca;
        $data['vehiculo'] -> modelo = $request -> modelo;
        $data['vehiculo'] -> color_id = $request -> color_id;
        $data['vehiculo'] -> color = $request -> color;
        $data['vehiculo'] -> numSerie = $request -> numSerie;
        $data['vehiculo'] -> tipoVehiculo_id = $request -> tipoVehiculo_id;
        $data['vehiculo'] -> tipoVehiculo = $request -> tipoVehiculo;
        $data['vehiculo'] -> claseVehiculo_id = $request -> claseVehiculo_id;
        $data['vehiculo'] -> claseVehiculo = $request -> claseVehiculo;
        $data['vehiculo'] -> señas= $request -> señas;
        $data['vehiculo'] -> procedencia_id = $request -> procedencia_id;
        $data['vehiculo'] -> procedencia = $request -> procedencia;
        $data['vehiculo'] -> aseguradora = $request -> aseguradora;
        $data['vehiculo'] -> robo_id = $data['robo']['id'];
        $data['vehiculo'] -> save();
        $data['denunciante'] = new Denunciante;
        $data['denunciante'] -> nombre = $request -> nombre;
        $data['denunciante'] -> paterno = $request -> paterno;
        $data['denunciante'] -> materno = $request -> materno;
        $data['denunciante'] -> rfc = $request -> rfc;
        $data['denunciante'] -> curp= $request -> curp;
        $data['denunciante'] -> licencia= $request -> licencia;
        $data['denunciante'] -> pasaporte= $request -> pasaporte;
        $data['denunciante'] -> telefono= $request -> telefono;
        $data['denunciante'] -> correo= $request -> correo;
        $data['denunciante'] -> domicilio= $request -> domicilio;
        $data['denunciante'] -> numExterior = $request -> numExterior;
        $data['denunciante'] -> numInterior = $request -> numInterior;
        $data['denunciante'] -> codigoPostal = $request -> codigoPostal;
        $data['denunciante'] -> entidad_id = $request -> entidad_idD;
        $data['denunciante'] -> entidad= $request -> entidadD;
        $data['denunciante'] -> municipio_id= $request -> municipio_idD;
        $data['denunciante'] -> municipio= $request -> municipioD;
        $data['denunciante'] -> colonia= $request -> colonia;
        $data['denunciante'] -> robo_id = $data['robo']['id'];
        $data['denunciante'] -> save();
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function show(Operacion $operacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['entidad'] = Entidad::all();
        $data['municipio'] = Municipio::all();
        $data['lugar'] = Lugar::all();
        $data['estatus']= Estatus::all();
        $data['localidad'] = Localidad::all();
        $data['marca'] = Marca::all();
        $data['submarca'] = Submarca::all();
        $data['colores'] = Colores::all();
        $data['tipoVehiculo'] = TipoVehiculo::all();
        $data['claseVehiculo'] = ClaseVehiculo::all();
        $data['procedencia'] = Procedencia::all();
        $robo = Robo::findOrFail($id);
        $date = strtotime($robo-> dateTime);
        $hora = date('H:i', $date);
        $fecha= date('Y-m-d',$date);        
        $robo->hora = $hora;
        $robo->fecha= $fecha;
        $vehiculo = Vehiculo::findOrFail($id);
        $denunciante = Denunciante::findOrFail($id);
        return view('edit', compact('robo','vehiculo','denunciante','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacion $operacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operacion $operacion)
    {
        //
    }
}
