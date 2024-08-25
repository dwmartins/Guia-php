<?php 

use App\Http\Route;

Route::get(PATH_LOGIN, 'AuthController@index');
Route::post(PATH_LOGIN, 'AuthController@login');
Route::get(PATH_LOGOUT, 'AuthController@logout');