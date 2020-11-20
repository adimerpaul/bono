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
//        return Madre::all();
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
    public function madreregister($d1,$d2)
    {
        return Madre::with('hijo')
            ->whereDate('created_at','>=',$d1)
            ->whereDate('created_at','<=',$d2)
//                ->whereDate('created_at','=','updated_at')
            ->where('detalle','RECIEN REGISTRADA PENDIENTE DE VERIFICACION')
            ->orWhere('detalle','PERSONA VERIFICADA FALTA VERIFICACION SEXO, EDAD Y BONOS AGREGADOS')
            ->limit(100)
            ->get();
    }
    public function recintos(){
        return Madre::select('recinto')->where('recinto','!=','')->groupBy('recinto')->get();
    }
    public function confirmar(Request $request,$id){
        $m=Madre::find($id);
        $m->estado=$request->estado;
        $m->detalle=$request->detalle;
        $m->user_id=Auth::user()->id;
        $m->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $madre=Madre::where('ci',$request->ci);
        if ($madre->count()>=1){
            return "YAREGISTRADO";
        }else{
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
            $m->municipio=$request->municipio;
            $m->sexo=$request->sexo;
            $m->direccion=$request->direccion;
            $m->recinto=$request->recinto;
            $m->banco=$request->banco;
            $m->numerobanco=$request->numerobanco;
            $m->save();
            foreach ($request->hijos as $hijo){
                $h=new Hijo();
                $h->nombres=$hijo['nombres'];
                $h->apellidos=$hijo['apellidos'];
                $h->madre_id=$m->id;
                $h->save();
            }
            return "CORRECTO";
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function show($ci)
    {

        return Madre::with('hijos')
        ->where('ci',$ci)
        ->get();

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
    public function verificacion()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $m=Madre::find($id);
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
        $m->municipio=$request->municipio;
        $m->sexo=$request->sexo;
        $m->direccion=$request->direccion;
        $m->recinto=$request->recinto;
        $m->save();
        $delhijo=Hijo::where('madre_id',$id)->delete();
        foreach ($request->hijos as $hijo){
            $h=new Hijo();
            $h->nombres=$hijo['nombres'];
            $h->apellidos=$hijo['apellidos'];
            $h->madre_id=$m->id;
            $h->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Madre $madre)
    {
        //$delhijo=Hijo::where('madre_id',$id)->delete();
        //$m=Madre::find($id);
        //$m->delete();
    }
}
