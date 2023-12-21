<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;
use App\Models\Registro;
use App\Models\Horario;
use Carbon\Carbon;
use PhpMqtt\Client\Facades\MQTT;

class RFIDController extends Controller
{
    public function processarRFID(Request $request)
    {
        $rfid = $request->input('rfid');
        $localId = $request->input('localId');
    
        info("RFID recebido: $rfid");
    
        $aluno = Aluno::where('rfid', $rfid)->first();
    
        info("Aluno encontrado: " . json_encode($aluno));
    
        if ($aluno) {
            info("Verificando horário para aluno: {$aluno->nome}");
            if ($this->verificarHorario($aluno)) {
                $this->registrarAcesso($rfid, $localId);

                // Publica no MQTT para o tópico específico do ambiente
                MQTT::publish("rfid-validation-local-$localId", json_encode([
                    'rfid' => $rfid,
                    'authorized' => true, // Modifique de acordo com a lógica de autorização
                    // Outros dados necessários podem ser incluídos
                ]));

                return response()->json(['message' => "Aluno {$aluno->nome} autorizado"]);
            } else {
                return response()->json(['message' => "A turma do aluno não possui horário disponibilizado para este momento"], 403);
            }
        }
    
        $user = User::where('rfid', $rfid)->first();
    
        info("Usuário encontrado: " . json_encode($user));
    
        if ($user) {
            $this->registrarAcesso($rfid, $localId);
            // Publica no MQTT para o tópico específico do ambiente
            MQTT::publish("rfid-validation-local-$localId", json_encode([
                'rfid' => $rfid,
                'authorized' => true, // Modifique de acordo com a lógica de autorização
                // Outros dados necessários podem ser incluídos
            ]));
            return response()->json(['message' => "Usuário {$user->name} autorizado"]);
        }
    
        return response()->json(['message' => 'Usuário não autorizado'], 403);
    }
    
    private function verificarHorario($aluno)
    {
        $diaAtual = $this->getDiaAtual();
        $horaAtual = date('H:i');
        info("Hora Atual: ".$horaAtual);

        if ($horaAtual >= '06:00' && $horaAtual < '12:00') {
            $periodoAtual = 'manha';
        } elseif ($horaAtual >= '12:00' && $horaAtual < '18:00') {
            $periodoAtual = 'tarde';
        } else {
            info("Acesso negado. Fora do horário permitido para a turma do aluno.");
            return response()->json(['message' => 'Acesso negado. Fora do horário permitido para sua turma.'], 403);
        }

        // Obtenha a consulta SQL gerada
        $consultaSQL = Horario::where([
            'turma_id' => $aluno->turma_id,
            'dia' => $diaAtual,
            'periodo' => $periodoAtual,
        ])->toSql();

        // Exiba a consulta SQL (você pode usar info(), dd(), ou outra maneira de sua preferência)
        info("Consulta SQL: " . $consultaSQL);

        // Execute a consulta e obtenha o resultado
        $horario = Horario::where([
            'turma_id' => $aluno->turma_id,
            'dia' => $diaAtual,
            'periodo' => $periodoAtual,
        ])->first();

        return $horario !== null;
    }

    private function getDiaAtual()
    {
        // Obtém o nome do dia da semana em português
        $diaAtual = Carbon::now()->locale('pt_BR')->dayName;
    
        // Adicione esta linha para exibir o valor de $diaAtual
        info("Dia Atual: " . $diaAtual);
    
        // Mapeia o nome do dia para o formato esperado pela enumeração
        $mapeamentoDias = [
            'segunda-feira' => 'Segunda',
            'terça-feira' => 'Terca',
            'quarta-feira' => 'Quarta',
            'quinta-feira' => 'Quinta',
            'sexta-feira' => 'Sexta',
            'sábado' => 'Sábado',
            'domingo' => 'Domingo',
        ];
    
        // Converte o nome do dia para o formato esperado pela enumeração
        $diaFormatado = $mapeamentoDias[strtolower($diaAtual)];
        info("Dia Formatado:".$diaFormatado);
        return $diaFormatado;
    }
    
    private function registrarAcesso($rfid, $localId)
    {
        // Verificar se o RFID pertence a um aluno
        $aluno = Aluno::where('rfid', $rfid)->first();
    
        // Verificar se o RFID pertence a um usuário (caso não seja um aluno)
        $user = $aluno ? null : User::where('rfid', $rfid)->first();
    
        // Determinar o tipo (aluno, usuário ou desconhecido)
        $tipo = $aluno ? 'aluno' : ($user ? 'usuario' : 'desconhecido');
    
        // Registre o acesso na tabela de registros com o tipo
        Registro::create([
            'rfid' => $rfid,
            'data_hora' => now(),
            'local_id' => $localId,
            'tipo' => $tipo,
        ]);
    }
}
