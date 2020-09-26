<?php

use Illuminate\Support\Facades\Route;

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

//Auth::routes();
Route::get('/manage/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/manage/login', 'Auth\LoginController@login');
Route::post('/manage/logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('manage/user', 'UserController');
Route::resource('manage/sns', 'SnsController');
Route::resource('manage/category', 'CategoryController');
Route::resource('manage/quiz', 'QuizController');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manage/top', 'TopController@index')->name('top');


Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');



