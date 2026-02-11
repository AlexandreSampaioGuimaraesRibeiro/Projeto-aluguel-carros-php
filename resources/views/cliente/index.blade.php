@extends('layouts.index')
@section('title', 'Clientes')   
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            

            {{-- Erros --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <b>Ops:</b>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Cadastrar cliente --}}
                @csrf
                    <a href= "{{ route('cliente.create') }}">
                            <button class="btn btn-primary" type="submit">Cadastrar cliente</button>
                    </a>


            <hr>

            {{-- Listagem --}}
            @forelse($cliente as $cliente)
                <div class="card mb-3">
                    <div class="card-body">

                       
                            <a href= "{{ route('cliente.update') }}">
                                <button class="btn btn-primary" type="submit">Modificar informações do cliente</button>
                            </a>
                           
                            

                            <div class="text-muted small mt-2">
                                #{{ $cliente->id }} • Cadastrado em {{ $cliente->created_at->format('d/m/Y H:i') }}
                            </div>
                        

                        <form action="{{ route('cliente.destroy', $cliente) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Excluir este cliente?')">
                                Excluir
                            </button>
                        </form>

                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Nenhum Cliente cadastrado.
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection