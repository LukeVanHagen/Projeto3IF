<?php

// RFIDController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Registro;

class RFIDController extends Controller
{
    public function processarRFID(Request $request)
    {
        error_log('Método processarRFID chamado.');
        error_log('Dados recebidos do formulário externo: ' . print_r($request->all(), true));
        $rfid = $request->input('rfid');

        $request->validate([
            'rfid' => 'required|string',
        ]);

        // Verificar se o aluno com o RFID existe
        $aluno = Aluno::where('rfid', $request->rfid)->first();

        if ($aluno) {
            // Se o aluno existir, armazenar informações na tabela de registros
            Registro::create([
                'nome' => $aluno->nome,
                'turma' => $aluno->turma->nome,
                'horario' => now(), // Você pode ajustar conforme necessário
            ]);

            // Obter todos os registros (pode ajustar conforme necessário)
            $registros = Registro::all();

            // Responder ao script externo com os registros
            return response()->json(['status' => 'success', 'registros' => $registros]);
        }

        // Se o aluno não existir, responder ao script externo
        return response()->json(['status' => 'Aluno não encontrado'], 404);
    }
}
