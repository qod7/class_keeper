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

Route::pattern ('id' , '[0-9]+' );

Route::get('/', array('as' => 'home', 'before' => 'auth' ,'uses' => 'HomeController@home'));

Route::controller('user','UserController',[
	'getLogin' => 'login',
	'postLogin' => 'loginuser',
	'getLogout' => 'logout',
	'getTeacher' => 'addteacher',
	'postTeacher' => 'saveteacher'
	]);

Route::get('/admin/listschools', array('as' => 'listschool', 'before' => 'auth' ,'uses' => 'AdminController@ListSchool'));

Route::get('/school/listteacher/{id}',array('as' => 'listteacher', 'before' => 'auth' ,'uses' => 'AdminController@ListTeachers'))->where('id', '[0-9]+');
Route::get('/school/listclasses/{id}',array('as' => 'listteacher', 'before' => 'auth' ,'uses' => 'AdminController@ListClasses'))->where('id', '[0-9]+');


Route::get('/school/delete/{id}',array('as' => 'deleteschool', 'before' => 'auth' ,'uses' => 'AdminController@DeleteSchool'));

Route::get('/school/deleteteacher/{id}',array('as' => 'deleteteacher', 'before' => 'auth' ,'uses' => 'AdminController@DeleteTeacher'))->where('id', '[0-9]+');
Route::get('/school/makeheadmaster/{id}',array('as' => 'makeheadmaster', 'before' => 'auth' ,'uses' => 'AdminController@MakeHeadMaster'))->where('id', '[0-9]+');


Route::get('/school/add',array('as' => 'addschool','before' =>'auth', 'uses' => 'AdminController@addschool'));
Route::post('/school/add',array('as' => 'saveschool', 'before' => 'auth', 'uses' => 'AdminController@saveschool'));

Route::get('/class/{id}',array('as' => 'viewclass', 'before' => 'auth', 'uses' => 'AdminController@viewclass'));
Route::post('/class/{id}',array('as' => 'saveclass', 'before' => 'auth', 'uses' => 'AdminController@saveclass'));

