<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);
//Route::get('/verify', 'Auth\VerificationController@show')->name('verify');

Route::get('/', 'QuizController@index')->name('home');
Route::post('/', 'QuizController@store');

Route::get('/endview', function () {
    return view('endview');
});
