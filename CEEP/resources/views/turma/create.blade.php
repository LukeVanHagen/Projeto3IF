<!-- resources/views/turmas.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-800 text-white">
            <h1 class="mb-0">Criar turma</h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('turma.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <x-input-label for="nome" class="form-label">Nome:</x-input-label>
                    <x-text-input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}"/>
                </div>

                <div class="mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th> <!-- Célula vazia para alinhar com os checkboxes -->
                                @foreach(['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'] as $dia)
                                    <th>{{ ucfirst($dia) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Manhã</td>
                                @foreach(['manha'] as $periodo)
                                    @foreach(['Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'] as $dia)
                                        <td>
                                            <div class="form-check d-inline-block">
                                                <input type="checkbox" name="horarios[{{ $periodo }}][{{ $dia }}]" class="form-check-input" id="{{ $periodo }}-{{ $dia }}">
                                            </div>
                                        </td>
                                    @endforeach
                                @endforeach
                            </tr>
                            <tr>
                                <td>Tarde</td>
                                @foreach(['tarde'] as $periodo)
                                    @foreach(['Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'] as $dia)
                                        <td>
                                            <div class="form-check d-inline-block">
                                                <input type="checkbox" name="horarios[{{ $periodo }}][{{ $dia }}]" class="form-check-input" id="{{ $periodo }}-{{ $dia }}">
                                            </div>
                                        </td>
                                    @endforeach
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Adicionar para os outros dias e horários -->

                <div class="text-end">
                    <button  class="button-add">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <br>
        <div class="card-conteiner">
            @foreach($turmas as $turma)
                <div class="card-card">
                    <div class="card-heder text-center">{{ $turma->nome }}</div>
                    <div class="card-bodi">
                        <!-- Adicionar descrição da turma se quiser-->
                    </div>
                    <!-- Botões de Editar e Excluir -->
                    <div class="card-foter">
                        <a href="{{ route('turma.edit', ['turma' => $turma->id]) }}">
                            <img src="{{ asset('img/editar.png') }}" alt="Editar" class="foter-img">
                        </a>

                        <form action="{{ route('turma.destroy', ['turma' => $turma->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <img src="{{ asset('img/excluir.png') }}" alt="Excluir" class="foter-img">
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    
</div>
@endsection
