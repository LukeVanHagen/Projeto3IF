<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;
use App\Models\Registro;

class RFIDController extends Controller
{
    public function processarRFID(Request $request)
    {
        $rfid = $request->input('rfid');
        $localId = $request->input('localId'); // Adicionando a obtenção do ID do local
    
        info("RFID recebido: $rfid");
    
        // Verificar se o RFID corresponde a um aluno
        $aluno = Aluno::where('rfid', $rfid)->first();
    
        info("Aluno encontrado: " . json_encode($aluno));
    
        if ($aluno) {
            // Aluno autorizado
            $this->registrarAcesso($rfid, $localId);
            return response()->json(['message' => "Aluno {$aluno->nome} autorizado"]);
        }
    
        // Se não for aluno, verifique se é um usuário
        $user = User::where('rfid', $rfid)->first();
    
        info("Usuário encontrado: " . json_encode($user));
    
        if ($user) {
            // Usuário autorizado
            $this->registrarAcesso($rfid, $localId);
            return response()->json(['message' => "Usuário {$user->name} autorizado"]);
        }
    
        // RFID não encontrado
        return response()->json(['message' => 'Usuário não autorizado'], 403);
    }
    
    private function registrarAcesso($rfid, $localId)
    {
        // Registre o acesso na tabela de registros
        Registro::create([
            'rfid' => $rfid,
            'data_hora' => now(),
            'local_id' => $localId,
        ]);
    }
}
