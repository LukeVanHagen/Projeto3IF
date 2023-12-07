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
        $dataBruta = $request->validate([
            'nome' => 'required|string',
            'horarios' => 'required|array',
            'horarios.manha' => 'nullable|array',
            'horarios.tarde' => 'nullable|array',
        ]);
    
        $turma = Turma::create([
            'nome' => $dataBruta['nome'],
        ]);
    
        $data = $this->transformarArray($dataBruta);
    
        $this->inserirHorarios($turma, $data);
    
        return redirect()->route('turma.create')->with('success', 'Turma criada com sucesso.');
    }
    
    public function inserirHorarios($turma, $novoArray)
    {
        foreach ($novoArray as $dia => $periodos) {
            foreach ($periodos as $periodo) {
                // Verifique se o valor do período é válido ('manha' ou 'tarde')
                if (in_array($periodo, ['manha', 'tarde'])) {
                    $turma->horarios()->create([
                        'dia' => $dia,
                        'periodo' => $periodo,
                    ]);
                }
            }
        }
    }
    
    public function transformarArray($array)
    {
        $novoArray = [];
    
        foreach ($array['horarios'] as $periodo => $dias) {
            foreach ($dias as $dia => $status) {
                // Verifique se o status é 'on' para adicionar ao novo array
                if ($status === 'on') {
                    // Crie um array associativo com o dia como chave e o período como valor
                    $novoArray[$dia][] = $periodo;
                }
            }
        }
    
        return $novoArray;
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
            'horarios' => 'required|array',
            'horarios.manha' => 'nullable|array',
            'horarios.tarde' => 'nullable|array',
        ]);

        $turma->update([
            'nome' => $data['nome'],
        ]);

        $dataHorarios = $this->transformarArray($data);
        $this->atualizarHorarios($turma, $dataHorarios);

        return redirect()->route('turma.create')->with('success', 'Turma atualizada com sucesso.');
    }

    public function atualizarHorarios($turma, $novoArray)
    {
        // Remover todos os horários existentes antes de adicionar os novos
        $turma->horarios()->delete();

        // Adicionar os novos horários
        foreach ($novoArray as $dia => $periodos) {
            foreach ($periodos as $periodo) {
                // Verifique se o valor do período é válido ('manha' ou 'tarde')
                if (in_array($periodo, ['manha', 'tarde'])) {
                    $turma->horarios()->create([
                        'dia' => $dia,
                        'periodo' => $periodo,
                    ]);
                }
            }
        }
    }
    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turma.create')->with('success', 'turma excluído com sucesso.');
    }
}
