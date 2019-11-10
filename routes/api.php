<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();

});



Route::namespace('API')->group(function(){

    Route::get('/front-page', 'ProdutoController@index')->name('front');

    $routes = [
        '/produtos' => 'ProdutoController',
        '/pedidos' => 'PedidoController',
        '/carrinhos' => 'CarrinhoController',
    ];
    //
    Route::apiResources($routes);
});
//



//
Route::namespace('API')->prefix('produtos')->name('produtos.')->group(function(){
    Route::get('/order-by/{param}/{order?}', 'ProdutoSearchController@listOrderBy')->name('list.orderBy');
    Route::get('/search/{param}', 'ProdutoSearchController@search')->name('search');
    Route::get('/search/{param}/{orderby}/{order?}', 'ProdutoSearchController@searchOrder')->name('search.order');
});


//
Route::namespace('API')->prefix('pedidos')->name('pedidos.')->group(function () {
    Route::get('/print-pdf/{pedido_id}', 'PedidoController@printPDF')->name('print.pdf');
});




