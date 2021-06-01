<?php

namespace App\Http\Controllers;

use App\Models\Denunciante;
use Illuminate\Http\Request;

class DenuncianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['denunciantes'] = Denunciante::paginate();
        return view('denunciantes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('denunciantes.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function show(Denunciante $denunciante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function edit(Denunciante $denunciante)
    {
        return view ('vehiculos.edit', compact('vehiculo','data')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denunciante $denunciante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denunciante  $denunciante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denunciante $denunciante)
    {
        //
    }
}
