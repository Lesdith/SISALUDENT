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






Auth::routes();
// en las siguientes rutas si no esta logeado mandar a login
Route::group(['middleware' => ['auth']], function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
});
// Route::get('/register', function () {
//     return view('home');
// });

//Rutas de la agenda
Route::resource('events', 'EventsController');
// Route::get('events', 'EventsController@index');
// Route::post('events', 'EventsController@addEvent');


//Rutas de  Tooth
Route::get('get-teeth', 'TeethController@getTeeth');
Route::get('get-tooth/{id}', 'TeethController@getTooth')->name('get-tooth');
Route::resource('teeth', 'TeethController');

//Rutas del modelo Tooth_position
Route::resource('tooth_positions', 'ToothPositionsController');
Route::get('get-tooth_positions', 'ToothPositionsController@getToothPosition');

//Rutas de Tooth_stage
Route::resource('tooth_stages', 'ToothStagesController');
Route::get('get-tooth_stages', 'ToothStagesController@getToothStage');

//Rutas de Tooth_type
Route::resource('tooth_types', 'ToothTypesController');
Route::get('get-tooth_types', 'ToothTypesController@getToothType');

//Rutas del paciente
Route::resource('patients', 'PatientsController');
Route::get('get-patients',  'PatientsController@getPatients');
//Ruta en pacientes para obtener género
Route::get('get-genders', 'PatientsController@getGender');
//Ruta en paciente para obtener localidad
Route::get('get-locations', 'PatientsController@getLocation');
//Ruta en pacientes para obtener municipio
Route::get('get-municipalities', 'PatientsController@getMunicipality');

});
