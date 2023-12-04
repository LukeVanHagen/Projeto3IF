@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-violet-600 text-white">
                <h1 class="mb-0">Cadastrar Aluno</h1>
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

                <form method="post" action="{{ route('alunos.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="rfid" class="form-label">RFID:</label>
                        <input type="text" name="rfid" id="rfid" class="form-control" required>
                    </div>

                    <div class="mb-3">
                    <<div class="form-group">
    <label for="nome_turma">Nome da Turma:</label>
    <input type="text" name="nome_turma" id="nome_turma" class="form-control" required>
</div>


                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
