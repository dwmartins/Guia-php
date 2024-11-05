<?php 

use App\Http\Route;

// *********** VIEWS *************//

// User login view
Route::get("/entrar", 'AuthController@index');

// User register view
Route::get("/registrar", 'AuthController@registerView');

// ***********END VIEWS *************//

// Login
Route::post("/entrar", 'AuthController@login');

// Logout
Route::get("/logout", 'AuthController@logout');

// Register
Route::post("/registrar", 'AuthController@register');