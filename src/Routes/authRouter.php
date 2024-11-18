<?php 

use App\Http\Route;

// *********** VIEWS *************//

// User login view
Route::get(PATH_LOGIN, 'AuthController@index');

// User register view
Route::get(PATH_CREATE_ACCOUNT, 'AuthController@registerView');

// Forgot password view
Route::get(PATH_FORGOT_PASSWORD, 'AuthController@forgotPasswordView');

// ***********END VIEWS *************//

// Login
Route::post("/login", 'AuthController@login');

// Logout
Route::get("/logout", 'AuthController@logout');

// Register
Route::post("/register", 'AuthController@register');

// Reset password
Route::post("/reset-password-link", 'AuthController@sendPasswordRecoveryLink');