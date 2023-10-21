@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Local</h1>
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
        <div class="form-group">
            <label for="aparelho_mac">Aparelho MAC:</label>
            <input type="text" name="aparelho_mac" id="aparelho_mac" class="form-control" value="{{ old('aparelho_mac') }}">
        </div>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
