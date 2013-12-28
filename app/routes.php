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
    Route::get('{category}', array('as' => 'blog.category', 'uses' => 'PostController@listcategory'));
    Route::get('{category}/{post}', 'PostController@show');
    
    Route::get('', array('as' => 'blog', 'uses' => 'PostController@index'));
});

Route::get('login', 'FrontController@login');
Route::post('login', 'LoginController@login');
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::get('', 'AdminController@dash');
    Route::resource('post', 'APostController', array('except' => array('show')));
    Route::resource('category', 'ACategoryController', array('except' => array('show', 'edit', 'create')));
    
    Route::get('settings/general', array('as' => 'admin.settings.general', 'uses' => 'SettingsController@showgeneral'));
    Route::post('settings/general', array('as' => 'admin.settings.general.save', 'uses' => 'SettingsController@savegeneral'));
    Route::get('settings/menu', array('as' => 'admin.settings.menu', 'uses' => 'SettingsController@showmenu'));
    Route::post('settings/menu', array('as' => 'admin.settings.menu.save', 'uses' => 'SettingsController@savemenu'));
});