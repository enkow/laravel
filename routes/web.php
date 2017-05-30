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

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@dashboard']);

Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'AuthController@login']);
Route::post('/admin/login', ['as' => 'admin.login.auth', 'uses' => 'AuthController@authorize']);

Route::get('/admin/reset', ['as' => 'admin.reset', 'uses' => 'AuthController@forget']);
Route::post('/admin/reset', ['as' => 'admin.reset.send', 'uses' => 'AuthController@reset']);

Route::get('/admin/reset/{token}', ['as' => 'admin.reset.token', 'uses' => 'AuthController@token']);
Route::post('/admin/reset/{token}', ['as' => 'admin.reset.store', 'uses' => 'AuthController@store']);

Route::group( ['prefix' => 'admin'], function () {
    Route::get( '/logout', [ 'as' => 'admin.logout', 'uses' => 'AuthController@logout'] );
    Route::rest('tag', 'TagController', 'admin', ['index', 'create', 'edit', 'delete']);
    Route::rest('blog', 'BlogController', 'admin', ['index', 'create', 'edit', 'delete']);
    Route::rest('project', 'ProjectController', 'admin', ['index', 'create', 'edit', 'delete']);

    Route::post('/ajax/upload/{dir}', ['as' => 'ajax.upload', 'uses' => 'AjaxController@upload']);
    Route::post('/ajax/upload/gallery/{project}', ['as' => 'ajax.upload.gallery', 'uses' => 'AjaxController@uploadGallery']);
    Route::get('/ajax/remove/{photo}', ['as' => 'ajax.remove.gallery', 'uses' => 'AjaxController@removeGallery']);
});
