@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-600 text-white">
            <h1 class="mb-0">Cadastrar Aluno</h1>
            <a href="{{ route('alunos.create') }}">Criar Aluno</a>
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

            <form action="{{ route('aluno.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <x-input-label for="nome" class="form-label">Nome do Aluno:</x-input-label>
                    <x-text-input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}"/>
                </div>

                <div class="mb-3">
                    <x-input-label for="rfid" class="form-label">RFID do Aluno:</x-input-label>
                    <x-text-input type="text" name="rfid" id="rfid" class="form-control" value="{{ old('rfid') }}"/>
                </div>

                <div class="mb-3">
                    <x-input-label for="turma_id" class="form-label">Turma do Aluno:</x-input-label>
                    <select name="turma_id" id="turma_id" class="form-control">
                        <option value="" selected disabled>Selecione a Turma</option>
                        @foreach($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <x-primary-button type="submit" class="btn btn-primary">Salvar</x-primary-button>
                </div>
            </form>

            <hr>

            <h2>Alunos Cadastrados</h2>

            @if ($alunos->isEmpty())
                <p>Nenhum aluno cadastrado ainda.</p>
            @else
                @foreach($alunos as $aluno)
                    <div class="card">
                        <div class="card-header bg-violet-200">{{ $aluno->nome }}</div>
                        <div class="card-body">
                            <p>RFID: {{ $aluno->rfid }}</p>
                            <p>Turma: {{ $aluno->turma->nome }}</p>
                            
                            <!-- Botões de Editar e Excluir -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('aluno.edit', ['aluno' => $aluno->id]) }}" class="btn btn-warning mx-2">
                                    <i class="fa fa-pencil"></i> Editar
                                </a>
        
                                <form action="{{ route('aluno.destroy', ['aluno' => $aluno->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
