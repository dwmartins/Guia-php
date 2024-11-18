<?php 

use App\Http\Route;

Route::get(PATH_ADM_LOGIN, 'App/AuthAdminController@index');
Route::post(PATH_ADM_LOGIN, 'App/AuthAdminController@login');