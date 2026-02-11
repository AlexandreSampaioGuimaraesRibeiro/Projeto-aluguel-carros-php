@extends('layouts.index')
@section('title', 'Clientes')   
@section('content')


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="mb-4 text-center">Cadastro de Cliente</h2>

            {{-- Erros --}}
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <b>Ops:</b>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Cadastrar cliente --}}
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('cliente.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" placeholder="Ex: João Silva" value="{{ old('nome') }}">
                            </div>
                            
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">CPF</label>
                                <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" value="{{ old('cpf') }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Telefone</label>
                                <input type="text" name="telefone" class="form-control" placeholder="(00) 00000-0000" value="{{ old('telefone') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="cliente@email.com" value="{{ old('email') }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small">Status</label>
                                <select name="status" class="form-select">
                                    <option value="ativo" {{ $cliente->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                    <option value="inativo" {{ $cliente->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>


                            <div class="col-12">
                                <label class="form-label small fw-bold">Endereço/Observações</label>
                                <input type="text" name="endereco" class="form-control" placeholder="Rua, número, bairro..." value="{{ old('endereco') }}">
                            </div>

                            <div class="col-12 d-flex justify-content-between align-items-center mt-4">
                                {{-- Voltar --}}
                                <a href="{{ route('cliente.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Voltar
                                </a>
                                
                                <button class="btn btn-primary px-4" type="submit">Adicionar Cliente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>



@endsection