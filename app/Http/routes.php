<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('', 'Home\IndexController@index');


Route::any('test','TestController@index');
Route::get('admin','Admin\LoginController@index');
Route::get('admin/login','Admin\LoginController@index');
Route::post('admin/logincheck','Admin\LoginController@logincheck');
Route::resource('home','Home\IndexController');
Route::resource('essay','Home\EssayController');
Route::get('essaylist','Home\CommonController@essaylist');
Route::get('morelist','Home\CommonController@morelist');

Route::group(['middleware'=>['admin.login']],function(){
  Route::any('admin/index','Admin\IndexController@index');
  Route::get('admin/info','Admin\IndexController@info');
  Route::any('admin/pass','Admin\IndexController@pass');
  Route::get('admin/quit','Admin\IndexController@quit');
  Route::resource('admin/category','Admin\CategoryController');
  Route::any('admin/cate_changeorder','Admin\CategoryController@changeOrder');
  Route::post('admin/loginpwd','Admin\LoginController@pwdrewrite');
  Route::resource('article','Admin\ArticleController');
});
