<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAnuncios extends Model
{
    public function getAnuncios()
    {
        return DB::table("anuncios")->get();
    }

    public function getAnunciosId($id)
    {
        return DB::table("anuncios")->where("id", $id)->get();
    }
}
