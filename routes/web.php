<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

$controller_path = 'App\Http\Controllers';

Route::get('/travel', $controller_path . '\HomeController@travel_index')->name('index_home');

Route::get('/admin/list_travel/{id}', $controller_path . '\AdminController@list_travel')->name('admin.list_travel');

Route::get('/admin/list_province', $controller_path . '\AdminController@list_province')->name('list_province');

Route::get('/admin/new_package/{id}', $controller_path . '\AdminController@new_package')->name('admin.new_package');

Route::get('/admin/new_package_add/{id}', $controller_path . '\AdminController@new_package_add')->name('admin.new_package_add');

Route::get('/admin/preview_package/{id}', $controller_path . '\AdminController@preview_package')->name('admin.preview_package');

Route::get('/admin/list_program/{id}', $controller_path . '\AdminController@list_program')->name('admin.list_program');

Route::get('/admin/new_travel', $controller_path . '\AdminController@new_travel')->name('admin.new_travel');

/** insert data */
Route::post('/admin/save_tourist', $controller_path . '\AdminController@save_tourist')->name('admin.save_tourist');

Route::post('/admin/insert_travel', $controller_path . '\AdminController@insert_travel')->name('admin.insert_travel');

Route::post('/admin/insert_program_travel', $controller_path . '\AdminController@insert_program_travel')->name('admin.insert_program_travel');

Route::post('/admin/save_program', $controller_path . '\AdminController@save_program')->name('admin.save_program');

/** delete data */

Route::get('/admin/delete_program/{id}', $controller_path . '\AdminController@delete_program')->name('admin.delete_program');

/** data */
Route::get('/admin/data_travel/{id}', $controller_path . '\AdminController@data_travel')->name('admin.data_travel');

Route::get('/admin/create_user', $controller_path . '\AdminController@create_user')->name('admin.create_user');

///////////----Admin Route End----////////////

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }   
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');
    
Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
    Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');    
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');    
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');    
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');    
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');    
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');    
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');    
}); 

Route::view('sample-page', 'admin.list_province')->name('sample-page');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('layouts')->group(function () {
    Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'admin_unique_layouts.compact-small');
    Route::view('advance-type', 'admin_unique_layouts.advance-type');
    Route::view('material-layout', 'admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
});

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');