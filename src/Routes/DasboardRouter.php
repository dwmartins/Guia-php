<?php 

use App\Http\Route;
use App\Middleware\AdminMiddleware;

Route::get('/app', 'DashboardController@index', [
    [AdminMiddleware::class, 'isAdmin']
]);