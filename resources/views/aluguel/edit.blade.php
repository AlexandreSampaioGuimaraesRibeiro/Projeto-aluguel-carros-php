@extends('layouts.index')
@section('title', 'Clientes')   
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Gerenciar Aluguel #{{ $aluguel->id }}</h2>
                <a href="{{ route('aluguel.index') }}" class="btn btn-secondary">Voltar</a>
            </div>

            {{-- Erros de Validação --}}
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulário de Edição --}}
            <div class="card shadow-sm mb-5 card-edit">
                <div class="card-header bg-white fw-bold text-warning">Alterar Dados do Aluguel</div>
                <div class="card-body">
                    <form action="{{ route('aluguel.update', $aluguel->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            {{-- Cliente (Read-only ou Select) --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Cliente</label>
                                <select name="cliente_id" class="form-select">
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ (old('cliente_id' , $aluguel->cliente_id) == $cliente->id) ? 'selected' : '' }}>
                                            {{ $cliente->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Carro --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Carro</label>
                                <select name="carro_id" class="form-select">
                                    @foreach($carros as $carro)
                                        <option value="{{ $carro->id }}" {{ (old('carro_id' , $aluguel->carro_id) == $carro->id) ? 'selected' : '' }}>
                                            {{ $carro->modelo }} (R$ {{ $carro->preco_aluguel }}/dia)
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Datas --}}
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Data de Início</label>
                                <input type="date" name="data_inicio" class="form-control" value="{{ old('data_inicio', $aluguel->data_inicio) }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Data de Término</label>
                                <input type="date" name="data_fim" class="form-control" value="{{ old('data_fim', $aluguel->data_fim) }}">
                            </div>

                            {{-- Status do Aluguel --}}
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Status do Aluguel</label>
                                <select name="status" class="form-select">
                                    <option value="ativo" {{ $aluguel->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                    <option value="concluido" {{ $aluguel->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                                    <option value="cancelado" {{ $aluguel->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </div>

                            <div class="col-12 bg-light p-3 rounded mt-4">
                                <p class="mb-1"><strong>Valor Diária:</strong> R$ {{ number_format($aluguel->valor_diaria, 2, ',', '.') }}</p>
                                <p class="mb-0"><strong>Valor Total Estimado:</strong> R$ {{ number_format($aluguel->valor_total, 2, ',', '.') }}</p>
                                <small class="text-muted">* O valor será recalculado ao salvar se as datas ou o carro mudarem.</small>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning px-5 fw-bold">Atualizar Aluguel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Opção de Excluir --}}
            <div class="card shadow-sm card-delete">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-danger mb-0">Excluir este Registro</h5>
                        <small class="text-muted">Atenção: Esta ação não pode ser desfeita.</small>
                    </div>
                    <form action="{{ route('aluguel.destroy', $aluguel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este aluguel?')">
                            Remover Permanentemente
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection