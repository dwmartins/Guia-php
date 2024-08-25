<?php

namespace App\Controllers;

use App\Http\Request;

class UserPanel {
    public function index(Request $request, $params) {
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
}
