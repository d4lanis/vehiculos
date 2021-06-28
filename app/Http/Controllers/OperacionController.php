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
use DB;

class OperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['robos'] = Robo::all();
        $data['vehiculos']=Vehiculo::all();
        $data['denunciantes']=Denunciante::all();
        return view('vehiculosRobados.index', compact('data'));
    }

    public function fillIndexTable()
    {
        /*$data['robos'] = Robo::select('id','dateTime','entidad');
        $data['vehiculos']=Vehiculo::all();
        $data['denunciantes']=Denunciante::all();
        return datatables()->collection($data['robos'],$data['vehiculos'])->toJson();*/
        $query = DB::table('robos')
        ->join('vehiculos','robos.id','=','vehiculos.robo_id')
        ->join('denunciantes','robos.id','=','denunciantes.robo_id')
        ->select('robos.id','robos.dateTime','robos.calle','robos.numExterior','robos.localidad','robos.municipio','robos.entidad','robos.codigoPostal','robos.tipoLugar','robos.descLugar','robos.armaAsociada','robos.estatus','vehiculos.marca','vehiculos.subMarca','vehiculos.modelo','vehiculos.color','vehiculos.numSerie','vehiculos.tipoVehiculo','vehiculos.claseVehiculo','vehiculos.señas','vehiculos.procedencia','vehiculos.aseguradora','vehiculos.aseguradora','denunciantes.nombre','denunciantes.paterno','denunciantes.materno','denunciantes.rfc','denunciantes.curp','denunciantes.licencia','denunciantes.pasaporte','denunciantes.telefono','denunciantes.correo','denunciantes.domicilio','denunciantes.numExterior','denunciantes.numInterior','denunciantes.colonia','denunciantes.codigoPostal','denunciantes.entidad','denunciantes.municipio')
        ->get();
        return datatables()->of($query)->toJson();
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
        return view('vehiculosRobados.create',compact('data'));
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

        if(is_null($hora) && is_null($fecha))
        {
            $data['robo']-> dateTime = null;
        }
        elseif(is_null($hora) && !is_null($fecha))
        {
            $data['robo']-> dateTime = $fecha;
        }
        elseif(!is_null($hora) && is_null($fecha))
        {
            $data['robo']-> dateTime = '0000-00-00'.' '.$hora;
        }
        else
        {
            $data['robo']-> dateTime = $fecha.' '.$hora;
        }
        
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
        $data['denunciante'] -> numExterior = $request -> numExteriorD;
        $data['denunciante'] -> numInterior = $request -> numInteriorD;
        $data['denunciante'] -> codigoPostal = $request -> codigoPostalD;
        $data['denunciante'] -> entidad_id = $request -> entidad_idD;
        $data['denunciante'] -> entidad= $request -> entidadD;
        $data['denunciante'] -> municipio_id= $request -> municipio_idD;
        $data['denunciante'] -> municipio= $request -> municipioD;
        $data['denunciante'] -> colonia= $request -> colonia;
        $data['denunciante'] -> robo_id = $data['robo']['id'];
        $data['denunciante'] -> save();
        return redirect()->route('vehiculosRobados.index');
        //return response()->json($data);
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
        $denunciante = Denunciante::findOrFail($id);;
        return view('vehiculosRobados.edit', compact('robo','vehiculo','denunciante','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $robo['hora']= $request -> hora;
        $robo['fecha']= $request -> fecha;
        $dateTime = $robo['fecha'].' '.$robo['hora'].':00';
        unset($robo['fecha'],$robo['hora']);
        $robo['dateTime']= $dateTime;
        $robo['entidad_id']= $request -> entidad_id;
        $robo['entidad']= $request->entidad;
        $robo['municipio_id']= $request -> municipio_id;
        $robo['municipio']= $request -> municipio;
        $robo['localidad_id']= $request -> localidad_id;
        $robo['localidad']= $request -> localidad;
        $robo['calle']= $request -> calle;
        $robo['numExterior']= $request -> numExterior;
        $robo['codigoPostal']= $request -> codigoPostal;
        $robo['tipoLugar_id']= $request -> tipoLugar_id;
        $robo['tipoLugar']= $request -> tipoLugar;
        $robo['descLugar']= $request -> descLugar;
        $robo['delito']= $request -> delito;
        $robo['armaAsociada']= $request -> armaAsociada;
        $robo['estatus_id']= $request -> estatus_id;
        $robo['estatus']= $request-> estatus;
        $vehiculo['marca_id']= $request -> marca_id;
        $vehiculo['marca']= $request -> marca;
        $vehiculo['subMarca_id']= $request -> subMarca_id;
        $vehiculo['subMarca']= $request -> subMarca;
        $vehiculo['modelo']= $request -> modelo;
        $vehiculo['color_id']= $request -> color_id;
        $vehiculo['color']= $request -> color;
        $vehiculo['numSerie']= $request -> numSerie;
        $vehiculo['tipoVehiculo_id']= $request -> tipoVehiculo_id;
        $vehiculo['tipoVehiculo']= $request -> tipoVehiculo;
        $vehiculo['claseVehiculo_id']= $request -> claseVehiculo_id;
        $vehiculo['claseVehiculo']= $request -> claseVehiculo;
        $vehiculo['señas']= $request -> señas;
        $vehiculo['procedencia_id']= $request -> procedencia_id;
        $vehiculo['procedencia']= $request -> procedencia;
        $vehiculo['aseguradora']= $request -> aseguradora;
        $denunciante['nombre']= $request -> nombre;
        $denunciante['paterno']= $request -> paterno;
        $denunciante['materno']= $request -> materno;
        $denunciante['rfc']= $request -> rfc;
        $denunciante['curp']= $request -> curp;
        $denunciante['licencia']= $request -> licencia;
        $denunciante['pasaporte']= $request -> pasaporte;
        $denunciante['telefono']= $request -> telefono;
        $denunciante['correo']= $request -> correo;
        $denunciante['domicilio']= $request -> domicilio;
        $denunciante['numExterior']= $request -> numExteriorD;
        $denunciante['numInterior']= $request -> numInteriorD;
        $denunciante['codigoPostal']= $request -> codigoPostalD;
        $denunciante['entidad_id']= $request -> entidad_idD;
        $denunciante['entidad']= $request -> entidadD;
        $denunciante['municipio_id']= $request -> municipio_idD;
        $denunciante['municipio']= $request -> municipioD;
        $denunciante['colonia']= $request -> colonia;

        
        Robo::where('id','=',$id)->update($robo);
        Vehiculo::where('id','=',$id)->update($vehiculo);
        Denunciante::where('id','=',$id)->update($denunciante);
        return redirect()->route('vehiculosRobados.index');
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
