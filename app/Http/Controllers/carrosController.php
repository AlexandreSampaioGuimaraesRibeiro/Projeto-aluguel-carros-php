<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carros;

class CarrosController extends Controller
{
    // 
    public function index()
    {
        //indice ordernado por id
        $carros= Carros::orderByDesc('status')->get();
        return view('carros.index',compact('carros'));  
    }

    
    public function create()
    {
        return view('carros.create');
    }

    public function store(Request $request)
    {
        //validando as variaveis
       $validated = $request->validade([
        'modelo'=>['required','string','max:255'],
        'placa'=>['required','string','regex:/^[A-Z]{3}[0-9][A-Z0-9][0-9]{2}$/'],
        'marca'=>['required','string','max:255'],
        'ano'=>['required', 'integer', 'min:1900', 'max:' . date('Y')],
        'cor'=>['required','string','max:50'],
        'preco_aluguel'=>['requirede','decimal'],
        'descricao'=>['requirede','string','max:1000'],
       ]);
       
       $validated['status']='disponível';
       Carros::create([
        'modelo'=>$validated['modelo'],
        'placa'=>$validated['placa'],
        'marca'=>$validated['marca'],
        'ano'=>$validated['ano'],
        'preco_aluguel'=>$validated['preco_aluguel'],
        'status'=>$validated['status'],
        'descricao'=>$validated['descricao'],
       ]);

       return redirect()->route('carros.index');
    }

    public function update(Request $request,string $carros)
    {
        $validated = $request->validade([
        'modelo'=>['required','string','max:255'],
        'placa' => ['required','string','regex:/^[A-Z]{3}[0-9][A-Z0-9][0-9]{2}$/'],
        'marca'=>['required','string','max:255'],
        'ano'=>['required', 'integer', 'min:1900', 'max:' . date('Y')],
        'cor'=>['required','string','max:50'],
        'preco_aluguel'=>['requirede','decimal'],
        'status'=>['required','enum'],
        'descricao'=>['requirede','string','max:1000'],
       ]);
       Carros::update([
        'modelo'=>$validated['modelo'],
        'placa'=>$validated['placa'],
        'marca'=>$validated['marca'],
        'ano'=>$validated['ano'],
        'preco_aluguel'=>$validated['preco_aluguel'],
        'status'=>$validated['status'],
        'descricao'=>$validated['descricao'],
       ]);
       return redirect()->route('carros.edit');
    }

    public function destroy(Request $request,string $carros)
    {
        $carros->delete();
        return redirect()->route('carros.edit');
    }
}
