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


Route::get('/', 'DashboardController@Index');

/*
Route::get('/sites', 'SitesController@Index');
Route::get('/sites/add', 'SitesController@Add');
Route::post('/save',[
    'uses' => 'SitesController@Save',
    'as' => 'Sites.save'
]);
*/

Auth::routes();
Route::resource('documents','DocumentsController');
Route::get('/dashboard/index', 'DashboardController@Index');
Route::get('/dashboard', 'DashboardController@Index');
Route::get('/activity', 'ActivityController@Index');