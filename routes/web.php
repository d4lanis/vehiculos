<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoresController;
use App\Http\Controllers\RoboController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DenuncianteController;

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
Route::get('robos/{robo}', [RoboController::class, 'destroy'])->name('robos.destroy');
Route::get('/municipios_id', [RoboController::class, 'getMunicipio']);
Route::get('/localidades_id', [RoboController::class, 'getLocalidad']);
Route::resource('vehiculos', VehiculoController::class);
Route::get('vehiculos/{vehiculo}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
Route::get('/submarcas_id', [VehiculoController::class, 'getSubmarca']);
Route::resource('denunciantes', DenuncianteController::class);
Route::get('denunciantes/{denunciante}', [DenuncianteController::class, 'destroy'])->name('denunciantes.destroy');