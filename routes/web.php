<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoresController;
use App\Http\Controllers\RoboController;
use App\Http\Controllers\VehiculoController;

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
    return view('welcome');
});

Route::resource('colores', ColoresController::class);
Route::resource('robos', RoboController::class);
Route::get('/municipios_id', [RoboController::class, 'getMunicipio']);
Route::get('/localidades_id', [RoboController::class, 'getLocalidad']);
Route::resource('vehiculos', VehiculoController::class);
Route::get('/submarcas_id', [VehiculoController::class, 'getSubmarca']);