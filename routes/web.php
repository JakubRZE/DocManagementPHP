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
Route::get('/documents/delete/{id}','DocumentsController@destroy_show')->name('destroy.show');
Route::post('/documents/search/{request?}', 'DocumentsController@index');

Route::get('/documents/sort/{sortOrder?}','DocumentsController@sort')->name('sort');

Route::get('/dashboard/active_employees','DashboardController@ActiveEmployees')->name('dash.activ');
Route::get('/dashboard/active_employees_details/{id}','DashboardController@ActiveEmployeesDetails')->name('dash.activ.det');
Route::get('/dashboard/useful_docs','DashboardController@DownloadedDocuments')->name('dash.useful');
Route::post('/dashboard/useful_docs/on_page/{request?}', 'DashboardController@DownloadedDocuments');
Route::get('/dashboard/all_employees','DashboardController@AllEmployees')->name('dash.employe');