<?php

namespace App\Controllers;

use App\Http\Request;
class HomeController {
    public function index(Request $request, $params) {
        return [
            'view' => 'publicView/home.php',
            'data' => ['title' => getSiteInfo()->getWebSiteName()]
        ];
    }
}
