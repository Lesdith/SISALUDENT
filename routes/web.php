<?php

use PHPUnit\Framework\MockObject\Generator;
use IntelGUA\Generators\Generate;



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
// Route::get('api', 'EventsController@api');
Route::get('get-events', 'EventsController@get_events');
// Route::post('events', 'EventsController@addEvent');
// Route::post('guardaEventos', array('as' => 'guardaEventos' ,'uses' => 'EventsController@create'));

//Rutas de  Tooth
Route::resource('teeth', 'TeethController');
Route::get('get-teeth', 'TeethController@getTeeth');
Route::get('get-tooth/{id}', 'TeethController@getTooth')->name('get-tooth');
//Route::get('show', 'TeethController@show');


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
