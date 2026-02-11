@extends('layouts.index')
@section('title', 'Clientes')   
@section('content')


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="mb-4 text-center">CRUD de Carros</h2>

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
            <form action="{{ route('carros.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" name="modelo" class="form-control" placeholder="Nome do modelo" value="{{ old('modelo') }}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="placa" class="form-control" placeholder="placa" value="{{ old('placa') }}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="marca" class="form-control" placeholder="marca" value="{{ old('marca') }}">
                    </div>
                     <div class="col-md-4">
                        <input type="number" name="ano" class="form-control" placeholder="ano" value="{{ old('ano') }}">
                    </div>
                     <div class="col-md-4">
                        <input type="text" name="cor" class="form-control" placeholder="cor" value="{{ old('cor') }}">
                    </div>
                     <div class="col-md-4">
                        <input type="text" name="preco_aluguel" class="form-control" placeholder="preco_aluguel" value="{{ old('preco_aluguel') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="disponivel">Disponível</option>
                            <option value="manutencao">Indisponível</option>
                        </select>
                    </div>
                     <div class="col-md-4">
                        <input type="text" name="descricao" class="form-control" placeholder="descricao" value="{{ old('descricao') }}">
                    </div>
                    <div class="col-md-1 d-grid">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </div>
            </form>
            {{-- Voltar --}}
            <a href= "{{ route('carros.index') }}">
                            <button class="btn btn-primary" type="submit">Voltar</button>
            </a>
            
        </div>
    </div>
</div>
@endsection