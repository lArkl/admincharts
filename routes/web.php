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
Route::get('/', 'ApplicationController@dashboard');

Route::get('/charts/{type}', 'ChartsController@show');

Route::resource('applications', 'ApplicationController');
Route::get('users', 'ApplicationController@index');
Route::get('/applications/{document}/show', 'ApplicationController@show');
Route::post('applications/approve/{id}',array('uses' => 'ApplicationController@postApprove', 'as' => 'application.approve'));
Route::post('applicants/reject/{id}',array('uses' => 'ApplicationController@postReject', 'as' => 'application.reject'));

Route::resource('workshops', 'WorkshopController');
Route::get('workshops', 'WorkshopController@index');
Route::get('/workshops/{id}/show', 'WorkshopController@show');
Route::post('workshops/approve/{id}',array('uses' => 'WorkshopController@postApprove', 'as' => 'workshop.approve'));
Route::post('workshops/reject/{id}',array('uses' => 'WorkshopController@postReject', 'as' => 'workshop.reject'));


Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});


Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});

Auth::routes();

Route::get('/home', 'HomeController@index');