<?php

namespace App\Controllers;

use App\Http\Request;
class HomeController {
    public function index(Request $request, $params) {
        $data = [];
        $data['title'] = getSiteInfo()->getWebSiteName();

        $siteInfo = SITE_INFO;
        $data['coverImage'] = empty($siteInfo->getCoverImage()) ? "/assets/img/default/defaultCoverImage.jpg" : "/uploads/systemImages/" . $siteInfo->getCoverImage();

        return [
            'view' => 'publicView/home.php',
            'data' =>  $data
        ];
    }
}
