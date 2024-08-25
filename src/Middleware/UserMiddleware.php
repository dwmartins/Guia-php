<?php

namespace App\Middleware;

use App\Class\User;
use App\Http\Request;

class UserMiddleware {
    public function isAuth(Request $request) {
        $userLogged = getLoggedUser();

        if(!empty($userLogged)) {
            $user = new User();
            $user->fetchById($userLogged->getId());

            if(!empty($user) && $user->getActive() === "Y") {
                $request->setAttribute("userRequest", $user);
                return true;
            }
        }

        $this->forceLogout();
    }

    private function forceLogout() {
        session_unset();
        session_destroy();

        if (isset($_COOKIE['rememberMe'])) {
            setcookie('rememberMe', '', time() - 3600, "/", "", false, true);
        }

        $user = getLoggedUser();

        if($user) {
            $user->setRememberToken('');
            $user->save();
        }

        return redirect(PATH_LOGIN);
    }
}
