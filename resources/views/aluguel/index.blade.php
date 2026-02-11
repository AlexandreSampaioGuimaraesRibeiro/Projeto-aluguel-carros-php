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

            {{-- Cadastrar aluguel --}}
                @csrf
                    <a href= "{{ route('aluguel.create') }}">
                            <button class="btn btn-primary" type="submit">Fazer um aluguel</button>
                    </a>


            <hr>

            {{-- Listagem --}}
            @forelse($aluguel as $aluguel)
                <div class="card mb-3">
                    <div class="card-body">

                       
                            <a href= "{{ route('aluguel.update') }}">
                                <button class="btn btn-primary" type="submit">Modificar informações do aluguel</button>
                            </a>
                           
                            

                            <div class="text-muted small mt-2">
                                #{{ $aluguel->id }} • Cadastrado em {{ $aluguel->created_at->format('d/m/Y H:i') }}
                            </div>
                        

                        <form action="{{ route('aluguel.destroy', $aluguel) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Quer mesmo canselar este contrato?')">
                                Canselar
                            </button>
                        </form>

                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Nenhum aluguel encontrado.
                </div>
            @endforelse

        </div>
    </div>
</div>


@endsection