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



Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('teeth', 'TeethController');
Route::get('get-teeth', 'TeethController@getTeeth');
Route::post('teeth', 'TeethController@store');
Route::post('teeth/{tooth}', 'TeethController@update');
Route::get('teeth/{tooth}/edit', 'TeethController@edit');
Route::post('teeth/{tooth}', 'TeethController@destroy');


Route::resource('tooth_positions', 'ToothPositionsController');
Route::get('get-tooth_positions', 'ToothPositionsController@getToothPosition');
Route::post('tooth_positions', 'ToothPositionsController@store');
Route::post('tooth_positions/{tooth_position}', 'ToothPositionsController@update');
Route::get('tooth_positions/{tooth_position}/edit', 'ToothPositionsController@edit');
Route::post('tooth_positions/{tooth_position}', 'ToothPositionsController@destroy');


Route::resource('tooth_stages', 'ToothStagesController');
Route::get('get-tooth_stages', 'ToothStagesController@getToothStage');
Route::post('tooth_stages', 'ToothStagesController@store');
Route::post('tooth_stages/{tooth_stage}', 'ToothStagesController@update');
Route::get('tooth_stages/{tooth_stage}/edit', 'ToothStagesController@edit');
Route::post('tooth_stages/{tooth_stage}', 'ToothStagesController@destroy');

Route::resource('tooth_types', 'ToothTypesController');
Route::get('get-tooth_types', 'ToothTypesController@getToothType');
Route::post('tooth_types', 'ToothTypesController@store');
Route::post('tooth_types/{tooth_type}', 'ToothTypesController@update');
Route::get('tooth_types/{tooth_type}/edit', 'ToothTypesController@edit');
Route::post('tooth_types/{tooth_type}', 'ToothTypesController@destroy');


Auth::routes();
// en las siguientes rutas si no esta logeado mandar a login
Route::group(['middleware' => ['auth']], function () {

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
