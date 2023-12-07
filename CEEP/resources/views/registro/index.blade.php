@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-600 text-white">
            <h1 class="mb-0">Lista de Registros</h1>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse($dadosFormatados as $registro)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-0">{{ $registro['nome'] }}</h5>
                                <p class="mb-0">Tipo: {{ $registro['tipo'] }}</p>
                                <p class="mb-0">Turma: {{ $registro['turma']->nome ?? 'N/A' }}</p>
                                <p class="mb-0">Local: {{ $registro['local'] }}</p>
                                <p class="mb-0">Data/Hora: {{ $registro['dia_hora'] }}</p>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">Nenhum registro encontrado.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
