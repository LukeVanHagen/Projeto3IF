@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-800 text-white">
            <h1 class="mb-0">Editar Aluno</h1>
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

            <form action="{{ route('aluno.update', ['aluno' => $aluno->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <x-input-label for="nome" class="form-label">Nome do Aluno:</x-input-label>
                    <x-text-input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $aluno->nome) }}"/>
                </div>

                <div class="mb-3">
                    <x-input-label for="rfid" class="form-label">RFID do Aluno:</x-input-label>
                    <x-text-input type="text" name="rfid" id="rfid" class="form-control" value="{{ old('rfid', $aluno->rfid) }}"/>
                </div>

                <div class="mb-3">
                    <x-input-label for="turma_id" class="form-label">Turma do Aluno:</x-input-label>
                    <select name="turma_id" id="turma_id" class="form-control">
                        <option value="" selected disabled>Selecione a Turma</option>
                        @foreach($turmas as $turma)
                            <option value="{{ $turma->id }}" {{ $aluno->turma_id == $turma->id ? 'selected' : '' }}>
                                {{ $turma->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button class="button-add">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
