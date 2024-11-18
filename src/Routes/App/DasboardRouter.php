<?php 

use App\Http\Route;
use App\Middleware\AdminMiddleware;

Route::get('/app', 'App/DashboardController@index', [
    [AdminMiddleware::class, 'isAdmin']
]);