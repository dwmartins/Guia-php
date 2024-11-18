<?php

namespace App\Controllers;

use App\Http\Request;
use App\Utils\SEOManager;
use App\Utils\View;

class HomeController {
    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    /**
     * @return View "publicView/home.php"
     */
    public function index(Request $request, $params) {
        $data = [];
        $siteInfo = SITE_INFO;
        $data['seo'] = $this->seo;

        $data['coverImage'] = empty($siteInfo->getCoverImage()) ? PATH_DEFAULT_COVER : PATH_UPLOADS_SYSTEMIMAGES . $siteInfo->getCoverImage();

        View::render("publicView/home.php", $data);
    }
}
