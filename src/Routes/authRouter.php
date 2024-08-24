<?php 

use App\Http\Route;

Route::get(PATH_LOGIN, 'AuthController@index');
Route::get(PATH_LOGOUT, 'AuthController@logout');