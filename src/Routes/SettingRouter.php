<?php

use App\Http\Route;
use App\Middleware\AdminMiddleware;

Route::post('/settings', 'SettingsController@update', [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::get('/settings', 'SettingsController@fetchByName');