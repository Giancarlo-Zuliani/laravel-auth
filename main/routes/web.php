<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');
Route::post('update/user/icon' , 'HomeController@updateUsericon')
    ->name('update-icon');
Route::get('clear/user/icon' , 'HomeController@clearUserIcon') 
    -> name('clear-icon');