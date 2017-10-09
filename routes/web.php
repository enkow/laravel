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

Route::group( ['prefix' => 'admin'], function () {
  Route::get('/login', ['as' => 'admin.login', 'uses' => 'AuthController@login']);
  Route::post('/login', ['as' => 'admin.login.auth', 'uses' => 'AuthController@authorize']);

  Route::get('/reset', ['as' => 'admin.reset', 'uses' => 'AuthController@forget']);
  Route::post('/reset', ['as' => 'admin.reset.send', 'uses' => 'AuthController@reset']);

  Route::get('/reset/{token}', ['as' => 'admin.reset.token', 'uses' => 'AuthController@token']);
  Route::post('/reset/{token}', ['as' => 'admin.reset.store', 'uses' => 'AuthController@store']);

  Route::group( [ 'middleware' => 'auth' ], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@dashboard']);
    Route::get( '/logout', [ 'as' => 'admin.logout', 'uses' => 'AuthController@logout'] );
    Route::rest('tag', 'TagController', 'admin', ['index', 'create', 'edit', 'delete']);
    Route::rest('category', 'CategoryController', 'admin', ['index', 'create', 'edit', 'delete']);
    Route::rest('blog', 'BlogController', 'admin', ['index', 'create', 'edit', 'delete']);
    Route::rest('project', 'ProjectController', 'admin', ['index', 'create', 'edit', 'delete']);
    Route::rest('offer', 'OfferController', 'admin', ['index', 'create', 'edit', 'delete']);

    Route::post('/ajax/upload/{dir}', ['as' => 'ajax.upload', 'uses' => 'AjaxController@upload']);
    Route::post('/ajax/upload/gallery/{project}', ['as' => 'ajax.upload.gallery', 'uses' => 'AjaxController@uploadGallery']);
    Route::get('/ajax/remove/{photo}', ['as' => 'ajax.remove.gallery', 'uses' => 'AjaxController@removeGallery']);

    Route::get('/logs', [ 'as' => 'admin.logs', 'uses' => 'LogController@logs' ]);
  });
});

Route::get('/', ['as' => 'home', 'uses' => 'WebController@index']);
Route::get('/blog', ['as' => 'blog', 'uses' => 'WebController@blog']);
Route::get('/blog/view', ['as' => 'blog.view', 'uses' => 'WebController@blogView']);
Route::get('/tag', ['as' => 'tag', 'uses' => 'WebController@tag']);
Route::get('/offer/view', ['as' => 'offer.view', 'uses' => 'WebController@offerView']);
Route::get('/portfolio', ['as' => 'portfolio', 'uses' => 'WebController@portfolio']);
Route::get('/portfolio/view', ['as' => 'portfolio.view', 'uses' => 'WebController@portfolioView']);
Route::get('/category', ['as' => 'category', 'uses' => 'WebController@category']);
