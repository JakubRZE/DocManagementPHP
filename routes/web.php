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

//Route::get('/', function () {
//    return view('auth.login');
//});

Route::get('/', 'HomeController@Guest');

/*
Route::get('/sites', 'SitesController@Index');
Route::get('/sites/add', 'SitesController@Add');
Route::post('/save',[
    'uses' => 'SitesController@Save',
    'as' => 'Sites.save'
]);
*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('documents','DocumentsController');

Route::get('/lol', 'DashboardController@Index');