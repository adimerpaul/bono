<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return User::where('id','!=',1)->get();
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d=new User();
        $d->name=$request->name;
        $d->email=$request->email;
        $d->tipo=$request->tipo;
        $d->password=Hash::make( $request->password);
        $d->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d=User::find($id);
        $d->name=$request->name;
        $d->email=$request->email;
        $d->tipo=$request->tipo;
//        $d->password=Hash::make( $request->password);
        $d->save();
    }

    public function pass(Request $request, $id)
    {
        $d=User::find($id);
//        $d->name=$request->name;
//        $d->email=$request->email;
        $d->password=Hash::make( $request->password);
        $d->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=User::find($id);
        $d->delete();
    }
}
