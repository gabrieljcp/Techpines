<?php

namespace App\Http\Controllers;

use App\Models\Faixas;
use Illuminate\Http\Request;

class FaixasController extends Controller
{
    public function criarFaixa(Request $request)
    {
        $faixa = Faixas::create($request->all());
        return response()->json($faixa, 201);
    }

    public function listarFaixas()
    {
        $faixas = Faixas::all();
        return response()->json($faixas);
    }

    public function listarFaixa(Request $request)
    {
        $faixa = Faixas::where('name', $request->name)->first();

        if (!$faixa) {
            return response()->json(['message' => 'Faixa não encontrada'], 404);
        }

        return response()->json($faixa);
    }

    public function deletarFaixa(Request $request)
    {
        $faixa = Faixas::find($request->id);

        if (!$faixa) {
            return response()->json(['message' => 'Faixa não encontrada'], 404);
        }

        $faixa->delete();
        return response()->json(['message' => 'Faixa deletada com sucesso']);
    }
}
