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

Route::get('/', function () {
    return view('101891.welcome');
});

Route::get('/student', function () {
    return view('101891.student');
});

Route::get('/fees', function () {
    return view('101891.fees');
});

Route::get('/searchView', function () {
    return view('101891.search');
});

Route::get('/table', 'FeesController@display');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/registerfee', 'FeesController@saveFee');

Route::post('register', 'StudentController@saveStudent');

Route::post('/search', 'FeesController@search');

Route::get('/search',function () {
    return view('101891.search');
});

