<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

$controller_path = 'App\Http\Controllers';

Route::get('/travel', $controller_path . '\HomeController@travel_index')->name('index_home');

Route::get('/admin/list_travel/{id}', $controller_path . '\AdminController@list_travel')->name('admin.list_travel');

Route::get('/admin/create_customer', $controller_path . '\AdminDataController@create_customer')->name('admin.create_customer');

Route::get('/admin/list_province', $controller_path . '\AdminController@list_province')->name('list_province');

Route::get('/admin/list_oversea', $controller_path . '\AdminDataController@list_oversea')->name('admin.list_oversea');

Route::get('/admin/new_package/{id}', $controller_path . '\AdminController@new_package')->name('admin.new_package');

Route::get('/admin/new_package_oversea', $controller_path . '\AdminDataController@new_package_oversea')->name('admin.new_package_oversea');

Route::get('/admin/new_package_add/{id}', $controller_path . '\AdminController@new_package_add')->name('admin.new_package_add');

Route::get('/admin/preview_package/{id}', $controller_path . '\AdminController@preview_package')->name('admin.preview_package');

Route::get('/admin/list_program/{id}', $controller_path . '\AdminController@list_program')->name('admin.list_program');

Route::get('/admin/new_travel', $controller_path . '\AdminController@new_travel')->name('admin.new_travel');

Route::get('/admin/new_travel_oversea', $controller_path . '\AdminController@new_travel_oversea')->name('admin.new_travel_oversea');

/**insert tips */
Route::get('/admin/new_tips/{id}', $controller_path . '\AdminDataController@new_tips')->name('admin.create_tips');

Route::post('/admin/insert_tips', $controller_path . '\AdminController@insert_tips')->name('admin.insert_tips');

/** insert data */
Route::post('/admin/save_tourist', $controller_path . '\AdminController@save_tourist')->name('admin.save_tourist');

Route::post('/admin/insert_travel', $controller_path . '\AdminController@insert_travel')->name('admin.insert_travel');

Route::post('/admin/insert_customer', $controller_path . '\AdminController@insert_customer')->name('admin.insert_customer');

Route::post('/admin/insert_travel_oversea', $controller_path . '\AdminDataController@insert_travel_oversea')->name('admin.insert_travel_oversea');

Route::post('/admin/insert_program_travel', $controller_path . '\AdminController@insert_program_travel')->name('admin.insert_program_travel');

Route::post('/admin/save_program', $controller_path . '\AdminController@save_program')->name('admin.save_program');

Route::post('/admin/insert_image_extra', $controller_path . '\AdminController@insert_image_extra')->name('admin.insert_image_extra');

/** delete data */

Route::get('/admin/delete_program/{id}', $controller_path . '\DeleteFileController@delete_program')->name('admin.delete_program');

Route::get('/admin/delete_travel/{id}/{province}', $controller_path . '\DeleteFileController@delete_travel_place')->name('admin.delete_travel_place');

Route::get('/admin/delete_img/{id}', $controller_path . '\DeleteFileController@delete_travel_img')->name('admin.delete_travel_img');

/** data */
Route::get('/admin/data_travel/{id}', $controller_path . '\AdminController@data_travel')->name('admin.data_travel');

Route::get('/admin/data_oversea/{id}', $controller_path . '\AdminDataController@data_oversea')->name('admin.data_oversea');

Route::get('/admin/create_user', $controller_path . '\AdminController@create_user')->name('admin.create_user');

Route::get('/admin/all_program', $controller_path . '\AdminDataController@all_program')->name('admin.all_program');

Route::get('/admin/all_program_oversea', $controller_path . '\AdminDataController@all_program_oversea')->name('admin.all_program_oversea');

Route::get('/admin/list_customer', $controller_path . '\AdminDataController@list_customer')->name('admin.list_customer');

/** Edit Data */
Route::get('/admin/edit_travel/{id}', $controller_path . '\AdminController@edit_travel')->name('admin.edit_travel');

Route::post('/admin/update_travel', $controller_path . '\AdminController@update_travel')->name('admin.update_travel');


/** Print Preview */
Route::get('/admin/print_preview/{id}', $controller_path . '\AdminDataController@print_program')->name('admin.print_preview');



///////////----Admin Route End----////////////

Route::get('/', function () {
    return  view('index.home');
})->name('/');
