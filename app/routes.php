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

Route::get('/', 'PostController@index');

Route::group(array('prefix' => 'blog'), function()
{
    Route::get('{category}', 'PostController@listcategory');
    Route::get('{category}/{post}', 'PostController@show');
    
    Route::get('', 'PostController@index');
});

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::get('', 'AdminController@dash');
});