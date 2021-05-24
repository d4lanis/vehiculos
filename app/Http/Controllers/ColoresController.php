<?php

namespace App\Http\Controllers;

use App\Models\Colores;
use Illuminate\Http\Request;


class ColoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['colores'] = Colores::paginate();
        return view('colores.index',$data);

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('colores.create');
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
        $data = new Colores;
        $data->descripcion = $request->descripcion;
        $data->save();
        return redirect('colores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function show(Colores $colores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $color = Colores::findOrFail($id);
        return view('colores.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $colore)
    {
        //
        $data = $request->except(['_token','_method']);
        Colores::where('id','=',$colore)->update($data);
        $colore= Colores::findOrFail($colore);
        return redirect()->route('colores.index')->withSuccess('Registro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colores $colore)
    {
        //
        //$color = Colores::findOrFail($id);
        $colore->delete();
        return redirect()->route('colores.index')->withSuccess('Registro Borrado');
    }
}
