<?php 

use App\Http\Route;

// *********** VIEWS *************//

// User login viewS
Route::get(PATH_LOGIN, 'AuthController@index');

// User register view
Route::get(PATH_CREATE_ACCOUNT, 'AuthController@registerView');

// ***********END VIEWS *************//

// Login
Route::post(PATH_LOGIN, 'AuthController@login');

// Logout
Route::get(PATH_LOGOUT, 'AuthController@logout');

// Register
Route::post("/register", 'AuthController@register');