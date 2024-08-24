<?php

namespace App\Controllers;

use App\Class\User;
use App\Class\UserAccess;
use App\Http\Request;

class AuthAdminController {
    public function index(Request $request, $params) {
        return [
            'view' => 'adminView/login.php',
            'data' => [
                'title' => PANEL .' | '. TITLE_ENTER
            ]
        ];
    }

    public function login(Request $request, $params) {
        $data = $request->body();

        $user = new User();

        if($user->fetchByEmail($data['email'])) {
            if($user->getActive() === "Y") {
                if(password_verify($data["password"], $user->getPassword())) {

                    if($user->getRole() !== "support") {
                        $userAccess = new UserAccess([
                            "user_id" => $user->getId(),
                            "ip"      => $request->getIp()
                        ]);
    
                        $userAccess->save();
                    }

                    $_SESSION['userLogged'] = $user->toArray();

                    redirect("/app");
                    return;
                }
            }
        }

        redirectWithMessage('/app/' . PATH_ADM_LOGIN, 'error', INVALID_CREDENTIALS);
    }
}