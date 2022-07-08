<?php

namespace App\Http\Controllers;

use App\Models\RealState;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class RealStateController extends BaseController
{
    private $realState;

    public function __construct(RealState $realState)
    {
        $this->realState = $realState;
    }

    public function index()
    {
        $realState = $this->realState->paginate(10);
        return response()->json($realState, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $realState = $this->realState->create($data);
            return response()->json([
                "data" => [
                    "msg" => "Imóvel cadastrado com sucesso!"
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
