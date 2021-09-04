<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoboController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DenuncianteController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\CatalogoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::match(['get','post'],'/get_estados', [CatalogoController::class,'getEstados']);
Route::match(['get','post'],'/get_municipios/{id}', [CatalogoController::class,'getMunicipios']);
Route::match(['get','post'],'/get_poblaciones/{entidad}/{municipio}', [CatalogoController::class,'getPoblaciones']);
Route::match(['get','post'], '/get_marcas', [CatalogoController::class,'getMarcas']);
Route::match(['get','post'], '/get_submarcas/{id}',[CatalogoController::Class,'getSubMarcas']);
Route::match(['get','post'], '/get_tipolugar',[CatalogoController::Class,'getLugares']);
Route::match(['get','post'], '/get_modalidad',[CatalogoController::Class,'getModalidades']);
Route::match(['get','post'], '/get_colores',[CatalogoController::Class,'getColores']);
Route::match(['get','post'], '/get_clasevehiculos',[CatalogoController::Class,'getClaseVehiculos']);
Route::match(['get','post'], '/get_tipovehiculos/{id}',[CatalogoController::Class,'getTipoVehiculos']);
Route::match(['get','post'], '/get_tipousos',[CatalogoController::Class,'getTipoUsos']);
Route::match(['get','post'], '/get_procedencias',[CatalogoController::Class,'getProcedencias']);
Route::resource('vehiculosRobados',OperacionController::class);
//Route::resource('vehiculosRobadosAdmin',OperacionController::class);
Route::get('/fillData', [OperacionController::class, 'fillIndexTable']);
Route::get('vehiculosRobados.delete/{vehiculosRobado}',[OperacionController::class, 'destroy'])->name('vehiculosRobados.delete');
Route::get('vehiculosRobados/{vehiculosRobado}',[OperacionController::class, 'show'])->name('vehiculosRobados.show');
Route::get('vistaCatalogos',[CatalogoController::class, 'index'])->name('vistaCatalogos.index');
Route::get('vistaCatalogos.catalogo/{id}',[CatalogoController::class, 'viewCatalogo']);
Route::get('/getData/{id}',[CatalogoController::class,'getData']);