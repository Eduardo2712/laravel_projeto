<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsuariosCollection;
use App\Http\Resources\UsuariosResource;
use App\Models\Usuarios;
use App\Repository\UsuariosRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UsuariosController extends BaseController
{
    private $usuario;

    public function __construct(Usuarios $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuario;
        $usuariosRepository = new UsuariosRepository($usuarios);
        if ($request->has("conditions")) {
            $usuariosRepository->selectConditions($request->get("conditions"));
        }
        if ($request->has("fields")) {
            $usuariosRepository->selectFilter($request->get("fields"));
        }
        return new UsuariosCollection($usuariosRepository->getResult()->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = $this->usuarios->find($id);
        return new UsuariosResource($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
