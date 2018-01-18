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
//Route::get('', function(){return '<img src="http://laravel.go/1.jpg" width="40%" height="40%"/>';});
Route::get('pic',function(){chdir('../resources');echo '<img src="1.jpg" width="40%" height="40%"/>';});
Route::get('pic/{id}','PhotoController@index');
Route::get('makepic','PhotoController@pic');
Route::get('test','TestController@index');
