<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::apiResource('/productos',ProductosController::class);
Route::apiResource('/categorias',CategoriasController::class);

Route::get('/productos/{id}/categorias', [ProductosController::class, 'getCategorias']);
Route::get('/categorias/{id}/productos', [CategoriasController::class, 'getProductos']);