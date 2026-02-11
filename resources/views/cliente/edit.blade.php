@extends('layouts.index')
@section('title', 'Clientes')   
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Editar Cadastro de Cliente</h2>
                <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary btn-sm">Voltar para Lista</a>
            </div>

            {{-- Exibição de Erros --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario de Edição --}}
            <div class="card shadow-sm mb-5 card-edit">
                <div class="card-header bg-white fw-bold">Informações do Cliente #{{ $cliente->id }}</div>
                <div class="card-body">
                    <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Necessário para rotas de Update --}}

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}">
                            </div>
                            
                            <div class="col-md-3">
                                <label class="form-label small">CPF</label>
                                <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $cliente->cpf) }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small">Telefone</label>
                                <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small">E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small">Status</label>
                                <select name="status" class="form-select">
                                    <option value="ativo" {{ $cliente->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                    <option value="inativo" {{ $cliente->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button class="btn btn-primary px-5" type="submit">Salvar Alterações</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Seção de Exclusão (Zona de Perigo) --}}
            <div class="card shadow-sm card-delete">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-danger mb-1">Excluir Cliente</h5>
                        <p class="text-muted small mb-0">Esta ação é irreversível. Todos os dados deste cliente serão removidos.</p>
                    </div>
                    
                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza absoluta que deseja excluir este cliente?')">
                            Excluir Cadastro
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection