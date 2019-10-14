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

Route::get('/', 'MainController@index')->name('main');
Route::get('/list/{info}', 'MainController@getInformation')->name('main.info');

Route::post('/formdoctors', function () {
    return view('includes/formdoctors');
});

Route::post('/formcompany', function () {
    return view('includes/formcompany');
});

Route::post('/add/blacklist', 'MainController@addToBlackList')->name('add.blacklist');
Route::get('/search/list','SearchController@search');
Route::get('/about', function () {
    return view('about');
})->name('about');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');
Route::get('/admin/list/add/{id}', 'AdminController@addList')->name('admin.add');
Route::get('/admin/list/delete/{id}', 'AdminController@deleteList')->name('admin.delete');
/**
 * Затычка для регистрации
 */
Route::get('/register', function() {
    return redirect('/');
});

