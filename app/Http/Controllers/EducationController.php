<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Discapacitado;
use App\Models\Job;
use App\Models\Children;
use App\Models\Rent;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Education::with('hijos')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(
            Auth::user()->id=='2' ||
            Auth::user()->id=='41' 
        ){
        if($request->ext=='')
        $cedula=$request->ci;
        else
        $cedula=$request->ci.'-'.$request->ext;

        $education=Education::where('ci',$cedula);

        if ($education->count()>=1){
            $d=Discapacitado::where('ci',$cedula);
            if ($d->count()>=1){
                return "INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                exit;
            }


            $d=Job::where('ci',$cedula);
            if ($d->count()>=1){
                return "INHABILITADO USTED TIENE TRABAJO ESTABLE";
                exit;
            }

            $d=Rent::where('ci',$cedula);
            if ($d->count()>=1){
                return "USTED ES RENTISTA";
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

            if($d1->count()==0 && $d2->count()==0 )
            {$m=new Education();
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
            $m->mama='SI';
            $m->numerobanco=$request->numerobanco;
            $m->reg_id=Auth::user()->id;


            $m->save();
            foreach ($request->hijos as $hijo){
                $h=new Children();
                $h->nombres=$hijo['nombres'];
                $h->apellidos=$hijo['apellidos'];
                $h->education_id=$m->id;
                $h->save();
            }

            $d=Discapacitado::where('ci',$request->ci);
            if ($d->count()>=1){
                return "INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                $madre=Madre::find($m->id);
                $madre->estado="INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                exit;
            }


            }
            if ($d1->count()>=1){
                return "INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                exit;
            }

            if ($d2->count()>=1){
                return "INHABILITADO USTED TIENE TRABAJO ESTABLE";
                exit;
            }
   
            return "CORRECTO";
        }
    }
    else
        return "NO AUTORIZADO";




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
    }
}
