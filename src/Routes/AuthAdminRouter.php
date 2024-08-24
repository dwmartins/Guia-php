<?php 

use App\Http\Route;

Route::get('/app/entrar', 'AuthAdminController@index');
Route::post('/app/entrar', 'AuthAdminController@login');