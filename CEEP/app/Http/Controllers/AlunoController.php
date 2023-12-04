<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoController extends Controller
{
    public function create()
    {
        $alunos = Aluno::with('turma')->get();
        $turmas = Turma::all();
        return view('aluno.create', compact('alunos', 'turmas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'rfid' => 'required|string',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        Aluno::create($data);

        return redirect()->route('aluno.create')->with('success', 'Aluno criado com sucesso.');
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        $turmas = Turma::all();
        return view('aluno.edit', compact('aluno', 'turmas'));
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string',
            'rfid' => 'required|string',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $aluno->update($data);

        return redirect()->route('aluno.create')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('aluno.create')->with('success', 'Aluno excluído com sucesso.');
    }
}
