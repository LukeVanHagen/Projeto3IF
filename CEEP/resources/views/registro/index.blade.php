@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-600 text-white">
            <h1 class="mb-0">Lista de Registros</h1>
        </div>
        <div class="card-body">
            @if(count($dadosFormatados) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Turma</th>
                                <th scope="col">Local</th>
                                <th scope="col">Data/Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dadosFormatados as $registro)
                                <tr>
                                    <td>{{ $registro['nome'] }}</td>
                                    <td>{{ $registro['tipo'] }}</td>
                                    <td>{{ $registro['turma']->nome ?? 'N/A' }}</td>
                                    <td>{{ $registro['local'] }}</td>
                                    <td>{{ $registro['dia_hora'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Nenhum registro encontrado.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
