<?php

namespace App\Http\Controllers;

use App\Models\Hijo;
use App\Models\Madre;
use Illuminate\Http\Request;

class MadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $m=new Madre();
        $m->paterno=$request->paterno;
        $m->materno=$request->materno;
        $m->conyugue=$request->conyugue;
        $m->nombres=$request->nombres;
        $m->fechanac=$request->fechanac;
        $m->ci=$request->ci;
        $m->fijo=$request->fijo;
        $m->celular=$request->celular;
        $m->salario=$request->salario;
        $m->afp=$request->afp;
        $m->rentista=$request->rentista;
        $m->juana=$request->juana;
        $m->discapacidad=$request->discapacidad;
        $m->save();
        foreach ($request->hijos as $hijo){
            $h=new Hijo();
            $h->nombres=$hijo['nombres'];
            $h->apellidos=$hijo['apellidos'];
            $h->madre_id=$m->id;
            $h->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function show(Madre $madre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function edit(Madre $madre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Madre $madre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Madre $madre)
    {
        //
    }
}
