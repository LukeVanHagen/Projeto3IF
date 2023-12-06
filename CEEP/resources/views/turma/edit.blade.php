@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-800 text-white">
            <h1 class="mb-0">Editar Turma</h1>
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

            <form action="{{ route('turma.update', ['turma' => $turma->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <x-input-label for="nome" class="form-label">Nome da Turma:</x-input-label>
                    <x-text-input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $turma->nome) }}"/>
                </div>

                <div class="text-end">
                    <button class="button-add" >Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
