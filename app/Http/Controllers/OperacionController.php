<?php

namespace App\Http\Controllers;

use App\Models\Operacion;
use App\Models\Robo;
use App\Models\Vehiculo;
use App\Models\Denunciante;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use App\Http\Requests\OperacionRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class OperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use AuthenticatesUsers;

    public function __construct()
    {
      $this->middleware('can:vehiculos_robados.index')->only('index');
      $this->middleware('can:vehiculos_robados.create')->only('create','store');
      $this->middleware('can:vehiculos_robados.edit')->only('edit','update');
      $this->middleware('can:vehiculos_robados.show')->only('show');
      $this->middleware('can:vehiculos_robados.destroy')->only('destroy');
    }

    //metodo index retorno la vista de html de vehiculos robados
    public function index()
    {
      if (auth()->user()->hasRole('Admin')){
        return view('admin.vehiculosRobados.index');
      }
      else{
        return view('vehiculosRobados.index');
      }
    }

    /*
        metodo auxiliar al index
        se hace la consulta a la bd y se seleccionan los campos
        basico de un registro de vehiculo robado se le da formato de
        datatable (JSON) y se guarda en la variable items, una vez generado
        el datatable se le agrega una columna con los botones de las acciones,
        se accede a este metodo por una peticion ajax desde la vista index.
    */
    public function fillIndexTable()
    {
        /*$items = DB::table('robos')
        ->whereNull('robos.deleted_at')
        ->join('vehiculos','robos.id','=','vehiculos.robo_id')
        ->join('denunciantes','robos.id','=','denunciantes.robo_id')
        ->select('robos.id','robos.dateAveriguacion','robos.municipio','vehiculos.modelo','vehiculos.numSerie', 'vehiculos.placa',DB::raw("concat_ws(' ', vehiculos.marca, vehiculos.subMarca) as marca"),DB::raw("concat_ws(' ', denunciantes.nombre, denunciantes.paterno, denunciantes.materno) as nombre"))
        ->get();*/

        $items = DB::table('robos')
        ->whereNull('robos.deleted_at')
        ->join('vehiculos','robos.id','=','vehiculos.robo_id')
        ->join('denunciantes','robos.id','=','denunciantes.robo_id')
        ->select('robos.id','robos.dateAveriguacion',DB::raw("(SELECT municipios.nombre FROM municipios WHERE municipios.entidad_id = robos.entidad_id and municipios.municipio_id = robos.municipio_id) as municipio"),'vehiculos.modelo','vehiculos.numSerie', 'vehiculos.placa',DB::raw("concat_ws(' ', (SELECT marcas.descripcion FROM marcas WHERE marcas.marca_id = vehiculos.marca_id), (SELECT submarcas.descripcion FROM submarcas WHERE submarcas.marca_id = vehiculos.marca_id and submarcas.subMarca_id = vehiculos.subMarca_id)) as marca"),DB::raw("concat_ws(' ', denunciantes.nombre, denunciantes.paterno, denunciantes.materno) as nombre"))
        ->get();

        return Datatables::of($items)
                ->addColumn('acciones', function($item){
                    $ver= route('vehiculos_robados.show', $item->id);
                    $editar= route('vehiculos_robados.edit',$item->id);
                    $borrar= route('vehiculos_robados.destroy',$item->id);
                    $action_buttons = "
                        <div class='btn-group'>
                            <a href='$ver' class='btn btn-primary fa fa-eye' data-toggle='tooltip' data-placement='bottom' title='Ver'></a>
                            <a href='$editar' class='btn btn-warning fa fa-edit' data-toggle='tooltip' data-placement='bottom' title='Editar'></a>
                        </div> ";
                        //<a href='$borrar' class='btn btn-danger fa fa-trash' data-toggle='tooltip' data-placement='bottom' title='Borrar' onclick=' return confirm(&#39¿Seguro que desea borrar este regitro?&#39) '></a>
                return $action_buttons;
                })->make(TRUE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*este metodo te envia a la vista de html que contiene el formulario para ingreso
      de registro de vehiculo robado*/
    public function create()
    {
      if (auth()->user()->hasRole('Admin')){
        return view('admin.vehiculosRobados.create');
      }
      else{
        return view('vehiculosRobados.create');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /*
      este metodo le hace un request a los campos del formulario,
      uno por uno y se guardan en un arreglo segun la informacion
      de cada formulario (robo,vehiculo,denunciante) y guarda cada posicion
      del arreglo en la tabla correspondiente al terminar de guardar te redirige
      al index nota: contiene form request si no pasa las validaciones se regresara
      a la form de create hasta que se introduzcan los datos correctos
    */
    public function store(OperacionRequest $request)
    {   
        $data['robo'] = new Robo;
        $data['robo']->dateTime = $request-> date;
        $data['robo']-> entidad_id = $request -> entidad_id;
        $data['robo']-> municipio_id = $request -> municipio_id;
        $data['robo']-> localidad_id = $request -> localidad_id;
        $data['robo']-> colonia = $request -> colonia;
        $data['robo']-> calle = $request -> calle;
        $data['robo']-> numExterior = $request -> numExterior;
        $data['robo']-> codigoPostal = $request -> codigoPostal;
        $data['robo']-> tipoLugar_id = $request -> tipoLugar_id;
        $data['robo']-> descLugar = $request -> descLugar;
        $data['robo']-> delito = $request -> delito;
        $data['robo']-> armaAsociada = $request -> armaAsociada;
        $data['robo']-> agencia_mp= $request-> agencia_mp;
        $data['robo']-> agente_mp= $request-> agente_mp;
        $data['robo']-> dateAveriguacion = $request-> dateAveriguacion;
        $data['robo']-> averiguacion= $request-> averiguacion;
        $data['robo']-> modalidad_id= $request-> modalidad_id;
        //$robo['estatus_id']= $request -> estatus_id;
        $data['robo']->user_id = Auth::id();
        $data['robo']-> save();

        $data['vehiculo'] = new Vehiculo;
        $data['vehiculo'] -> marca_id = $request -> marca_id;
        $data['vehiculo'] -> subMarca_id = $request -> subMarca_id;
        $data['vehiculo'] -> modelo = $request -> modelo;
        $data['vehiculo'] -> color_id = $request -> color_id;
        $data['vehiculo'] -> numSerie = $request -> numSerie;
        $data['vehiculo'] -> placa = $request -> placa;
        $data['vehiculo'] -> tipoVehiculo_id = $request -> tipoVehiculo_id;
        $data['vehiculo'] -> claseVehiculo_id = $request -> claseVehiculo_id;
        $data['vehiculo'] -> señas= $request -> señas;
        $data['vehiculo'] -> tipoUso_id = $request -> tipoUso_id;
        $data['vehiculo'] -> procedencia_id = $request -> procedencia_id;
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
        $data['denunciante'] -> municipio_id= $request -> municipio_idD;
        $data['denunciante'] -> colonia= $request -> coloniaD;
        $data['denunciante'] -> robo_id = $data['robo']['id'];
        $data['denunciante'] -> save();
        return redirect()->route('vehiculos_robados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */

    /*
      el acceso a este metodo es desde el boton de ver en el index, se envia
      el id del registro que se desea ver toda la informacion capturada,
      con el id se busca en las tablas de robos,vehiculos y denunciantes, si
      se encuentra se hace procesamiento del formato de los datos de fecha a otro
      legible por los input datetime-local y se guardan en las variables robo, vehiculo
      y denunciante y se envian a la vista de html de ver(show)
    */
    public function show($id)
    {
        $robo = Robo::findOrFail($id);
        $robo['dateTime']=date("Y-m-d\TH:i", strtotime($robo['dateTime']));
        $robo['dateAveriguacion']=date("Y-m-d\TH:i", strtotime($robo['dateAveriguacion']));
        $vehiculo = Vehiculo::findOrFail($id);
        $denunciante = Denunciante::findOrFail($id);
        if (auth()->user()->hasRole('Admin')){
          return view('admin.vehiculosRobados.show', compact('robo','vehiculo','denunciante'));
        }
        else{
          return view('vehiculosRobados.show', compact('robo','vehiculo','denunciante'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */

     /*
       se accede a este metodo desde el index con elboton de editar
       se envia el id, si encuentra el id en las tablas se procesa 
       el formato de los campos de fecha para los input de datetime-local
       se guardan los datos en variables robo,vehiculo,denunciante y se envian
       a la vista del formulario edit
     */
    public function edit($id)
    {
        $robo = Robo::findOrFail($id);
        $robo['dateTime']=date("Y-m-d\TH:i", strtotime($robo['dateTime']));
        $robo['dateAveriguacion']=date("Y-m-d\TH:i", strtotime($robo['dateAveriguacion']));
        $vehiculo = Vehiculo::findOrFail($id);
        $denunciante = Denunciante::findOrFail($id);
        if (auth()->user()->hasRole('Admin')){
          return view('admin.vehiculosRobados.edit', compact('robo','vehiculo','denunciante'));
        }
        else{
          return view('vehiculosRobados.edit', compact('robo','vehiculo','denunciante'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */

    /*
      al escribir los cambios en la form de edit se realizan request de todos los
      campos, se hacen las respectivas validaciones y si todo esta correcto
      se guardan en variables robo, vehiculo, denunciante y se guardan si el id concide
      con la base de datos y al guardarse exitosamente se redirige al index
    */
    public function update(OperacionRequest $request, $id)
    {
        $robo['dateTime']= $request-> date;
        $robo['entidad_id']= $request -> entidad_id;
        $robo['municipio_id']= $request -> municipio_id;
        $robo['localidad_id']= $request -> localidad_id;
        $robo['colonia']= $request -> colonia;
        $robo['calle']= $request -> calle;
        $robo['numExterior']= $request -> numExterior;
        $robo['codigoPostal']= $request -> codigoPostal;
        $robo['tipoLugar_id']= $request -> tipoLugar_id;
        $robo['descLugar']= $request -> descLugar;
        $robo['delito']= $request -> delito;
        $robo['modalidad_id'] = $request -> modalidad_id;
        $robo['armaAsociada']= $request -> armaAsociada;
        $robo['dateAveriguacion'] = $request -> dateAveriguacion;
        $robo['averiguacion'] = $request -> averiguacion;
        $robo['agencia_mp'] = $request -> agencia_mp;
        $robo['agente_mp'] = $request -> agente_mp;
        //$robo['estatus_id']= $request -> estatus_id;
        $robo['user_id'] = Auth::id();
        $vehiculo['marca_id']= $request -> marca_id;
        $vehiculo['subMarca_id']= $request -> subMarca_id;
        $vehiculo['modelo']= $request -> modelo;
        $vehiculo['color_id']= $request -> color_id;
        $vehiculo['numSerie']= $request -> numSerie;
        $vehiculo['placa'] = $request -> placa;
        $vehiculo['tipoVehiculo_id']= $request -> tipoVehiculo_id;
        $vehiculo['claseVehiculo_id']= $request -> claseVehiculo_id;
        $vehiculo['tipoUso_id'] = $request -> tipoUso_id;
        $vehiculo['señas']= $request -> señas;
        $vehiculo['procedencia_id']= $request -> procedencia_id;
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
        $denunciante['municipio_id']= $request -> municipio_idD;
        $denunciante['colonia']= $request -> coloniaD;
        Robo::where('id','=',$id)->update($robo);
        Vehiculo::where('id','=',$id)->update($vehiculo);
        Denunciante::where('id','=',$id)->update($denunciante);
        return redirect()->route('vehiculos_robados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */

    /*
      se acciona desde la vista del index, se envia el id del registro que se quiere 
      eliminar, si se encuentra el id en las tablas de robos, vehiculos y denunciantes
      se modifica el campo deleted_at, si laravel detecta con valor no nulo este campo
      no se mostrara el registro
    */
    public function destroy($id)
    {
        $data = Robo::find($id);
        $data->delete();
        $data = Vehiculo::find($id);
        $data->delete();
        $data = Denunciante::find($id);
        $data->delete();
        return redirect()->route('vehiculos_robados.index');
    }
}