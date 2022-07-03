<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasbordControler extends Controller
{
    public function index(){
        return view ('dasboards.index',[
            'title'=>'dasboards'
        ]);
    }
}
