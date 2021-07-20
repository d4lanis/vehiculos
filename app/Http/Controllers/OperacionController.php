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
use App\Models\Modalidad;
use App\Models\TipoUso;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use App\Http\Requests\OperacionRequest;

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
        $items = DB::table('robos')
        ->whereNull('robos.deleted_at')
        ->join('vehiculos','robos.id','=','vehiculos.robo_id')
        ->join('denunciantes','robos.id','=','denunciantes.robo_id')
        ->select('robos.id','robos.dateTime','robos.municipio','vehiculos.modelo','vehiculos.numSerie', 'vehiculos.placa',DB::raw("concat_ws(' ', vehiculos.marca, vehiculos.subMarca) as marca"),DB::raw("concat_ws(' ', denunciantes.nombre, denunciantes.paterno, denunciantes.materno) as nombre"))
        ->get();

        return Datatables::of($items)
                ->addColumn('acciones', function($item){
                    $ver= route('vehiculosRobados.show', $item->id);
                    $editar= route('vehiculosRobados.edit',$item->id);
                    $borrar= route('vehiculosRobados.delete',$item->id);
                    $action_buttons = "
                        <div class='btn-group'>
                            <a href='$ver' class='btn btn-primary fa fa-eye' data-toggle='tooltip' data-placement='bottom' title='Ver'></a>
                            <a href='$editar' class='btn btn-warning fa fa-edit' data-toggle='tooltip' data-placement='bottom' title='Editar'></a>
                            <a href='$borrar' class='btn btn-danger fa fa-trash' data-toggle='tooltip' data-placement='bottom' title='Borrar' onclick=' return confirm(&#39¿Seguro que desea borrar este regitro?&#39) '></a>
                        </div> ";

                return $action_buttons;
                })->make(TRUE);
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
        $data['modalidad'] = Modalidad::all();
        $data['tipoUso'] = TipoUso::all();
        return view('vehiculosRobados.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperacionRequest $request)
    {   
        $data['robo'] = new Robo;
        $data['robo']->dateTime = $request-> date;
        $data['robo']-> entidad_id = $request -> entidad_id;
        $data['robo']-> entidad = $request->entidad;
        $data['robo']-> municipio_id = $request -> municipio_id;
        $data['robo']-> municipio = $request -> municipio;
        $data['robo']-> localidad_id = $request -> localidad_id;
        $data['robo']-> localidad = $request -> localidad;
        $data['robo']-> colonia = $request -> colonia;
        $data['robo']-> calle = $request -> calle;
        $data['robo']-> numExterior = $request -> numExterior;
        $data['robo']-> codigoPostal = $request -> codigoPostal;
        $data['robo']-> tipoLugar_id = $request -> tipoLugar_id;
        $data['robo']-> tipoLugar = $request -> tipoLugar;
        $data['robo']-> descLugar = $request -> descLugar;
        $data['robo']-> delito = $request -> delito;
        $data['robo']-> armaAsociada = $request -> armaAsociada;
        $data['robo']-> agencia_mp= $request-> agencia_mp;
        $data['robo']-> agente_mp= $request-> agente_mp;
        $data['robo']-> dateAveriguacion = $request-> dateAveriguacion;
        $data['robo']-> averiguacion= $request-> averiguacion;
        $data['robo']-> modalidad_id= $request-> modalidad_id;
        $data['robo']-> modalidad= $request-> modalidad;
        //$data['robo']-> estatus_id = $request -> estatus_id;
        //$data['robo']-> estatus = $request-> estatus;
        //$data['robo']-> save();

        $data['vehiculo'] = new Vehiculo;
        $data['vehiculo'] -> marca_id = $request -> marca_id;
        $data['vehiculo'] -> marca = $request -> marca;
        $data['vehiculo'] -> subMarca_id = $request -> subMarca_id;
        $data['vehiculo'] -> subMarca = $request -> subMarca;
        $data['vehiculo'] -> modelo = $request -> modelo;
        $data['vehiculo'] -> color_id = $request -> color_id;
        $data['vehiculo'] -> color = $request -> color;
        $data['vehiculo'] -> numSerie = $request -> numSerie;
        $data['vehiculo'] -> placa = $request -> placa;
        $data['vehiculo'] -> tipoVehiculo_id = $request -> tipoVehiculo_id;
        $data['vehiculo'] -> tipoVehiculo = $request -> tipoVehiculo;
        $data['vehiculo'] -> claseVehiculo_id = $request -> claseVehiculo_id;
        $data['vehiculo'] -> claseVehiculo = $request -> claseVehiculo;
        $data['vehiculo'] -> señas= $request -> señas;
        $data['vehiculo'] -> tipoUso_id = $request -> tipoUso_id;
        $data['vehiculo'] -> tipoUso = $request -> tipoUso;
        $data['vehiculo'] -> procedencia_id = $request -> procedencia_id;
        $data['vehiculo'] -> procedencia = $request -> procedencia;
        $data['vehiculo'] -> aseguradora = $request -> aseguradora;
        $data['vehiculo'] -> robo_id = $data['robo']['id'];
        //$data['vehiculo'] -> save();
        
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
        $data['denunciante'] -> colonia= $request -> coloniaD;
        $data['denunciante'] -> robo_id = $data['robo']['id'];
        //$data['denunciante'] -> save();
        return response()->json($data);
        //return redirect()->route('vehiculosRobados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $robo = Robo::findOrFail($id);
        $robo['dateTime']=date("Y-m-d\TH:i", strtotime($robo['dateTime']));
        $robo['dateAveriguacion']=date("Y-m-d\TH:i", strtotime($robo['dateAveriguacion']));
        $vehiculo = Vehiculo::findOrFail($id);
        $denunciante = Denunciante::findOrFail($id);
        return view('vehiculosRobados.show', compact('robo','vehiculo','denunciante'));
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
        $data['modalidad'] = Modalidad::all();
        $data['tipoUso'] = TipoUso::all();
        $robo = Robo::findOrFail($id);
        $robo['dateTime']=date("Y-m-d\TH:i", strtotime($robo['dateTime']));
        $robo['dateAveriguacion']=date("Y-m-d\TH:i", strtotime($robo['dateAveriguacion']));
        $vehiculo = Vehiculo::findOrFail($id);
        $denunciante = Denunciante::findOrFail($id);
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
        $robo['dateTime']= $request-> date;
        $robo['entidad_id']= $request -> entidad_id;
        $robo['entidad']= $request->entidad;
        $robo['municipio_id']= $request -> municipio_id;
        $robo['municipio']= $request -> municipio;
        $robo['localidad_id']= $request -> localidad_id;
        $robo['localidad']= $request -> localidad;
        $robo['colonia']= $request -> colonia;
        $robo['calle']= $request -> calle;
        $robo['numExterior']= $request -> numExterior;
        $robo['codigoPostal']= $request -> codigoPostal;
        $robo['tipoLugar_id']= $request -> tipoLugar_id;
        $robo['tipoLugar']= $request -> tipoLugar;
        $robo['descLugar']= $request -> descLugar;
        $robo['delito']= $request -> delito;
        $robo['modalidad_id'] = $request -> modalidad_id;
        $robo['modalidad'] = $request -> modalidad;
        $robo['armaAsociada']= $request -> armaAsociada;
        $robo['dateAveriguacion'] = $request -> dateAveriguacion;
        $robo['averiguacion'] = $request -> averiguacion;
        $robo['agencia_mp'] = $request -> agencia_mp;
        $robo['agente_mp'] = $request -> agente_mp;
        //$robo['estatus_id']= $request -> estatus_id;
        //$robo['estatus']= $request-> estatus;
        $vehiculo['marca_id']= $request -> marca_id;
        $vehiculo['marca']= $request -> marca;
        $vehiculo['subMarca_id']= $request -> subMarca_id;
        $vehiculo['subMarca']= $request -> subMarca;
        $vehiculo['modelo']= $request -> modelo;
        $vehiculo['color_id']= $request -> color_id;
        $vehiculo['color']= $request -> color;
        $vehiculo['numSerie']= $request -> numSerie;
        $vehiculo['placa'] = $request -> placa;
        $vehiculo['tipoVehiculo_id']= $request -> tipoVehiculo_id;
        $vehiculo['tipoVehiculo']= $request -> tipoVehiculo;
        $vehiculo['claseVehiculo_id']= $request -> claseVehiculo_id;
        $vehiculo['claseVehiculo']= $request -> claseVehiculo;
        $vehiculo['tipoUso'] = $request -> tipoUso;
        $vehiculo['tipoUso_id'] = $request -> tipoUso_id;
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
        $denunciante['colonia']= $request -> coloniaD;

        
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
    public function destroy($id)
    {
        $data = Robo::find($id);
        $data->delete();
        $data = Vehiculo::find($id);
        $data->delete();
        $data = Denunciante::find($id);
        $data->delete();
        return redirect()->route('vehiculosRobados.index');
    }
}