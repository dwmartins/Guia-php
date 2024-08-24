<?php 

use App\Http\Route;

Route::get(PATH_ADM_LOGIN, 'AuthAdminController@index');
Route::post(PATH_ADM_LOGIN, 'AuthAdminController@login');