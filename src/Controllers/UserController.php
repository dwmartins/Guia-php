<?php

namespace App\Controllers;

use App\Http\Request;

class UserController {
    public function panelView(Request $request, $params) {
        $user = getLoggedUser();
        $userImg = empty($user->getPhoto()) ? "/assets/img/default/user.jpg" : "/uploads/users/" . $user->getPhoto();

        return [
            "view" => "publicView/user/userPanel.php",
            "data" => [
                "title" => USER_PANEL,
                "user" => $user,
                "userImg" => $userImg 
            ]
        ];
    }

    public function profileView(Request $request, $params) {
        $user = getLoggedUser();
        $userImg = empty($user->getPhoto()) ? "/assets/img/default/user.jpg" : "/uploads/users/" . $user->getPhoto();

        return [
            "view" => "publicView/user/profile.php",
            "data" => [
                "title" => USER_PROFILE,
                "user" => $user,
                "userImg" => $userImg
            ]
        ];
    }
}
