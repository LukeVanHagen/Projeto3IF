<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Aluno;
use App\Models\User;
use Carbon\Carbon;

class RegistroController extends Controller
{
    public function index()
    {
        // Buscar todos os registros
        $registros = Registro::all();

        // Criar uma coleção para armazenar os dados formatados
        $dadosFormatados = $registros->map(function ($registro) {
            // Verificar se o RFID pertence a um aluno ou professor
            $entidade = null;

            // Verificar o tipo para determinar a tabela a ser consultada
            switch ($registro->tipo) {
                case 'aluno':
                    $entidade = Aluno::where('rfid', $registro->rfid)->first();
                    break;
                case 'usuario':
                    $entidade = User::where('rfid', $registro->rfid)->first();
                    break;
                // Adicione outros casos conforme necessário
            }

            // Adicionar informações formatadas à coleção
            return [
                'nome' => $entidade ? $entidade->nome : 'Desconhecido',
                'tipo' => $registro->tipo,
                'turma' => $entidade instanceof Aluno ? $entidade->turma : null,
                'local' => $registro->local->nome,
                'dia_hora' => ($registro->data_hora instanceof Carbon) ? $registro->data_hora->format('d/m/Y H:i:s') : $registro->data_hora,
            ];
        });

        // Retornar os dados formatados
        return view('registro.index', compact('dadosFormatados'));
    }
}
