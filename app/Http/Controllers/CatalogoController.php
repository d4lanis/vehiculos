<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entidad;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Marca;
use App\Models\Submarca;
use App\Models\Lugar;
use App\Models\Modalidad;
use App\Models\Colores;
use App\Models\TipoUso;
use App\Models\Procedencia;
use App\Models\ClaseVehiculo;
use App\Models\TipoVehiculo;
use Yajra\DataTables\DataTables;
use DB;
class CatalogoController extends Controller
{

    public function index()
    {
        return view('admin.vistaCatalogos.index');
    }
 
    public function viewCatalogo($id)
    {
        $data = $id;
        
        if($data == "2" || $data == "3" || $data == "5" || $data == "8")
            return view('admin.vistaCatalogos.child',compact('data'));
        else
            return view('admin.vistaCatalogos.catalogo', compact('data'));
    }

    public function getData($id)
    {
        if ($id == 1)
        {
            $items= Entidad::select('entidad_id as id', 'nombre as name')->get();
            return Datatables::of($items)->toJSON();
        }
        if ($id == 2)
        {
            
            $items= DB::table('municipios')->join('entidades','municipios.entidad_id','=','entidades.entidad_id')->select('municipios.municipio_id as id','municipios.nombre as name',DB::raw("(SELECT entidades.nombre FROM entidades WHERE entidades.entidad_id = municipios.entidad_id) as extra"))->get();
            return Datatables::of($items)->toJSON();
        }
        if($id == 3)
        {
            $items=Localidad::join('entidades','entidades.entidad_id','=','localidades.entidad_id')->select('localidades.localidad_id as id','localidades.nombre as name',DB::raw("(SELECT entidades.nombre FROM entidades WHERE entidades.entidad_id = localidades.entidad_id) as extra"))->get();
            return Datatables::of($items)->toJSON();
        }
        if ($id == 4)
        {
            $items= Marca::select('marca_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->toJSON();
        }
        if($id == 5)
        {
            $items= Submarca::join('marcas','marcas.marca_id','=', 'submarcas.submarca_id')->select('submarcas.submarca_id as id','submarcas.descripcion as name',DB::raw("(SELECT marcas.descripcion FROM marcas WHERE marcas.marca_id = submarcas.marca_id) as extra"))->get();
            return Datatables::of($items)->toJSON();   
        }
        if ($id == 6)
        {
            $items= Colores::select('id as id', 'descripcion as name')->get();
            return Datatables::of($items)->toJSON();

        }
        if ($id == 7)
        {
            $items= ClaseVehiculo::select('clasevehiculo_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->toJSON();

        }
        if ($id == 8)
        {
            $items= DB::table('tipo_vehiculos')->join('clase_vehiculos','tipo_vehiculos.claseVehiculo_id','=','clase_vehiculos.claseVehiculo_id')->select('tipo_vehiculos.tipoVehiculo_id as id','tipo_vehiculos.descripcion as name',DB::raw("(SELECT clase_vehiculos.descripcion FROM clase_vehiculos WHERE clase_vehiculos.claseVehiculo_id = tipo_vehiculos.tipoVehiculo_id) as extra"))->get();
            return Datatables::of($items)->toJSON();
        }
        if ($id == 9)
        {
            $items= TipoUso::select('tipoUso_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->toJSON();

        }
        if ($id == 10)
        {
            $items= Lugar::select('lugar_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->toJSON();

        }
        if ($id == 0)
        {
            $items= Procedencia::select('id as id', 'descripcion as name')->get();
            return Datatables::of($items)->toJSON();

        }
    }
    
    public function getEstados ()
    {
        $data = Entidad::select('entidad_id as id', 'nombre as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getMunicipios ($id)
    {
        $data = Municipio::select('municipio_id as id', 'nombre as name')->where('entidad_id', $id)->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }
    
    public function getPoblaciones ($e_id,$m_id)
    {
        $data = Localidad::select('localidad_id as id', 'nombre as name')->where([['entidad_id','=',$e_id],['municipio_id','=',$m_id]])->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getMarcas ()
    {
        $data = Marca::select('marca_id as id', 'descripcion as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getSubMarcas ($id)
    {
        $data = Submarca::select('subMarca_id as id', 'descripcion as name')->where('marca_id', $id)->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getClaseVehiculos ()
    {
        $data = ClaseVehiculo::select('claseVehiculo_id as id', 'descripcion as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getTipoVehiculos($id)
    {
        $data = TipoVehiculo::select('tipoVehiculo_id as id', 'descripcion as name')->where('claseVehiculo_id', $id)->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getLugares ()
    {
        $data = Lugar::select('lugar_id as id', 'descripcion as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);
        /*$info = json_encode(['status'=>'ok','data'=>$data]);
        return $info;*/
    }

    public function getModalidades ()
    {
        $data = Modalidad::select('modalidad_id as id', 'descripcion as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);   
    }

    public function getColores ()
    {
        $data = Colores::select('id', 'descripcion as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getTipoUsos ()
    {
        $data = TipoUso::select('tipoUso_id as id', 'descripcion as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }

    public function getProcedencias ()
    {
        $data = Procedencia::select('id', 'descripcion as name')->get();
        return response()->json(['status'=>'ok','data'=>$data]);
    }
}
