<?php 

use App\Http\Route;

Route::get(PATH_LOGIN, 'AuthController@loginView');
Route::get(PATH_CREATE_ACCOUNT, 'AuthController@registerView');
Route::get(PATH_FORGOT_PASSWORD, 'AuthController@forgotPasswordView');

// ***********END VIEWS *************//

Route::post("/login", 'AuthController@login');
Route::get("/logout", 'AuthController@logout');
Route::post("/register", 'AuthController@register');
Route::post("/reset-password-link", 'AuthController@sendPasswordRecoveryLink');