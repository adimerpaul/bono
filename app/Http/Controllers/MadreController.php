<?php

namespace App\Http\Controllers;

use App\Models\Discapacitado;
use App\Models\Hijo;
use App\Models\Inhabilitado;
use App\Models\Madre;
use App\Models\Mama;
use App\Models\Rent;
use App\Models\Job;
use App\Models\Jurado;
use App\Models\Special;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return Jurado::select('recinto')->where('recinto','!=','')->groupBy('recinto')->orderBy('recinto')->get();
    }
    public function confirmar(Request $request,$id){
        if(Auth::user()->id=='10' || Auth::user()->id=='9' || Auth::user()->id=='6'
        || Auth::user()->id=='15' || Auth::user()->id=='16' || Auth::user()->id=='2'
            || Auth::user()->id=='3' || Auth::user()->id=='4' || Auth::user()->id=='5'
        || Auth::user()->id=='17' || Auth::user()->id=='18' || Auth::user()->id=='19'
        || Auth::user()->id=='20' || Auth::user()->id=='21' || Auth::user()->id=='22'
        || Auth::user()->id=='23' || Auth::user()->id=='24' || Auth::user()->id=='25'
        || Auth::user()->id=='26' || Auth::user()->id=='27' || Auth::user()->id=='28'
        || Auth::user()->id=='29'  || Auth::user()->id=='30'   || Auth::user()->id=='31'
        || Auth::user()->id=='32'  || Auth::user()->id=='33'    || Auth::user()->id=='34'
        || Auth::user()->id=='35' || Auth::user()->id=='36' || Auth::user()->id=='37'
        ){

            $m=Madre::find($id);
            $ma=Mama::where('ci',$m->civalido)->count();
            $m->nombres=$request->nombres;
            $m->paterno=$request->paterno;
            $m->materno=$request->materno;
            $m->voto=$request->voto;
            $m->apfuturo=$request->apfuturo;
            $m->aprevision=$request->aprevision;
            $m->verificar='SI';
            $m->user_id=Auth::user()->id;
            if($ma>0 ){
                $m->mama='SI';
                if($request->estado=='NO'){
                $m->estado='HABILITADO';
                $m->detalle='USTED ESTA HABILITADO PARA REALIZAR EL COBRO';}
                else{
                $m->estado=$request->estado;
                $m->detalle=$request->detalle;
                }

            }
            else {
                $m->mama='NO';
                $m->estado='INHABILITADO';
                $m->detalle=$request->detalle.' NO ESTA REGISTRADA COMO MAMÀ EN EL SERECI';
            }
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
            $d=Mama::where('ci',$cedula);
            if ($d->count()==0){
                return "NO LA TENEMOS REGISTRADA EN NUESTROS DATOS COMO MADRE DE FAMILIA O MADRE MENOR A 60 AÑOS";
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
            $d4=Mama::where('ci',$cedula);

            if($d1->count()==0 && $d2->count()==0 && $d4->count()>0)
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
            $m->mama='SI';
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
            }
            if ($d1->count()>=1){
                return "INHABILITADO USTED YA COBRA EL BONO DISCAPACIDAD";
                exit;
            }

            if ($d2->count()>=1){
                return "INHABILITADO USTED TIENE TRABAJO ESTABLE";
                exit;
            }

            if ($d4->count()==0){
                return "NO LA TENEMOS REGISTRADA EN NUESTROS DATOS COMO MADRE DE FAMILIA O MADRE MENOR A 60 AÑOS";
                exit;
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
        //->where('ci',$ci)
        ->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Madre  $madre
     * @return \Illuminate\Http\Response
     */
    public function edit(adre $madre)
    {

    }
    public function storemama(Request $request)
    {
        if(Auth::user()->id=='24' ||
            Auth::user()->id=='25' ||

            Auth::user()->id=='3'||
            Auth::user()->id=='4'||
            Auth::user()->id=='5'||

            Auth::user()->id=='26' ||
            Auth::user()->id=='21' ||
            Auth::user()->id=='23' ||
            Auth::user()->id=='16' ||
            Auth::user()->id=='9' ||
            Auth::user()->id=='10' ||
            Auth::user()->id=='27' ||
            Auth::user()->id=='2'){
        $d= new Mama();
        $d->ci=$request->ci;
        $d->nombre=$request->nombre;
        $d->save();}
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
        if( Auth::user()->id=='2' ||

            Auth::user()->id=='5' ||
            Auth::user()->id=='4' ||
            Auth::user()->id=='3' ||

            Auth::user()->id=='27' ||
            Auth::user()->id=='15' ||
            Auth::user()->id=='16' ||
            Auth::user()->id=='23' ||
            Auth::user()->id=='21' ||
            Auth::user()->id=='22' ||
            Auth::user()->id=='10' ||
            Auth::user()->id=='9' ||
            Auth::user()->id=='6'){
        $m=Madre::find($id);
        if($m->voto== null){
         $m->user_id=Auth::user()->id;
         $m->voto=$request->voto;
        $m->apfuturo=$request->apfuturo;
        $m->aprevision=$request->aprevision;
        $m->verificar='SI';
        }
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

        //$m->verificar=$request->verificar;
            //if($request->verificar=='SI' && $m->user_id!=$m->user_id=Auth::user()->id)
            //if($request->verificar=='SI')
              //  $m->user_id_especial=Auth::user()->id;
            $ma=Mama::where('ci',$m->civalido)->count();

              if($ma>0 ){
                $m->mama='SI';
                if($request->estado=='NO'){
                $m->estado='HABILITADO';
                $m->detalle='USTED ESTA HABILITADO PARA REALIZAR EL COBRO';}
                else{
                $m->estado=$request->estado;
                $m->detalle=$request->detalle;
                }

            }
            else {
                $m->mama='NO';
                $m->estado='INHABILITADO';
                $m->detalle=$request->detalle.' NO ESTA REGISTRADA COMO MAMÀ EN EL SERECI';
            }
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
    }
    public function modificar(Request $request, $id)
    {
        if(Auth::user()->id=='2' ||
            Auth::user()->id=='5' ||
            Auth::user()->id=='4' ||
            Auth::user()->id=='3' ||
            Auth::user()->id=='16' ||
            Auth::user()->id=='6' ||
            Auth::user()->id=='15' ||
            Auth::user()->id=='23' ||
            Auth::user()->id=='21' ||
            Auth::user()->id=='22' ||
            Auth::user()->id=='10' ||
            Auth::user()->id=='9' ||
            Auth::user()->id=='27'){
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



            //if($request->verificar=='SI' && $m->user_id!=$m->user_id=Auth::user()->id)
            $m->estado='HABILITADO';
            $m->detalle='USTED ESTA HABILITADO PARA COBRAR EL BONO';
        $m->user_id_especial=Auth::user()->id;
        $m->save();
        $delhijo=Hijo::where('madre_id',$id)->delete();
        foreach ($request->hijos as $hijo){
            $h=new Hijo();
            $h->nombres=$hijo['nombres'];
            $h->apellidos=$hijo['apellidos'];
            $h->madre_id=$m->id;
            $h->save();
        }
        $s=new Special();
        $s->docnac=$request->docnac;
        $s->docbiomet=$request->docbiomet;
        $s->docfuturo=$request->docfuturo;
        $s->docprevision=$request->docprevision;
        $s->user_id=Auth::user()->id;
        $s->madre_id=$m->id;
        $s->save();
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
      //$sql='SELECT (SELECT COUNT(*) from madres where estado="NO" and civalido!='') AS VERIF,
       //(SELECT COUNT(*) from madres where estado="HABILITADO") AS HAB,
       // (SELECT COUNT(*) from madres where estado="INHABILITADO") AS INHAB');
        //$resultado=DB::select($sql);
        $r1=DB::table('madres')->where('estado',"NO")->count();
        $r2=DB::table('madres')->where('estado',"HABILITADO")->count();
        $r3=DB::table('madres')->where('estado',"INHABILITADO")->count();
        return  ['no'=>$r1,'habi'=>$r2,'inhab'=>$r3];

    }

    public function informe(){
        $r2=DB::table('madres')->where('estado',"HABILITADO")->orderBy('civalido')->get();
        return $r2;
    }

    public function numregistro(){
        $res=DB::table('madres')->select(DB::raw('COUNT(*) AS numero,DATE(created_at) AS fecha'))
        ->groupBy('fecha')->get();
        return $res;
    }

    public function totalrevisado(){
        $res=DB::table('madres')
            ->join('users','madres.user_id','=','users.id')
            ->select(DB::raw('madres.user_id AS iduser,COUNT(*) AS total, users.name AS nombre'))
            ->groupBy('iduser')->groupBy('nombre')->orderBy('total')->get();
            return $res;
    }

    public function info(){
        return Auth::user()->name;
    }

    public function verma($ci){
        $res=DB::table('mamas')->where('ci',$ci)->get();
        return $res;
    }

    public function userverif($fecha){
        $id =Auth::user()->id;
        return DB::table('madres')->where('user_id',$id)
        ->whereDate('updated_at',$fecha)
        ->orderBy('updated_at','desc')->get();
    }

    public function userhabilita($fecha){
        $id =Auth::user()->id;
        return DB::table('madres')->where('user_id_especial',$id)
        ->whereDate('updated_at',$fecha)
        ->orderBy('updated_at','desc')->get();
    }

}
