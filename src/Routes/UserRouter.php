<?php

use App\Http\Route;
use App\Middleware\UserMiddleware;

// User Panel
Route::get(PATH_USER_PANEL, "UserPanel@index", [
    [UserMiddleware::class, 'isAuth']
]);