<?php

use PHPUnit\Framework\MockObject\Generator;
use IntelGUA\Generators\Generate;

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


/** Ejemplo para agregar la ruta de la loteria Henry
 *   Route::get('generar', function (){
 *       $numeros = new Generate();
 *       $lista = $numeros->getNumbersGenerated(50000, true, 7);
 *           for ($i=1; $i < count($lista); $i++) {
 *               echo $lista[$i] . "<br/>";
 *           }
 *   });*/





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
});

Route::get('get-teeth', 'TeethController@getTeeth');
Route::get('get-tooth/{id}', 'TeethController@getTooth')->name('get-tooth');
    Route::post('teeth'                , 'TeethController@store');
    Route::post('teeth/{tooth}'     , 'TeethController@update');
    Route::get('teeth/{tooth}/edit' , 'TeethController@edit');
    Route::post('teeth/{tooth}'     , 'TeethController@destroy')->name('eliminar');
Route::resource('teeth', 'TeethController');


Route::resource('tooth_positions', 'ToothPositionsController');
Route::get('get-tooth_positions', 'ToothPositionsController@getToothPosition');


Route::resource('tooth_stages', 'ToothStagesController');
Route::get('get-tooth_stages', 'ToothStagesController@getToothStage');


Route::resource('tooth_types', 'ToothTypesController');
Route::get('get-tooth_types', 'ToothTypesController@getToothType');


Auth::routes();
// en las siguientes rutas si no esta logeado mandar a login
Route::group(['middleware' => ['auth']], function () {

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
