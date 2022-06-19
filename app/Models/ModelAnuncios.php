<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAnuncios extends Model
{
    public function getAnuncios()
    {
        return DB::table("anuncios")->select(DB::raw("UPPER(anuncios.titulo) AS titulo"), DB::raw("UPPER(anuncios.descricao) AS descricao"), DB::raw("UPPER(usuarios.nome) AS nome"))->join("usuarios", "anuncios.id_usuario", "=", "usuarios.id")->orderBy("usuarios.nome")->get();
    }

    public function getAnunciosId($id)
    {
        return DB::table("anuncios")->where("id", $id)->get();
    }
}
