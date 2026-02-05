<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrosController extends Controller
{
    // 
    public function index()
    {
        //indice ordernado por id
        $carros= Carros::orderByDesc('id')->get();
        return view('carros.index',compact('carros'));  
    }
}
