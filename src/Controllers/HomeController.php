<?php

namespace App\Controllers;

use App\Http\Request;
use App\Utils\SEOManager;

class HomeController {
    public function index(Request $request, $params) {
        $data = [];
        $siteInfo = SITE_INFO;
        $seo = new SEOManager;
        $data['seo'] = $seo;

        $data['coverImage'] = empty($siteInfo->getCoverImage()) ? "/assets/img/default/defaultCoverImage.jpg" : "/uploads/systemImages/" . $siteInfo->getCoverImage();

        return [
            'view' => 'publicView/home.php',
            'data' =>  $data
        ];
    }
}
