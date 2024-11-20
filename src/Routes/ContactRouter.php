<?php

use App\Http\Route;

Route::get(PATH_CONTACT, 'ContactController@index');
Route::post("/contact/send", 'ContactController@send');