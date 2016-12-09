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
		Route::get('/cliente_create'	, 'ClienteController@create');
		Route::post('/cliente_edit'		, 'ClienteController@edit');
		Route::post('/cliente_show'		, 'ClienteController@show');
		Route::post('/cliente_delete'	, 'ClienteController@delete');
		Route::post('/cliente_create'	, 'ClienteController@store');
		Route::post('/cliente_editado'	, 'ClienteController@update');

		Route::get('/pedido'				, 'PedidoController@index');
		Route::post('/pedido'				, 'PedidoController@index');
		Route::get('/pedido_selCliente'		, 'PedidoController@selCliente');
		Route::get('/pedido_addCliente'		, 'PedidoController@addCliente');
		Route::post('/pedido_addCliente'	, 'ClienteController@store');
		Route::post('/pedido_create'		, 'PedidoController@create');
		Route::post('/pedido_show'			, 'PedidoController@show');
		Route::get('/pedido_addPedido'		, 'PedidoController@addPedido');
		Route::post('/pedido_criado'		, 'PedidoController@store');
		Route::post('/pedido_altualizado'	, 'PedidoController@atualizaValores');
		Route::post('/pedido_finalizado'	, 'PedidoController@finalizar');
		Route::post('/pedido_editado'		, 'PedidoController@update');

		
	});

	Route::group(['middleware' => ['auth', 'admin']], function(){
		Route::get('/registe'				, 'UserController@register');
		Route::post('/registe'				, 'UserController@store');

		Route::get('/empresa'				, 'EmpresaController@index');
		Route::post('/empresa'				, 'EmpresaController@index');
		Route::get('/empresa_create'		, 'EmpresaController@create');
		Route::post('/empresa_edit'			, 'EmpresaController@edit');
		Route::post('/empresa_show'			, 'EmpresaController@show');
		Route::post('/empresa_delete'		, 'EmpresaController@delete');
		Route::post('/empresa_addEntregador', 'EmpresaController@addEntregador');
		Route::post('/empresa_create'		, 'EmpresaController@store');
		Route::post('/empresa_editado'		, 'EmpresaController@update');

		Route::get('/entregador'			, 'EntregadorController@index');
		Route::post('/entregador'			, 'EntregadorController@index');
		Route::get('/entregador_create'	    , 'EntregadorController@create');
		Route::post('/entregador_edit'		, 'EntregadorController@edit');
		Route::post('/entregador_show'		, 'EntregadorController@show');
		Route::post('/entregador_delete'	, 'EntregadorController@delete');
		Route::post('/entregador_create'	, 'EntregadorController@store');
		Route::post('/entregador_editado'	, 'EntregadorController@update');
		Route::get('/entregador_entregas'	, 'EntregadorController@entregas');
		Route::post('/entregador_entregas'	, 'EntregadorController@buscaEntregas');
		

		Route::get('/produto'				, 'ProdutoController@index');
		Route::post('/produto'				, 'ProdutoController@index');
		Route::get('/produto_create'		, 'ProdutoController@create');
		Route::post('/produto_edit'			, 'ProdutoController@edit');
		Route::post('/produto_show'			, 'ProdutoController@show');
		Route::post('/produto_delete'		, 'ProdutoController@delete');
		Route::post('/produto_create'		, 'ProdutoController@store');
		Route::post('/produto_editado'		, 'ProdutoController@update');

});