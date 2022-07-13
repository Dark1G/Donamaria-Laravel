<?php

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

Route::get('/', 'PageController@index')->name("index");
Route::get("empresa", "PageController@empresa")->name("empresa");
Route::get("galeria", "PageController@galeria")->name("galeria");
Route::get("contactos", "PageController@contactos")->name("contactos");
Route::resource("pedido", "PedidoController");
Route::resource("comentario", "ComentarioController");
Route::resource("ementa", "EmentaController");
Route::resource("garrafeira", "GarrafeiraController");

Route::get('admin', 'PageController@admin')->name("admin");
Route::group(['prefix' => 'admin'], function() {
	Route::resource("utilizador", "UserController");
	Route::resource("adminementa", "AdminEmentaController");
	Route::resource("admingarrafeira", "AdminGarrafeiraController");
	Route::resource("adminpedido", "AdminPedidoController");
	Route::resource("admincomentario", "AdminComentarioController");
});
Auth::routes();