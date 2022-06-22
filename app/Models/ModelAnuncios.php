<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAnuncios extends Model
{
    public function getAnuncios()
    {
        return DB::table("anuncios")->select("anuncios.*", DB::raw("UPPER(anuncios.titulo) AS titulo"), DB::raw("UPPER(anuncios.descricao) AS descricao"), DB::raw("UPPER(usuarios.nome) AS nome"))->join("usuarios", "anuncios.id_usuario", "=", "usuarios.id")->orderBy("usuarios.nome")->get();
    }

    public function getAnunciosId($id)
    {
        if (!is_numeric($id)) {
            return response()->json([
                "mensagem" => "Id deve ser um número",
                "sucesso" => false,
            ], 400);
        } else if (intval($id) < 1) {
            return response()->json([
                "mensagem" => "Id deve ser um número maior que 0",
                "sucesso" => false,
            ], 400);
        }
        return DB::table("anuncios")->join("usuarios", "anuncios.id_usuario", "=", "usuarios.id")->leftJoin("imagens", "anuncios.id", "=", "imagens.id_anuncio")->where("anuncios.id", $id)->get();
    }
}
