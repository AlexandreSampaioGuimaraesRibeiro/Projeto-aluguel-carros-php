<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carros;
use App\Models\Clientes;

class AluguelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aluguel = Aluguel::orderBy('status')->get();
        return view('aluguel.index',compact('aluguel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluguel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
            'carro_id' => ['required', 'exists:carros,id'],
            'cliente_id' => ['required', 'exists:clientes,id'],
        ]);
            $validated['status'] = 'ativo';
            $validated['valor_diaria'] = Carros::find($validated['carro_id'])->preco_aluguel;
            $dias = (strtotime($validated['data_fim']) - strtotime($validated['data_inicio'])) / (60 * 60 * 24) + 1;
            $validated['valor_total'] = $validated['valor_diaria'] * $dias;

        Aluguel::create([
        'data_inicio'=>$validated['data_inicio'],
        'data_fim'=>$validated['data_fim'],
        'valor_diaria'=>$validated['valor_diaria'],
        'valor_total'=>$validated['valor_total'],
        'status'=>$validated['status'],
        'carro_id'=>$validated['carro_id'],
        'cliente_id'=>$validated['cliente_id'],
        ]);

        return redirect()->route('aluguel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluguel $aluguel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluguel $aluguel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluguel $aluguel)
    {
        $validated = $request->validate([
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
            'carro_id' => ['required', 'exists:carros,id'],
            'cliente_id' => ['required', 'exists:clientes,id'],
            'status' => ['required', 'in:ativo,concluido,cancelado'],
        ]);

        $validated['valor_diaria'] = Carros::find($validated['carro_id'])->preco_aluguel;
        $dias = (strtotime($validated['data_fim']) - strtotime($validated['data_inicio'])) / (60 * 60 * 24) + 1;
        $validated['valor_total'] = $validated['valor_diaria'] * $dias;

        $aluguel->update($validated);
        Aluguel::update([
        'data_inicio'=>$validated['data_inicio'],
        'data_fim'=>$validated['data_fim'],
        'valor_diaria'=>$validated['valor_diaria'],
        'valor_total'=>$validated['valor_total'],
        'status'=>$validated['status'],
        'carro_id'=>$validated['carro_id'],
        'cliente_id'=>$validated['cliente_id'],
        ]);
        return redirect()->route('aluguel.edit', $aluguel->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluguel $aluguel)
    {
        $aluguel->delete();
        return redirect()->route('aluguel.edit');
    }
}
