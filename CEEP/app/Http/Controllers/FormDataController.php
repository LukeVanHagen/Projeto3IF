<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'card_data' => 'required|string',
        ]);

        // Criação dos dados do formulário
        $formData = FormData::create([
            'user_id' => $request->user_id,
            'card_data' => $request->card_data,
        ]);

        return response()->json(['message' => 'Data stored successfully', 'data' => $formData]);
    }

    public function index()
    {
        // Recuperação de todos os dados do formulário
        $formData = FormData::all();

        return response()->json(['data' => $formData]);
    }
}

