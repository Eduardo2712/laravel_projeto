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
        $anuncios = [];
        if (!is_numeric($id)) {
            return response()->json([
                "mensagem" => "Id deve ser um número",
                "anuncios" => $anuncios,
                "sucesso" => false,
            ], 400);
        } else if (intval($id) < 1) {
            return response()->json([
                "mensagem" => "Id deve ser um número maior que 0",
                "anuncios" => $anuncios,
                "sucesso" => false,
            ], 400);
        }
        $anuncios = DB::table(DB::raw("anuncios as a"))->select("a.id", "a.id_usuario", "a.titulo", "a.descricao", "a.ativo", "a.data_criado", "a.data_atualizado", "a.id_tipo_anuncio", "a.bairro", "a.cep", "a.complemento", "a.numero", "a.rua", "a.cidade", "a.estado")->where("a.id", "=", $id)->first();
        // $anuncios["tipo_anuncios"] = DB::table(DB::raw("tipo_anuncios as t"))->select("t.id", "t.nome")->where("t.id", "=", $id)->first();
        return response()->json([
            "mensagem" => "",
            "anuncios" => $anuncios,
            "sucesso" => true,
        ], 200);
    }
}
