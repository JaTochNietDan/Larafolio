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
    Route::get('{category}/{post}', array('as' => 'blog.post', 'uses' => 'PostController@show'));
    
    Route::get('', array('as' => 'blog', 'uses' => 'PostController@index'));
});

Route::group(array('prefix' => 'project'), function()
{
    Route::get('{category}', array('as' => 'project.category', 'uses' => 'ProjectController@listcategory'));
    Route::get('{category}/{project}', array('as' => 'project', 'uses' => 'ProjectController@show'));
    Route::get('{category}/{project}/release', array('as' => 'project.release.index', 'uses' => 'ProjectController@show'));
    Route::get('{category}/{project}/release/{name}', array('as' => 'project.release.show', 'uses' => 'ProjectController@show'));
    Route::get('{category}/{project}/release/{name}/download/{file}', array('as' => 'project.release.download', 'uses' => 'ProjectController@download'));
    Route::get('{category}/{project}/images', array('as' => 'project.images', 'uses' => 'ProjectController@show'));
    
    Route::get('', array('as' => 'project.index', 'uses' => 'ProjectController@index'));
});

Route::get('page/{page}', array('as' => 'page', 'uses' => 'PageController@show'));

Route::get('login', 'FrontController@login');
Route::post('login', 'LoginController@login');
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::get('', 'AdminController@dash');
    
    Route::resource('post', 'APostController', array('except' => array('show')));
    Route::resource('category', 'ACategoryController', array('except' => array('show', 'edit', 'create')));
    Route::resource('page', 'APageController', array('except' => array('show')));
    
    Route::resource('project', 'AProjectController', array('except' => array('show')));
    Route::post('project/{project}/edit/image', array('as' => 'admin.project.image.upload', 'uses' => 'AProjectController@uploadimage'));
    Route::post('project/{project}/edit/image/{name}', array('as' => 'admin.project.image.destroy', 'uses' => 'AProjectController@destroyimage'));
    
    Route::resource('project.release', 'AReleaseController', array('except' => array('show', 'index')));
    Route::resource('project.release.file', 'AUploadController', array('only' => array('destroy', 'store')));
    
    Route::group(array('prefix' => 'settings'), function()
    {
        Route::get('general', array('as' => 'admin.settings.general', 'uses' => 'SettingsController@showgeneral'));
        Route::post('general', 'SettingsController@savegeneral');
        Route::get('menu', array('as' => 'admin.settings.menu', 'uses' => 'SettingsController@showmenu'));
        Route::post('menu', 'SettingsController@savemenu');
        Route::get('profile', array('as' => 'admin.settings.profile', 'uses' => 'SettingsController@showprofile'));
        Route::post('profile', 'SettingsController@saveprofile');
        
        Route::resource('widget', 'WidgetController', array('except' => array('show')));
    });
});