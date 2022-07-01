<?php

namespace App\Http\Controllers;

use App\Models\Anuncios;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AnunciosController extends BaseController
{
    private $anuncios;

    public function __construct(Anuncios $anuncios)
    {
        $this->anuncios = $anuncios;
    }

    public function index()
    {
        $dados = array(
            "anuncios" => $this->anuncios->getAnuncios(),
        );
        return view("index", $dados);
    }

    public function getAnuncios()
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

    public function setAnuncios(Request $request)
    {
        $data = $request->all();
        $anuncios = $this->anuncios->create($data);
        return response()->json($anuncios);
    }

    public function atualizarAnunciosId(Request $request)
    {
        $data = $request->all();
        // $anuncios = $this->anuncios->getAnunciosId($data["id"]);
        $anuncios = $this->anuncios->find($data["id"]);
        $anuncios->update($data);
        return response()->json($anuncios);
    }

    public function excluirAnunciosId($id)
    {
        $anuncios = $this->anuncios->find($id);
        $anuncios->delete();
        return response()->json(["data" => ["mensagem" => "Produto removido com sucesso"]]);
    }
}
