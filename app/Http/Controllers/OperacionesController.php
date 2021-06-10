<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Robo;
use App\Models\Vehiculo;
use App\Models\Denunciante;

class OperacionesController extends Controller
{
    public function index()
    {
        $data['robos']=Robo::paginate();
        $data['vehiculos']=Vehiculo::paginate();
        $data['denunciantes']=Denunciante::paginate();
        return view('index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }
    */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    /*public function show(Municipio $municipio)
    {
        //
    }
    */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    /*public function edit(Municipio $municipio)
    {
        //
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Municipio $municipio)
    {
        //
    }
    */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Municipio $municipio)
    {
        //
    }*/
}
