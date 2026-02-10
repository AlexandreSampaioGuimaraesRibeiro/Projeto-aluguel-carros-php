<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return redirect()->route('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(clientes $clientes)
    {
         $validated = $request->validade([
            'nome'=>['string','required','max:255'],
            'email'=>['required','string','max:255'],
            'senha'=>['required','string','max:255'],
        ]);
        $validated['status']='ativo';
        Clientes::create([
            'nome'=> $validated['nome'],
            'email'=> $validated['email'],
            'senha'=> $validated['senha'],
            'status'=> $validated['status'],
        ]);
        return redirect()->route('clientes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cliente $clientes)
    {
        $validated = $request->validade([
            'nome'=>['string','required','max:255'],
            'email'=>['required','string','max:255'],
            'senha'=>['required','string','max:255'],
            'status'=>['required','enum'],
        ]);
        
        Clientes::update([
            'nome'=> $validated['nome'],
            'email'=> $validated['email'],
            'senha'=> $validated['senha'],
            'status'=> $validated['status'],
        ]);
        return redirect()->route('clientes.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clientes $clientes)
    {
        $clientes->delete();
        return redirect()->route('clientes.edit');
    }
}
