@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-violet-800 text-white">
            <h1 class="mb-0">Criar Local</h1>
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
                    <button  class="button-add">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <br>
    <div class="card-conteiner">
        @foreach($locais as $local)
        
            <div class="card-card">
                <div class="card-heder">{{ $local->nome }}</div>
                    <div class="card-bodi">
                      <p>Endereço MAC: {{ $local->aparelho_mac }}</p>
                      <!-- Outras informações do local -->
                    </div>
                      <!-- Botões de Editar e Excluir -->
                    <div class="card-foter">
                      <a href="{{ route('local.edit', ['local' => $local->id]) }}" >
                        <img src="{{ asset('img/editar.png') }}" alt="Editar" class="foter-img">
                      </a>

                      <form action="{{ route('local.destroy', ['local' => $local->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" >
                            <img src="{{ asset('img/excluir.png') }}" alt="" class="foter-img">
                        </button>
                     </form>
                    </div>
                
            </div>
            
        
        @endforeach
    </div>
</div>
@endsection