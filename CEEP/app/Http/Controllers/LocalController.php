<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{

        public function create()
    {
        $locais = Local::all();
        return view('local.create', compact('locais'));
    }
    public function store(Request $request)
{
    $data = $request->validate([
        'aparelho_mac' => 'required|string',
        'nome' => 'required|string',
    ]);

    Local::create($data);

    return redirect()->route('local.create')->with('success', 'Local criado com sucesso.');
}

}
