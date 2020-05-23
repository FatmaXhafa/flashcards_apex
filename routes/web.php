<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'QuizController@index')->name('home');
Route::post('/', 'QuizController@store');

Route::get('/endview', function () {
    return view('endview');
});
