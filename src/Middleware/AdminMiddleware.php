<?php

namespace App\Middleware;

use App\Class\User;
use App\Http\Request;

class AdminMiddleware {
    private static array $allowedRoles = ["support", "admin"];

    public function isAdmin(Request $request) {
        $userLogged = getLoggedUser();

        if(!empty($userLogged)) {
            $user = new User();
            $user->fetchById($userLogged->getId());

            if(!empty($user) && $user->getActive() === "Y") {
                if(in_array($user->getRole(), self::$allowedRoles)) {
                    $request->setAttribute("userRequest", $user);
                    return true;
                } else {
                    return redirectWithMessage('/', 'error', "Você não tem permissão para acessar está area.");
                }
            }
        }

        redirect("/app/entrar");
    }
}