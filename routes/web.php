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

require_once('constants.php');

Route::get('/', function () {
    return view('welcome');
});


Route::get('alumini/register',
['as'	=>	'alumini-register-get',
 'uses'	=>	'AluminiDetailsController@getAluminiRegister']);

Route::post('alumini/register',
['as'	=>	'alumini-register-post',
 'uses'	=>	'AluminiDetailsController@postAluminiRegister']);

Route::get('alumini/view',
['as'	=>	'alumini-view-get',
 'uses'	=>	'AluminiDetailsController@getAluminiView']);

Route::get('alumini/login',
['as'	=>	'alumini-login-get',
 'uses'	=>	'AluminiDetailsController@getAluminiLogin']);

Route::post('alumini/login',
['as'	=>	'alumini-login-post',
 'uses'	=>	'AluminiDetailsController@postAluminiLogin']);

Route::get('alumini/edit',
['as'	=>	'alumini-edit-get',
 'uses'	=>	'AluminiDetailsController@getAluminiEdit']);

Route::post('alumini/edit',
['as'	=>	'alumini-edit-post',
 'uses'	=>	'AluminiDetailsController@postAluminiEdit']);

Route::get('success-register',
['as'	=>	'success-register-get',
 'uses'	=>	'AluminiDetailsController@getSuccessRegister']);

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

Route::get('alumini-view',
['uses'	=>	'AluminiDetailsController@getAluminiView',
 'as'	=>	'alumini-view-get']);

Route::get('alumini/login',
['as'	=>	'alumini-login-get',
 'uses'	=>	'AluminiDetailsController@getLogin'])->middleware(['check_if_alumini_not_logged_in']);

Route::post('alumini/login',
['as'	=>	'alumini-login-post',
 'uses'	=>	'AluminiDetailsController@postLogin'])->middleware(['check_if_alumini_not_logged_in']);

Route::post('alumini/logout',
['as'	=>	'alumini-logout-post',
 'uses'	=>	'AluminiDetailsController@postLogout'])->middleware(['check_if_alumini_logged_in']);

Route::get('alumini/edit',
['as'	=>	'alumini-edit-get',
 'uses'	=>	'AluminiDetailsController@getAluminiEdit'])->middleware(['check_if_alumini_logged_in']);

Route::post('alumini/edit',
['as'	=>	'alumini-edit-post',
 'uses'	=>	'AluminiDetailsController@postAluminiEdit'])->middleware(['check_if_alumini_logged_in']);