<?php

namespace App\Controllers;

use App\Http\Request;

class DashboardController {
    public function index(Request $request, $params) {
        return [
            'view' => 'adminView/dashboard.php',
            'data' => ['title' => 'Dashboard']
        ];
    }
}