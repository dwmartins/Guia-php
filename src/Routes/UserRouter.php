<?php

use App\Http\Route;
use App\Middleware\UserMiddleware;

// *********** VIEWS *************//

// User Panel view
Route::get(PATH_USER_PANEL, "UserController@panelView", [
    [UserMiddleware::class, 'isAuth']
]);

// User Profile view
Route::get(PATH_USER_PROFILE, "UserController@profileView", [
    [UserMiddleware::class, 'isAuth']
]);

// ***********END VIEWS *************//

// Change Password
Route::post('/user/password', 'UserController@updatePassword', [
    [UserMiddleware::class, 'isAuth']
]);

// Update basic info
Route::post('/user/basic-info', 'UserController@update', [
    [UserMiddleware::class, 'isAuth']
]);

// Update Address
Route::post('/user/address', 'UserController@updateAddress', [
    [UserMiddleware::class, 'isAuth']
]);
