<?php

use PHPUnit\Framework\MockObject\Generator;
use IntelGUA\Generators\Generate;
use Caffeinated\Shinobi\Middleware;




Route::get('/register', function () {    return view('home');
});
Auth::routes();
// en las siguientes rutas si no esta logeado mandar a login
Route::group(['middleware' => ['auth']], function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
});



Route::resource('users',        'UsersController');
Route::get('get-users',         'UsersController@getUsers');
Route::get('get-roles',         'UsersController@getRoles');
Route::get('get-permissions',   'UsersController@getPermissions');


// Route::group(['middleware' => ['permission:pacientes']], function () {

    //Rutas de la agenda
    Route::resource('events', 'EventsController');
    // Route::get('api', 'EventsController@api');
    Route::get('get-events', 'EventsController@get_events');
    Route::get('get-event/{id}', 'EventsController@getEvent');
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

    // Route::resource('patients', 'PatientsController', ['except' => ['show']]);
    Route::get('get-patients',  'PatientsController@getPatients');

    // Route::get('get-age',  'PatientsController@getAge()');
    // Route::get('patients/{id}', 'PatientsController@show')->name('patients.show');

    //Ruta en pacientes para obtener género
    Route::get('get-genders', 'PatientsController@getGender');

    //Ruta en paciente para obtener localidad
    Route::get('get-locations', 'PatientsController@getLocation');

    //Ruta en pacientes para obtener departamento
    Route::get('get-departments', 'PatientsController@getDepartment');

    //Ruta en pacientes para obtener municipio
    Route::get('get-municipalities/{id}', 'PatientsController@getMunicipality');


    //Ruta temporal para trabajar pacientes
    // Route::get('getExpedient/{id}', 'PatientsController@getExpedient');

    //Rutas para el plan de tratamiento y presupuesto
    Route::resource('plans', 'TreatmentPlansController');


    // });
});
