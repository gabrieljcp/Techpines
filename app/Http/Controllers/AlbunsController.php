<?php

namespace App\Http\Controllers;

use App\Models\Albuns;
use Illuminate\Http\Request;

class AlbunsController extends Controller
{
    public function criarAlbum(Request $request)
    {
        $album = Albuns::create($request->all());
        return response()->json($album, 201);
    }

    public function listarAlbuns()
    {
        $albuns = Albuns::all();
        return response()->json($albuns);
    }

    public function listarAlbum(Request $request)
    {
        $album = Albuns::where('name', $request->name)->first();

        if (!$album) {
            return response()->json(['message' => 'Album não encontrado'], 404);
        }
        
        return response()->json($album);
    }

    public function deletarAlbum(Request $request)
    {
        $album = Albuns::find($request->id);

        if (!$album) {
            return response()->json(['message' => 'Album não encontrado'], 404);
        }

        $album->delete();

        return response()->json(['message' => 'Álbum deletado com sucesso'], 200);
    }    
}
