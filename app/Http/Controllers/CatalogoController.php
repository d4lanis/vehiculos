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
class CatalogoController extends Controller
{

    public function index()
    {
        return view('vistaCatalogos.index');
    }
 
    public function viewCatalogo($id)
    {
        $data = $id;
        return view('vistaCatalogos.catalogo', compact('data'));
    }

    public function getData($id)
    {
        if ($id == 1)
        {
            $items= Entidad::select('entidad_id as id', 'nombre as name')->get();
            return Datatables::of($items)->addColumn('acciones', function($item){$route="/get_municipios/".$item->id;$action_buttons ="<div class='btn-group'><a href='$route' class='btn btn-primary'>Ver</a></div>"; return $action_buttons;})->make(TRUE);
        }
        if ($id == 2)
        {
            $items= Marca::select('marca_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->addColumn('acciones', function($item){$route="/get_submarcas/".$item->id;$action_buttons ="<div class='btn-group'><a href='$route' class='btn btn-primary'>Ver</a></div>"; return $action_buttons;})->make(TRUE);

        }
        if ($id == 3)
        {
            $items= Colores::select('id as id', 'descripcion as name')->get();
            return Datatables::of($items)->addColumn('acciones', function($item){$action_buttons ="<div class='btn-group'><a href='$#' class='btn btn-primary disabled'>Ver</a></div>"; return $action_buttons;})->make(TRUE);

        }
        if ($id == 4)
        {
            $items= ClaseVehiculo::select('clasevehiculo_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->addColumn('acciones', function($item){$route="/get_tipovehiculos/".$item->id;$action_buttons ="<div class='btn-group'><a href='$route' class='btn btn-primary'>Ver</a></div>"; return $action_buttons;})->make(TRUE);

        }
        if ($id == 5)
        {
            $items= TipoUso::select('tipoUso_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->addColumn('acciones', function($item){$action_buttons ="<div class='btn-group'><a href='#' class='btn btn-primary disabled'>Ver</a></div>"; return $action_buttons;})->make(TRUE);

        }
        if ($id == 6)
        {
            $items= Lugar::select('lugar_id as id', 'descripcion as name')->get();
            return Datatables::of($items)->addColumn('acciones', function($item){$action_buttons ="<div class='btn-group'><a href='#' class='btn btn-primary disabled'>Ver</a></div>"; return $action_buttons;})->make(TRUE);

        }
        if ($id == 7)
        {
            $items= Procedencia::select('id as id', 'descripcion as name')->get();
            return Datatables::of($items)->addColumn('acciones', function($item){$action_buttons ="<div class='btn-group'><a href='#' class='btn btn-primary disabled'>Ver</a></div>"; return $action_buttons;})->make(TRUE);

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
