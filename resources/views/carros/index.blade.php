@extends('layouts.index')
section('title', 'Carros')   
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

            {{-- Cadastrar carro --}}
                @csrf
                    <a href= "{{ route('carros.create') }}">
                            <button class="btn btn-primary" type="submit">Cadastrar carro</button>
                    </a>


            <hr>

            {{-- Listagem --}}
            @forelse($carros as $carro)
                <div class="card mb-3">
                    <div class="card-body">

                       
                            <a href= "{{ route('carros.update') }}">
                                <button class="btn btn-primary" type="submit">Modificar informações do carro</button>
                            </a>
                           
                            

                            <div class="text-muted small mt-2">
                                #{{ $carro->id }} • Cadastrado em {{ $carro->created_at->format('d/m/Y H:i') }}
                            </div>
                        

                        <form action="{{ route('carros.destroy', $carro) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Excluir este carro?')">
                                Excluir
                            </button>
                        </form>

                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Nenhum carro cadastrado.
                </div>
            @endforelse

        </div>
    </div>
</div>


@endsection