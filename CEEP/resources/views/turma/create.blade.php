@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-600 text-white">
            <h1 class="mb-0">Criar turma</h1>
            <a href="{{ route('alunos.create') }}">Cadastrar Aluno</a>
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

                <div class="text-end">
                    <x-primary-button type="submit" class="btn btn-primary">Salvar</x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <br>

    @foreach($turmas as $turma)
        <div class="card">
            <div class="card-header  bg-violet-200">{{ $turma->nome }}</div>
            <div class="card-body">

                <!-- Botões de Editar e Excluir -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('turma.edit', ['turma' => $turma->id]) }}" class="btn btn-warning mx-2">
                        <i class="fa fa-pencil"></i> Editar
                    </a>

                    <form action="{{ route('turma.destroy', ['turma' => $turma->id]) }}" method="POST">
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
</div>
@endsection
