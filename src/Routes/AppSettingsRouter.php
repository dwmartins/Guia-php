<?php

use App\Http\Route;
use App\Middleware\AdminMiddleware;

Route::get(PATH_EMAIL_SETTINGS, "AppSettingsController@emailConfigView", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post(PATH_EMAIL_SETTINGS, "AppSettingsController@saveEmailConfig", [
    [AdminMiddleware::class, 'isAdmin']
]);