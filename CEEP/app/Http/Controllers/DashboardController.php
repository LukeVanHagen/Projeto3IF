<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class DashboardController extends Controller
{
    public function index()
    {
        // Consultar os registros da tabela
        $registros = Registro::all();

        // Retornar a visão com os registros
        return view('dashboard', ['registros' => $registros]);
    }
}
