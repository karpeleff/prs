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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/addtime', 'HomeController@addTime');
Route::get('/addtime', 'HomeController@addTime');
//Docs Create
Route::post('/newdoc', 'HomeController@newDoc');
Route::get('/monthPlan', 'HomeController@monthPlan');

Route::get('/test', 'HomeController@test');

Route::match(['get','post'],'/add_type' , 'StorageController@addComponentType');
Route::match(['get','post'],'/add_component' , 'StorageController@addComponent');
Route::match(['get','post'],'/searchcomponent' , 'StorageController@searchComponent');
Route::get('/xls', 'HomeController@xls');
////fire
Route::get('/newfire','FireController@newFire');
Route::post('/addfire','FireController@addFire');
Route::get('/printform','FireController@printLabel');
Route::get('/getrecord/{id}','FireController@getRecord');
Route::post('/updaterecord','FireController@updateRecord');
Route::get('/allfire','FireController@allData');
Route::get('/delrecord/{id}','FireController@delRecord');