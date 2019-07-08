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

Route::get('admin/login',
['as'	=>	'admin-login-get',
 'uses'	=>	'AdminController@getLogin',
 'middleware'	=>	'guest']);

Route::post('admin/login',
['as'	=>	'admin-login-post',
 'uses'	=>	'AdminController@postLogin',
 'middleware'	=>	'guest']);

Route::post('admin/logout',
['as'	=>	'admin-logout-post',
 'uses'	=>	'AdminController@postLogout',
 'middleware'	=>	'auth']);

Route::get('admin/alumini-list',
['as'	=>	'admin-alumini-list-get',
 'uses'	=>	'AdminController@getAdminAluminiList',
 'middleware'	=>	'auth']);

Route::post('admin/publish-unpublish-alumini/{alumini_id}/{status}',
['as'	=>	'admin-publish-unpublish-alumini-post',
 'uses'	=>	'AdminController@postPublishUnpublishAlumini',
 'middleware'	=>	'auth']);
