<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD de Carros</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

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
            <form action="{{ route('carros.create') }}" method="POST" class="mb-4">
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
                     <div class="col-md-4">
                        <input type="text" name="descricao" class="form-control" placeholder="descricao" value="{{ old('descricao') }}">
                    </div>
                    <div class="col-md-1 d-grid">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </div>
            </form>

            <hr>

            {{-- Listagem --}}
            @forelse($carros as $carro)
                <div class="card mb-3">
                    <div class="card-body">

                        <form action="{{ route('carros.update', $carro) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-2 align-items-center">
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
                                <div class="col-md-4">
                                    <input type="text" name="descricao" class="form-control" placeholder="descricao" value="{{ old('descricao') }}">
                                </div>
                                <div class="col-md-1 d-grid">
                                    <button class="btn btn-success" type="submit">Salvar</button>
                                </div>
                            </div>

                            <div class="text-muted small mt-2">
                                #{{ $carro->id }} • Cadastrado em {{ $carro->created_at->format('d/m/Y H:i') }}
                            </div>
                        </form>

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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>