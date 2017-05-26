<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
use Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Form::macro('field', function ($name, $field, $attributes = [], $value = null) {
        return view('form.field', compact('name', 'field', 'attributes', 'value'));
      });

      Form::macro('passwd', function ( $name, $field, $attributes = [] ) {
        return view('form.passwd', compact('name', 'field', 'attributes', 'value'));
      });

      Form::macro('textfield', function ($name, $field, $attributes = [], $value = null) {
        if(isset($attributes[ 'wysiwyg' ])) {
          $attributes['data-wysiwyg'] = $attributes['wysiwyg'];
        }

        return view('form.textfield', compact('name', 'field', 'attributes', 'value'));
      });

      Form::macro('seo', function () {
        return view('form.seo');
      });

      Route::macro('rest', function ($name, $controller, $subname = null, $actions = ['index', 'show', 'create', 'update', 'delete']){
        if (in_array('index', $actions)) {
          Route::get($name, [ 'as' => $subname.'.'.$name.'.index', 'uses' => $controller.'@index' ]);
        }

        if (in_array('show', $actions)) {
          Route::get($name.'/{'.$name.'}', [ 'as' => $subname.'.'.$name.'.show', 'uses' => $controller.'@show' ]);
        }

        if (in_array('create', $actions)) {
          Route::get($name.'/create', [ 'as' => $subname.'.'.$name.'.create', 'uses' => $controller.'@create' ]);
          Route::post($name, [ 'as' => $subname.'.'.$name.'.store', 'uses' => $controller.'@store' ]);
        }

        if (in_array('edit', $actions)) {
          Route::get($name.'/{'.$name.'}/edit/', [ 'as' => $subname.'.'.$name.'.edit', 'uses' => $controller.'@edit' ]);
          Route::post($name.'/{'.$name.'}/update/', [ 'as' => $subname.'.'.$name.'.update', 'uses' => $controller.'@update' ]);
        }

        if (in_array('delete', $actions)) {
          Route::get($name.'/{'.$name.'}/delete/', [ 'as' => $subname.'.'.$name.'.delete', 'uses' => $controller.'@delete' ]);
        }
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
