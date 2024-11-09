<?php

namespace App\Controllers;

use App\Http\Request;
use App\Utils\SEOManager;

class HomeController {
    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    public function index(Request $request, $params) {
        $data = [];
        $siteInfo = SITE_INFO;
        $data['seo'] = $this->seo;

        $data['coverImage'] = empty($siteInfo->getCoverImage()) ? "/assets/img/default/defaultCoverImage.jpg" : "/uploads/systemImages/" . $siteInfo->getCoverImage();

        return [
            'view' => 'publicView/home.php',
            'data' =>  $data
        ];
    }
}
