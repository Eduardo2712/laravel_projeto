<?php

namespace App\Http\Controllers;

use App\Models\ModelAnuncios;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    public function __construct()
    {
        $this->anuncios = new ModelAnuncios();
    }

    public function index()
    {
        $dados = array(
            "anuncios" => $this->anuncios->getAnuncios(),
        );
        return view("index", $dados);
    }

    public function getAnuncios(Request $request)
    {
        $anuncios = $this->anuncios->getAnuncios();
        return response()->json([
            "anuncios" => $anuncios,
            "status" => "ok",
        ], 200);
    }

    public function getAnunciosId($id)
    {
        $anuncios = $this->anuncios->getAnunciosId($id);
        return response()->json([
            "anuncios" => $anuncios,
            "status" => "ok",
        ], 200);
    }
}
