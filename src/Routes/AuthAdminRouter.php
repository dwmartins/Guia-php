<?php 

use App\Http\Route;

Route::get('/app/' . PATH_ADM_LOGIN, 'AuthAdminController@index');
Route::post('/app/' . PATH_ADM_LOGIN, 'AuthAdminController@login');