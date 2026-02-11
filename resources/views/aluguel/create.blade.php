@extends('layouts.index')
@section('title', 'Clientes')   
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Registrar Novo Aluguel</h2>
                <a href="{{ route('aluguel.index') }}" class="btn btn-outline-secondary">Voltar</a>
            </div>

            {{-- Exibição de Erros de Validação --}}
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('aluguel.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            {{-- Seleção de Cliente --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Cliente</label>
                                <select name="cliente_id" class="form-select">
                                    <option value="">Selecione o Cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ old('cliente_id' ) == $cliente->id ? 'selected' : '' }}>
                                            {{ $cliente->nome }} (CPF: {{ $cliente->cpf }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Seleção de Carro --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Carro</label>
                                <select name="carro_id" class="form-select">
                                    <option value="">Selecione o Veículo</option>
                                    @foreach($carros as $carro)
                                        <option value="{{ $carro->id }}" {{ old('carro_id' ) == $carro->id ? 'selected' : '' }}>
                                            {{ $carro->modelo }} - {{ $carro->placa }} (R$ {{ $carro->preco_aluguel }}/dia)
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Datas --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Data de Início</label>
                                <input type="date" name="data_inicio" class="form-control" value="{{ old('data_inicio') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Data de Término</label>
                                <input type="date" name="data_fim" class="form-control" value="{{ old('data_fim') }}">
                            </div>

                            <div class="col-12 mt-4">
                                <div class="alert alert-info small">
                                    <i class="bi bi-info-circle"></i> O <b>valor total</b> será calculado automaticamente pelo sistema com base na diária do veículo selecionado.
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success btn-lg px-5">Confirmar Aluguel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection