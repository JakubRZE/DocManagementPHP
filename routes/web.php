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
Route::get('/dashboard/index', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/activity', 'ActivityController@index');
Route::get('/manage', 'ManageController@index');
Route::get('/manage/change_psw', 'ManageController@change_psw');
Route::post('/manage/change_done', 'ManageController@change_done');
