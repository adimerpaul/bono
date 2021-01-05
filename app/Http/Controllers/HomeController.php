<?php

namespace App\Http\Controllers;

use App\Models\Madre;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function corte($ci,$born){
//        $madres = Madre::limit(100)->get();

//        foreach ($madres as $madre) {
//            echo $madre->ci." ".$madre->fechanac."<br>";
//        }
//        return $madres;
        $token_payload = [
            'document' => $ci,
            'born' => $born
        ];

// This is your client secret
        $key = 'VBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8';
//        $jwt = JWT::encode($token_payload, $key);
//        print "JWT:\n";
//        print_r($jwt);
        $jwt=JWT::encode($token_payload,$key);
        echo $jwt;
    }
    public function veri(){
        return view('veri');
    }
    public function madres(){
        return Madre::where('id','>=','66287')->where('id','<=','66305')->get();
    }
    public function madresupdate($id,Request $request){
        $madre=Madre::find($id);
        $madre->voto=$request->voto;
        $madre->save();
    }
}
