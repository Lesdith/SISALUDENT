<?php

use PHPUnit\Framework\MockObject\Generator;
use IntelGUA\Generators\Generate;
use Caffeinated\Shinobi\Middleware;



Route::get('/', function () {
        return redirect('/login');
    });

// Route::group([
//         'middleware' => ['permission:ninguno'],
//     ], function () {
//     Route::resource('errors',        'ErrorsController');
//     Route::get('errors',        'ErrorsController@getErrors');
// });

Auth::routes();
// Auth::user()->ability('admin', 'todos');
// en las siguientes rutas si no esta logeado mandar a login
Route::group(['middleware' => ['auth']], function () {


Route::get('/home', 'HomeController@index')->name('home');



//Grupo de rutas a las que puede acceder exclusivamente el administrador
    Route::group([
        'middleware' => ['permission:todos'],
    ], function () {
        Route::get('/register', function () {    return view('home');
        });
        //         //Rutas de usuarios
            Route::resource('users',        'UsersController');
            Route::get('get-users',         'UsersController@getUsers');
            Route::get('get-roles',         'UsersController@getRoles');
            Route::get('get-permissions',   'UsersController@getPermissions');
    });

//Grupo de rutas a las que puede acceder un asistente con permisos
    Route::group([
        'middleware' => ['role:asist'],
    ], function () {

         //Rutas de la agenda
    Route::resource('events', 'EventsController');
    Route::get('get-events', 'EventsController@get_events');
    Route::get('get-event/{id}', 'EventsController@getEvent');

        //Rutas de  Tooth
    Route::resource('teeth', 'TeethController');
    Route::get('get-teeth', 'TeethController@getTeeth');
    Route::get('get-tooth/{id}', 'TeethController@getTooth')->name('get-tooth');


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

    //Ruta en pacientes para obtener departamento
    Route::get('get-departments', 'PatientsController@getDepartment');

    //Ruta en pacientes para obtener municipio
    Route::get('get-municipalities/{id}', 'PatientsController@getMunicipality');

    //Rutas para el plan de tratamiento y presupuesto
    Route::resource('plans', 'TreatmentPlansController');

    });


        // Route::group(['prefix' => 'asist', 'middleware' => ['role:asist']], function() {
        // });
});
