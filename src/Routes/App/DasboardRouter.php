<?php 

use App\Http\Route;
use App\Middleware\AdminMiddleware;

Route::get('/app', 'App/DashboardController@dashboardView', [
    [AdminMiddleware::class, 'isAdmin']
]);