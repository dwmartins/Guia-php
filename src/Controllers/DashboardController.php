<?php

namespace App\Controllers;

use App\Http\Request;
use App\Utils\SEOManager;

class DashboardController {
    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    public function index(Request $request, $params) {
        $this->seo->setTitle("Dashboard");

        return [
            'view' => 'adminView/dashboard.php',
            'data' => ['seo' => $this->seo]
        ];
    }
}