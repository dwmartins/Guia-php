<?php

namespace App\Controllers;

use App\Http\Request;

class AuthAdminController {
    public function index(Request $request, $params) {
        return [
            'view' => 'adminView/login.php',
            'data' => ['title' => PANEL .' | '. TITLE_ENTER]
        ];
    }

    public function login(Request $request, $params) {
        var_dump($request->body()); 
    }
}