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
Auth::routes(['register'=>true]);
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
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
    Route::resource('vehiculos_robados',OperacionController::class);
    //Route::resource('admin/vehiculos_robados',OperacionController::class);
    Route::get('/fillData', [OperacionController::class, 'fillIndexTable']);
    Route::get('vehiculos_robados.delete/{id}',[OperacionController::class, 'destroy'])->name('vehiculos_robados.delete');
    Route::get('vehiculos_robados/{id}',[OperacionController::class, 'show'])->name('vehiculos_robados.show');
    Route::get('admin/catalogos',[CatalogoController::class, 'index'])->name('vistaCatalogos.index');
    Route::get('admin/catalogos/{id}',[CatalogoController::class, 'viewCatalogo']);
    Route::get('/getData/{id}',[CatalogoController::class,'getData']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});