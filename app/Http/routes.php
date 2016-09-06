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

Route::group(['middleware' => 'auth'], function () {
    Route::get("busquedas/getData",["as" => "busquedas.getData","uses" => "Api\ApiControllerBusqueda@getData"]);
    Route::resource('busquedas', 'ControllerBusqueda');



});

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::get('api/v1/hecho/getFields',['as' => 'api.v1.hecho.getFields','uses' => 'Api\Mysql\HechoController@getFields']);
        Route::resource('hecho','Api\Mysql\HechoController');

        Route::get('api/v1/personas/getFields',['as' => 'api.v1.personas.getFields','uses' => 'Api\Mysql\PersonasController@getFields']);
        Route::resource('personas','Api\Mysql\PersonasController');
        Route::resource('delito','Api\Mysql\DelitoController');
        Route::resource('codpenal','Api\Mysql\CodpenalController');
    });
});



