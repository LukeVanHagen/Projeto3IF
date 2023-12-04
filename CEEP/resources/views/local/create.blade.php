@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-600 text-white">
            <h1 class="mb-0">Criar Local</h1>
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

            <form action="{{ route('local.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <x-input-label for="aparelho_mac" class="form-label">Aparelho MAC:</x-input-label>
                    <x-text-input type="text" name="aparelho_mac" id="aparelho_mac" class="form-control" value="{{ old('aparelho_mac') }}"/>
                </div>

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

    @foreach($locais as $local)
        <div class="card">
            <div class="card-header  bg-violet-200">{{ $local->nome }}</div>
            <div class="card-body">
                <p>Endereço MAC: {{ $local->aparelho_mac }}</p>
                <!-- Outras informações do local -->

                <!-- Botões de Editar e Excluir -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('local.edit', ['local' => $local->id]) }}" class="btn btn-warning mx-2">
                        <i class="fa fa-pencil"></i> Editar
                    </a>

                    <form action="{{ route('local.destroy', ['local' => $local->id]) }}" method="POST">
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
