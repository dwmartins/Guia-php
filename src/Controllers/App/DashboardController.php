<?php

namespace App\Controllers\App;

use App\Http\Request;
use App\Utils\SEOManager;
use App\Utils\View;

class DashboardController {
    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    /**
     * @return View "adminView/dashboard.php"
     */
    public function dashboardView(Request $request, $params) {
        $this->seo->setTitle("Dashboard");

        View::render("adminView/dashboard.php", [
            "seo" => $this->seo
        ]);
    }
}