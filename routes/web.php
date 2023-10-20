<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

$controller_path = 'App\Http\Controllers';

Route::get('/travel', $controller_path . '\HomeController@travel_index')->name('index_home');

/** AdminLogin */
Route::get('/admin', $controller_path . '\LoginController@login_show')->name('login.show');
Route::post('/chk', $controller_path . '\LoginController@login')->name('login.perform');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


/** Admin Route */
Route::group(['middleware' => 'is_admin'], function () {
$controller_path = 'App\Http\Controllers';
Route::get('/admin/list_province', $controller_path . '\AdminController@list_province')->name('list_province');

Route::get('/admin/list_travel/{id}', $controller_path . '\AdminController@list_travel')->name('admin.list_travel');

Route::get('/admin/create_customer', $controller_path . '\AdminDataController@create_customer')->name('admin.create_customer');

Route::get('/admin/list_oversea', $controller_path . '\AdminDataController@list_oversea')->name('admin.list_oversea');

Route::get('/admin/new_package/{id}', $controller_path . '\AdminController@new_package')->name('admin.new_package');

Route::get('/admin/new_package_oversea/{id}', $controller_path . '\AdminDataController@new_package_oversea')->name('admin.new_package_oversea');

Route::get('/admin/new_package_add_os/{id}', $controller_path . '\AdminDataController@new_package_add_os')->name('admin.new_package_add_os');

Route::get('/admin/new_package_add/{id}', $controller_path . '\AdminController@new_package_add')->name('admin.new_package_add');

Route::get('/admin/preview_package/{id}', $controller_path . '\AdminController@preview_package')->name('admin.preview_package');

Route::get('/admin/preview_package_os/{id}', $controller_path . '\AdminController@preview_package_os')->name('admin.preview_package_os');

Route::get('/admin/list_program/{id}', $controller_path . '\AdminController@list_program')->name('admin.list_program');

Route::get('/admin/new_travel', $controller_path . '\AdminController@new_travel')->name('admin.new_travel');

Route::get('/admin/new_travel_oversea', $controller_path . '\AdminController@new_travel_oversea')->name('admin.new_travel_oversea');

/**insert tips */
Route::get('/admin/new_tips/{id}', $controller_path . '\AdminDataController@new_tips')->name('admin.create_tips');

Route::get('/admin/new_tips_os/{id}', $controller_path . '\AdminDataController@new_tips_os')->name('admin.create_tips_os');

Route::post('/admin/insert_tips', $controller_path . '\AdminController@insert_tips')->name('admin.insert_tips');

Route::post('/admin/insert_tips_os', $controller_path . '\AdminController@insert_tips_os')->name('admin.insert_tips_os');

/** insert data */
Route::post('/admin/save_tourist', $controller_path . '\AdminController@save_tourist')->name('admin.save_tourist');

Route::post('/admin/insert_travel', $controller_path . '\AdminController@insert_travel')->name('admin.insert_travel');

Route::post('/admin/insert_customer', $controller_path . '\AdminController@insert_customer')->name('admin.insert_customer');

Route::post('/admin/insert_travel_oversea', $controller_path . '\AdminDataController@insert_travel_oversea')->name('admin.insert_travel_oversea');

Route::post('/admin/insert_program_travel', $controller_path . '\AdminController@insert_program_travel')->name('admin.insert_program_travel');

Route::post('/admin/insert_program_travel_os', $controller_path . '\AdminController@insert_program_travel_os')->name('admin.insert_program_travel_os');

Route::post('/admin/save_program', $controller_path . '\AdminController@save_program')->name('admin.save_program');

Route::post('/admin/insert_image_extra', $controller_path . '\AdminController@insert_image_extra')->name('admin.insert_image_extra');

Route::post('/admin/save_program_oversea', $controller_path . '\AdminDataController@save_program_oversea')->name('admin.save_program_oversea');

/** delete data */

Route::get('/admin/delete_program/{id}', $controller_path . '\DeleteFileController@delete_program')->name('admin.delete_program');

Route::get('/admin/delete_travel/{id}/{province}', $controller_path . '\DeleteFileController@delete_travel_place')->name('admin.delete_travel_place');

Route::get('/admin/delete_img/{id}', $controller_path . '\DeleteFileController@delete_travel_img')->name('admin.delete_travel_img');

Route::get('/admin/delete_img_os/{id}', $controller_path . '\DeleteFileController@delete_travel_img_os')->name('admin.delete_travel_img_os');


/** data */
Route::get('/admin/data_travel/{id}', $controller_path . '\AdminController@data_travel')->name('admin.data_travel');

Route::get('/admin/data_oversea/{id}', $controller_path . '\AdminDataController@data_oversea')->name('admin.data_oversea');

Route::get('/admin/create_user', $controller_path . '\AdminController@create_user')->name('admin.create_user');

Route::get('/admin/all_program', $controller_path . '\AdminDataController@all_program')->name('admin.all_program');

Route::get('/admin/all_program_oversea', $controller_path . '\AdminDataController@all_program_oversea')->name('admin.all_program_oversea');

Route::get('/admin/list_customer', $controller_path . '\AdminDataController@list_customer')->name('admin.list_customer');

/** Edit Data */
Route::get('/admin/edit_travel/{id}', $controller_path . '\AdminController@edit_travel')->name('admin.edit_travel');

Route::get('/admin/edit_travel_os/{id}', $controller_path . '\AdminController@edit_travel_os')->name('admin.edit_travel_os');

Route::get('/admin/edit_package_os/{id}', $controller_path . '\AdminDataController@edit_package_os')->name('admin.edit_package_os');

Route::post('/admin/update_travel', $controller_path . '\AdminController@update_travel')->name('admin.update_travel');

Route::post('/admin/update_travel_os', $controller_path . '\AdminController@update_travel_os')->name('admin.update_travel_os');

Route::post('/admin/update_package_os', $controller_path . '\AdminDataController@update_package_os')->name('admin.update_package_os');

/** Print Preview */
Route::get('/admin/print_preview/{id}', $controller_path . '\AdminDataController@print_program')->name('admin.print_preview');

Route::get('/admin/print_preview_os/{id}', $controller_path . '\AdminDataController@print_program_os')->name('admin.print_preview_os');

});


///////////----Admin Route End----////////////

Route::get('/', function () {
    return  view('index.home');
})->name('/');

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

////////////--------Front_Route---------//////////////
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/rent',[HomeController::class,'van_list'])->name('van_list');
Route::get('/service',[HomeController::class,'service'])->name('service');
Route::get('/health',[HomeController::class,'health_tour'])->name('health');
Route::get('/community',[HomeController::class,'community'])->name('community');
Route::get('/travel',[HomeController::class,'travel'])->name('travel');
Route::get('/travel-page/{id}',[HomeController::class,'travel_page'])->name('travel_page');
Route::get('/preview_program/{id}', [HomeController::class,'preview_download'])->name('preview_download');

Route::POST('/save_contact',[HomeController::class,'save_contact'])->name('save_contact');
Route::POST('/save_index_contact',[HomeController::class,'save_contact_index'])->name('save_contact_index');