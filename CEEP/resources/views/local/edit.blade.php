@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-800 text-white">
            <h1 class="mb-0">Editar Local</h1>
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

            <form action="{{ route('local.update', ['local' => $local->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <x-input-label for="aparelho_mac" class="form-label">Aparelho MAC:</x-input-label>
                    <x-text-input type="text" name="aparelho_mac" id="aparelho_mac" class="form-control" value="{{ old('aparelho_mac', $local->aparelho_mac) }}"/>
                </div>

                <div class="mb-3">
                    <x-input-label for="nome" class="form-label">Nome:</x-input-label>
                    <x-text-input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $local->nome) }}"/>
                </div>

                <div class="text-end">
                    <button class="button-add">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
