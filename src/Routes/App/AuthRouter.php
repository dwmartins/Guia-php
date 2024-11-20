<?php 

use App\Http\Route;

Route::get(PATH_ADM_LOGIN, 'App/AuthAdminController@loginView');
Route::post("/app/login", 'App/AuthAdminController@login');