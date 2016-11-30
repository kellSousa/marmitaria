<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
	    return view('welcome');
	});
	Route::auth();
	Route::get('/home', 'HomeController@index');
	Route::get('/negado', 'HomeController@negado');

	Route::group(['middleware' => ['auth']], function(){

		Route::get('/cliente'			, 'ClienteController@index');
		Route::post('/cliente'			, 'ClienteController@index');
		Route::get('/cliente/create'	, 'ClienteController@create');
		Route::post('/cliente/edit'		, 'ClienteController@edit');
		Route::post('/cliente/show'		, 'ClienteController@show');
		Route::post('/cliente/delete'	, 'ClienteController@delete');
		Route::post('/cliente/create'	, 'ClienteController@store');
		Route::post('/cliente/editado'	, 'ClienteController@update');

		Route::get('/pedido'				, 'PedidoController@index');
		Route::post('/pedido'				, 'PedidoController@index');
		Route::get('/pedido/selCliente'		, 'PedidoController@selCliente');
		Route::get('/pedido/addCliente'	, 'PedidoController@addCliente');
		Route::post('/pedido/addCliente'	, 'ClienteController@store');
		Route::post('/pedido/create'		, 'PedidoController@create');
		Route::post('/pedido/edit'			, 'PedidoController@edit');
		Route::post('/pedido/show'			, 'PedidoController@show');
		Route::get('/pedido/addPedido'		, 'PedidoController@addPedido');
		Route::post('/pedido/delete'		, 'PedidoController@delete');
		Route::post('/pedido/criado'		, 'PedidoController@store');
		Route::post('/pedido/altualizado'	, 'PedidoController@atualizaValores');
		Route::post('/pedido/finalizado'	, 'PedidoController@finalizar');
		Route::post('/pedido/editado'		, 'PedidoController@update');

		
	});

	Route::group(['middleware' => ['auth', 'admin']], function(){

		Route::get('/empresa'				, 'EmpresaController@index');
		Route::post('/empresa'				, 'EmpresaController@index');
		Route::get('/empresa/create'		, 'EmpresaController@create');
		Route::post('/empresa/edit'			, 'EmpresaController@edit');
		Route::post('/empresa/show'			, 'EmpresaController@show');
		Route::post('/empresa/delete'		, 'EmpresaController@delete');
		Route::post('/empresa/addEntregador', 'EmpresaController@addEntregador');
		Route::post('/empresa/create'		, 'EmpresaController@store');
		Route::post('/empresa/editado'		, 'EmpresaController@update');

		Route::get('/entregador'			, 'EntregadorController@index');
		Route::post('/entregador'			, 'EntregadorController@index');
		Route::get('/entregador/create'	    , 'EntregadorController@create');
		Route::post('/entregador/edit'		, 'EntregadorController@edit');
		Route::post('/entregador/show'		, 'EntregadorController@show');
		Route::post('/entregador/delete'	, 'EntregadorController@delete');
		Route::post('/entregador/create'	, 'EntregadorController@store');
		Route::post('/entregador/editado'	, 'EntregadorController@update');

		Route::get('/produto'				, 'ProdutoController@index');
		Route::post('/produto'				, 'ProdutoController@index');
		Route::get('/produto/create'		, 'ProdutoController@create');
		Route::post('/produto/edit'			, 'ProdutoController@edit');
		Route::post('/produto/show'			, 'ProdutoController@show');
		Route::post('/produto/delete'		, 'ProdutoController@delete');
		Route::post('/produto/create'		, 'ProdutoController@store');
		Route::post('/produto/editado'		, 'ProdutoController@update');

});