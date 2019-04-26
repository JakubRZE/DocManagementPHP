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

Auth::routes();
Route::resource('documents','DocumentsController');
Route::get('/dashboard/index', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/activity', 'ActivityController@index');
Route::get('/manage', 'ManageController@index');

Route::get('/manage/change_psw', 'ManageController@change_psw');
Route::post('/manage/change_done','ManageController@change_done')->name('changePassword');
Route::get('/documents/download/{id}','DocumentsController@download')->name('download');

