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
    Route::rest('blog', 'BlogController', 'admin', ['index', 'create', 'update', 'delete']);
});
