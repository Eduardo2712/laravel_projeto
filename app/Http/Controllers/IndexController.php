<?php

namespace App\Http\Controllers;

use App\Models\ModelAnuncios;
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
}
