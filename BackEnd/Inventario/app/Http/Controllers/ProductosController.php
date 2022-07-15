<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Productos_Categorias;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Productos::orderBy('id','DESC')->limit(10)->get(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Productos;

        $producto->sku = $request->sku;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->estado = $request->estado;
        $producto->imagen = $request->imagen;

        return $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show($producto_id)
    {
        return Productos::findOrFail($producto_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto_id)
    {
        $producto = Productos::findOrFail($producto_id);

        $producto->sku = $request->sku;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->estado = $request->estado;
        $producto->imagen = $request->imagen;

        return $producto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto_id)
    {
        $producto = Productos::findOrFail($producto_id);
        $producto->productosCategorias()->delete();
        $producto->delete();
        return response()->json(['message'=>'success'], 200);
    }

    public function getCategorias($producto_id) {
        $producto = Productos::findOrFail($producto_id);
        return $producto->categorias();
    }
}
