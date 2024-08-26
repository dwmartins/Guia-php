<?php

use App\Http\Route;
use App\Middleware\UserMiddleware;

// User Panel view
Route::get(PATH_USER_PANEL, "UserController@panelView", [
    [UserMiddleware::class, 'isAuth']
]);

// User Profile view
Route::get(PATH_USER_PROFILE, "UserController@profileView", [
    [UserMiddleware::class, 'isAuth']
]);