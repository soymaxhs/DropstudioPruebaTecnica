<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categorias::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categorias;

        $categoria->nombre = $request->nombre;

        return $categoria->save();

        return response()->json(['success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categoria_id)
    {
        return Categorias::findOrFail($categoria_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categoria_id)
    {
        $categoria = Categorias::findOrFail($categoria_id);

        $categoria->nombre = $request->nombre;

        return $categoria->save();

        return response()->json(['success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria_id)
    {
        $categoria = Categorias::findOrFail($categoria_id);
        return $categoria->delete();
    }

    public function getProductos($producto_id)
    {
        $categoria = Categorias::findOrFail($producto_id);
        return $categoria->productos();
    }
}
