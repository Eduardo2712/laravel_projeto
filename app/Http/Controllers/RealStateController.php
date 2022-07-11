<?php

namespace App\Http\Controllers;

use App\Api\ApiMessage;
use App\Http\Requests\RealStateRequest;
use App\Models\RealState;
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

    public function show($id)
    {
        try {
            $realState = $this->realState->findOrFail($id);

            return response()->json([
                "data" => [
                    "msg" => "Imóvel atualizado com sucesso!",
                    "data" => $realState,
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function store(RealStateRequest $request)
    {
        $data = $request->all();
        $images = $request->file("images");
        try {
            $realState = $this->realState->create($data);
            if (isset($data["categories"]) && count($data["categories"]) > 0) {
                $realState->categories()->sync($data["categories"]);
            }
            if ($images) {
                $imagesUpload = [];
                foreach ($images as $image) {
                    $path = $image->store("images", "public");
                    $imagesUpload[] = [
                        "photo" => $path,
                        "is_thumb" => false,
                    ];
                }
                $realState->photos()->createMany($imagesUpload);
            }
            return response()->json([
                "data" => [
                    "msg" => "Imóvel cadastrado com sucesso!"
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function update($id, RealStateRequest $request)
    {
        $data = $request->all();
        $images = $request->file("images");
        try {
            $realState = $this->realState->findOrFail($id);
            $realState->update($data);
            if (isset($data["categories"]) && count($data["categories"]) > 0) {
                $realState->categories()->sync($data["categories"]);
            }
            if ($images) {
                $imagesUpload = [];
                foreach ($images as $image) {
                    $path = $image->store("images", "public");
                    $imagesUpload[] = [
                        "photo" => $path,
                        "is_thumb" => false,
                    ];
                }
                $realState->photos()->createMany($imagesUpload);
            }
            return response()->json([
                "data" => [
                    "msg" => "Imóvel atualizado com sucesso!"
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function destroy($id)
    {
        try {
            $realState = $this->realState->findOrFail($id);
            $realState->delete();
            return response()->json([
                "data" => [
                    "mensagem" => "Imóvel removido com sucesso!"
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
