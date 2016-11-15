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

	Route::group(['middleware' => ['auth', 'admin']], function(){

		Route::get('/cliente'					, 'ClienteController@index');
		Route::post('/cliente'					, 'ClienteController@index');
		Route::get('/cliente/create'			, 'ClienteController@create');
		Route::get('/cliente/edit/{id}'			, 'ClienteController@edit');
		Route::get('/cliente/show/{id}'			, 'ClienteController@show');
		Route::get('/cliente/addPedido/{id}'	, 'ClienteController@addPedido');
		Route::post('/cliente/delete/{id}'		, 'ClienteController@delete');
		Route::post('/cliente/create'			, 'ClienteController@store');
		Route::post('/cliente/edit/{id}'		, 'ClienteController@update');

		Route::get('/pedido'					, 'PedidoController@index');
		Route::post('/pedido'					, 'PedidoController@index');
		Route::get('/pedido/selCliente'			, 'PedidoController@selCliente');
		Route::get('/pedido/addCliente'			, 'PedidoController@addCliente');
		Route::post('/pedido/addCliente'		, 'ClienteController@store');
		Route::get('/pedido/create/{id}'		, 'PedidoController@create');
		Route::get('/pedido/edit/{id}'			, 'PedidoController@edit');
		Route::get('/pedido/show/{id}'			, 'PedidoController@show');
		Route::get('/pedido/addPedido/{id}'		, 'PedidoController@addPedido');
		Route::post('/pedido/delete/{id}'		, 'PedidoController@delete');
		Route::post('/pedido/create/{id}'			, 'PedidoController@store');
		Route::post('/pedido/edit/{id}'			, 'PedidoController@update');

		
	});

	Route::group(['middleware' => ['auth', 'admin']], function(){

		Route::get('/empresa'					, 'EmpresaController@index');
		Route::post('/empresa'					, 'EmpresaController@index');
		Route::get('/empresa/create'			, 'EmpresaController@create');
		Route::get('/empresa/edit/{id}'			, 'EmpresaController@edit');
		Route::get('/empresa/show/{id}'			, 'EmpresaController@show');
		Route::post('/empresa/delete/{id}'		, 'EmpresaController@delete');
		Route::get('/empresa/addEntregador/{id}', 'EmpresaController@addEntregador');
		Route::post('/empresa/create'			, 'EmpresaController@store');
		Route::post('/empresa/edit/{id}'		, 'EmpresaController@update');

		Route::get('/entregador'					, 'EntregadorController@index');
		Route::post('/entregador'					, 'EntregadorController@index');
		Route::get('/entregador/create/{id}'	    , 'EntregadorController@create');
		Route::get('/entregador/edit/{id}'			, 'EntregadorController@edit');
		Route::get('/entregador/show/{id}'			, 'EntregadorController@show');
		Route::post('/entregador/delete/{id}'		, 'EntregadorController@delete');
		Route::post('/entregador/create/{id}'		, 'EntregadorController@store');
		Route::post('/entregador/edit/{id}'		    , 'EntregadorController@update');

		Route::get('/produto'					, 'ProdutoController@index');
		Route::post('/produto'					, 'ProdutoController@index');
		Route::get('/produto/create'			, 'ProdutoController@create');
		Route::get('/produto/edit/{id}'			, 'ProdutoController@edit');
		Route::get('/produto/show/{id}'			, 'ProdutoController@show');
		Route::post('/produto/delete/{id}'		, 'ProdutoController@delete');
		Route::post('/produto/create'			, 'ProdutoController@store');
		Route::post('/produto/edit/{id}'		, 'ProdutoController@update');

});