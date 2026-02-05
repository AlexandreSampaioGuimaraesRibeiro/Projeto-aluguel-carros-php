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

     public function create(Request $request)
    {
       //validando as variaveis
       $validated = $request->([
        'modelo'=>['required','string','max:255'],
        'placa'=>['required|string|unique|max:7'],
        'marca'=>['required','string','max:255'],
        'ano'=>['required','year','max:4'],'preco_aluguel','descricao'
       ]);
    }
}
