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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::group(['middleware'=>['Admin'],'prefix'=>'/admin'], function(){
    Route::get('/dashboard', 'AdminController@index');
    Route::get('/books', 'AdminController@manageBooks');
    Route::post('/newBook', 'AdminController@newBook')->name('newBook');
    Route::get('/deleteBook', 'AdminController@deleteBook')->name('deleteBook');
    Route::get('/bookRequest', 'AdminController@bookRequest');
    Route::get('/bookReject', 'AdminController@bookReject')->name('bookReject');
    Route::get('/bookApprove', 'AdminController@bookApprove')->name('bookApprove');
    Route::get('/bookExpired', 'AdminController@bookExpired');
});


Route::group(['middleware'=>['User'],'prefix'=>'/user'], function(){
    Route::get('/dashboard', 'UserController@index');
    Route::get('/books', 'UserController@assignedBooks');
    Route::post('/getBook', 'UserController@getBook')->name('getBook');
    Route::get('/returnBook', 'UserController@returnBook')->name('returnBook');
    Route::get('/deleteBook', 'UserController@deleteBook')->name('deleteBook');
    Route::get('/expireBook', 'UserController@expireBook');
});
