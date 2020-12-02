<?php

namespace App\Http\Controllers;

use App\Models\Discapacitado;
use App\Models\Hijo;
use App\Models\Inhabilitado;
use App\Models\Madre;
use App\Models\Job;
use App\Models\Jurado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return Madre::with('hijos')
            ->where('id','>=',$d1)
            ->where('id','<=',$d2)
//                ->whereDate('created_at','=','updated_at')
//            ->where('detalle','RECIEN REGISTRADA PENDIENTE DE VERIFICACION')
//            ->orWhere('detalle','PERSONA VERIFICADA FALTA VERIFICACION SEXO, EDAD Y BONOS AGREGADOS')
            ->where('verificar','NO')
            ->limit(100)
            ->get();
    }
    public function recintos(){
        return Jurado::select('recinto')->where('recinto','!=','')->groupBy('recinto')->get();
    }
    public function confirmar(Request $request,$id){
        if(Auth::user()->id=='10' || Auth::user()->id=='9' || Auth::user()->id=='6' ){
            $m=Madre::find($id);
            $m->estado=$request->estado;
            $m->detalle=$request->detalle;
            $m->voto=$request->voto;
            $m->apfuturo=$request->apfuturo;
            $m->aprevision=$request->aprevision;
            $m->verificar='SI';
            $m->user_id=Auth::user()->id;
            $m->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ext=='')
        $cedula=$request->ci;
        else
        $cedula=$request->ci.'-'.$request->ext;
        $madre=Madre::where('ci',$cedula);
        if ($madre->count()>=1){
            $d=Discapacitado::where('ci',$cedula);
            if ($d->count()>=1){
                return "INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                exit;
            }

            $d=Inhabilitado::where('ci',$cedula);
            if ($d->count()>=1){
                return "INHABILITADO POR LA CORTE";
                exit;
            }
            $d=Job::where('ci',$cedula);
            if ($d->count()>=1){
                return "INHABILITADO USTED TIENE TRABAJO ESTABLE";
                exit;
            }
            return "EL CARNET ESTA REGISTRADO";
            exit;
        }else{
            if($request->ext=='')
            $cedula=$request->ci;
            else
            $cedula=$request->ci.'-'.$request->ext;
            $d1=Discapacitado::where('ci',$cedula);
            $d2=Job::where('ci',$cedula);

            if($d1->count()==0 && $d2->count()==0)
            {$m=new Madre();
                $d3=Inhabilitado::where('ci',$cedula);
                if($d3->count()>=1)
                    $m->detalle='INHABILITADO POR LA CORTE';
            $m->paterno= strtoupper( $request->paterno);
            $m->materno= strtoupper($request->materno);
            $m->conyugue= strtoupper($request->conyugue);
            $m->nombres= strtoupper($request->nombres);
            $m->fechanac=$request->fechanac;
            if($request->ext=='')
            $m->ci=$request->ci;
            else
            $m->ci=strtoupper($request->ci.'-'.$request->ext);
            $m->civalido=$m->ci;
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

            $d=Discapacitado::where('ci',$request->ci);
            if ($d->count()>=1){
                return "INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                $madre=Madre::find($m->id);
                $madre->estado="INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                exit;
            }

            $d=Inhabilitado::where('ci',$request->ci);
            if ($d->count()>=1){
                return "INHABILITADO POR LA CORTE";
                $madre=Madre::find($m->id);
                $madre->estado="INHABILITADO POR LA CORTE";
                exit;
            }
            $d=Job::where('ci',$request->ci);
            if ($d->count()>=1){
                return "INHABILITADO USTED TIENE TRABAJO ESTABLE";
                $madre=Madre::find($m->id);
                $madre->estado="INHABILITADO USTED TIENE TRABAJO ESTABLE";
                exit;
            }
            return "CORRECTO";
            }
            if ($d1->count()>=1){
                return "INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                exit;
            }

            if ($d2->count()>=1){
                return "INHABILITADO USTED TIENE TRABAJO ESTABLE";
                exit;
            }
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
        ->where('ci','like','%'.$ci.'%')
        //->where('ci',$ci)
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
        $m->banco=$request->banco;
        $m->numerobanco=$request->numerobanco;
        $m->estado=$request->estado;
        $m->detalle=$request->detalle;
        $m->user_id=Auth::user()->id;
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

    public function datosinfo(){
        /*$results = DB::select('
        SELECT (SELECT COUNT(*) from madres where estado="NO" and civalido!='') AS VERIF,
        (SELECT COUNT(*) from madres where estado="HABILITADO") AS HAB,
        (SELECT COUNT(*) from madres where estado="INHABILITADO") AS INHAB
        ');*/

    }

    public function info(){
        return Auth::user()->name;
    }
}
