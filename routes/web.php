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

//$this->get('/', 'SiteController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('department','DepartmentController');
