<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madre extends Model
{
    use HasFactory;
    //public function hijo(){
    //    return$this->hasOne('App\Models\Hijo');
    //}
    public function hijos(){
        return $this->hasMany('App\Models\Hijo');
    }

}
