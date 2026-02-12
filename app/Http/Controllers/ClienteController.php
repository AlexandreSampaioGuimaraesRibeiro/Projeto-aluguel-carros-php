<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = Cliente::all();
        return view('cliente.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return redirect()->route('cliente.create');
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
    public function show(Cliente $cliente)
    {
         $validated = $request->validate([
            'nome'=>['string','required','max:255'],
            'email'=>['required','string','max:255'],
            'senha'=>['required','string','max:255'],
        ]);
        $validated['status']='ativo';
        Cliente::create([
            'nome'=> $validated['nome'],
            'email'=> $validated['email'],
            'senha'=> $validated['senha'],
            'status'=> $validated['status'],
        ]);
        return redirect()->route('cliente.index');
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nome'=>['string','required','max:255'],
            'email'=>['required','string','max:255'],
            'senha'=>['required','string','max:255'],
            'status'=>['required','enum'],
        ]);
        
        Cliente::update([
            'nome'=> $validated['nome'],
            'email'=> $validated['email'],
            'senha'=> $validated['senha'],
            'status'=> $validated['status'],
        ]);
        return redirect()->route('cliente.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.edit');
    }
}
