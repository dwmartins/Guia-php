<?php

namespace App\Controllers;

use App\Class\User;
use App\Http\Request;
class HomeController {
    public function index(Request $request, $params) {
        $data = [];
        $siteInfo = SITE_INFO;

        $data['title'] = $siteInfo->getWebSiteName();
        $data['coverImage'] = empty($siteInfo->getCoverImage()) ? "/assets/img/default/defaultCoverImage.jpg" : "/uploads/systemImages/" . $siteInfo->getCoverImage();

        $user = new User();
        $user->fetchById(8);

        return [
            'view' => 'publicView/home.php',
            'data' =>  $data
        ];
    }
}
