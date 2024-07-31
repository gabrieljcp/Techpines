<?php

namespace App\Http\Controllers;

use App\Models\Albuns;
use App\Models\Faixas;
use Illuminate\Http\Request;

class FaixasController extends Controller
{
    public function criarFaixa(Request $request)
    {
        $faixa = Faixas::create($request->all());
        return response()->json($faixa, 201);
    }

    public function listarFaixas(Request $request)
    {
        $album_id = $request->album_id;
        $faixas = Faixas::where('album_id', $album_id)->get();
        return response()->json($faixas);
    }

    public function listarTodasFaixas()
    {
        $faixas = Faixas::all();
    
        $albumIds = $faixas->pluck('album_id');

        $albuns = Albuns::whereIn('id', $albumIds)->pluck('name', 'id');
    
        $faixas = $faixas->map(function($faixa) use ($albuns) {
            return [
                'id' => $faixa->id,
                'name' => $faixa->name,
                'album_id' => $faixa->album_id,
                'album_name' => $albuns[$faixa->album_id] ?? 'Álbum não encontrado'
            ];
        });
    
        return response()->json($faixas)->header('Content-Type', 'application/json');

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
