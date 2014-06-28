<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'before' => 'auth' ,'uses' => 'HomeController@home'));

Route::controller('user','UserController',[
	'getLogin' => 'login',
	'postLogin' => 'loginuser',
	'getLogout' => 'logout']);

Route::get('/admin/listschools', array('as' => 'listschool', 'before' => 'auth' ,'uses' => 'AdminController@ListSchool'));

Route::get('/school/add',array('as' => 'addschool','before' =>'auth', 'uses' => 'AdminController@addschool'));
Route::post('/school/add',array('as' => 'saveschool', 'before' => 'auth', 'uses' => 'AdminController@saveschool'));