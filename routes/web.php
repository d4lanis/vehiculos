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
Auth::routes(['register'=>false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {return view('home');});
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
    Route::get('/fillData', [OperacionController::class, 'fillIndexTable']);
    Route::resource('vehiculos_robados',OperacionController::class);
    Route::get('vehiculos_robados',[OperacionController::class,'index'])->name('vehiculos_robados.index');
    Route::get('vehiculos_robados/create',[OperacionController::class,'create'])->name('vehiculos_robados.create');
    Route::get('vehiculos_robados/{vehiculos_robado}/edit',[OperacionController::class,'edit'])->name('vehiculos_robados.edit');
    Route::get('vehiculos_robados.delete/{id}',[OperacionController::class, 'destroy'])->name('vehiculos_robados.destroy');
    Route::get('vehiculos_robados/{vehiculos_robado}',[OperacionController::class, 'show'])->name('vehiculos_robados.show');
    
    Route::group(['prefix'=>'admin'], function(){
        //Route::resource('vehiculos_robados',OperacionController::class);
        Route::get('/catalogos',[CatalogoController::class, 'index'])->middleware('can:admin.catalogos.index')->name('vistaCatalogos.index');
        Route::get('/catalogos/{id}',[CatalogoController::class, 'viewCatalogo'])->middleware('can:admin.catalogos.catalogo');
    });

    Route::get('/getData/{id}',[CatalogoController::class,'getData']);
    Route::get('/home', function (){ return view('admin.home');})->name('admin.home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
});