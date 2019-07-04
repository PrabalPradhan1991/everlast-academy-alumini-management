<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('alumini/register',
['as'	=>	'alumini-register-get',
 'uses'	=>	'AluminiDetailsController@getAluminiRegister']);

Route::post('alumini/register',
['as'	=>	'alumini-register-post',
 'uses'	=>	'AluminiDetailsController@postAluminiRegister']);

Route::get('alumini/list',
['as'	=>	'alumini-list-get',
 'uses'	=>	'AluminiDetailsController@getAluminiList']);