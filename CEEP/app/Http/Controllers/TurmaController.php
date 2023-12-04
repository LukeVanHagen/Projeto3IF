<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{
    public function create()
    {
        $turmas = Turma::all();
        return view('turma.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
        ]);

        Turma::create($data);

        return redirect()->route('turma.create')->with('success', 'Turma criada com sucesso.');
    }

    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        return view('turma.edit', compact('turma'));
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string',
        ]);

        $turma->update($data);

        return redirect()->route('turma.create')->with('success', 'Turma atualizada com sucesso.');
    }
    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turma.create')->with('success', 'turma excluído com sucesso.');
    }
}
