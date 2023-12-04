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

    public function edit($id)
    {
        $local = Local::findOrFail($id);
        return view('local.edit', compact('local'));
    }

    public function update(Request $request, $id)
    {
        $local = Local::findOrFail($id);
        $data = $request->validate([
            'aparelho_mac' => 'required|string',
            'nome' => 'required|string',
        ]);

        $local->update($data);

        return redirect()->route('local.create')->with('success', 'Local atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $local = Local::findOrFail($id);
        $local->delete();

        return redirect()->route('local.create')->with('success', 'Local excluído com sucesso.');
    }
}
