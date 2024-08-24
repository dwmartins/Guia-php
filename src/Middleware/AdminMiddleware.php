<?php

namespace App\Middleware;

use App\Http\Request;

class AdminMiddleware {
    private static array $allowedRoles = ["support", "admin", "mod", "test"];
    private static array $noPermissionNeeded = ["support", "admin"];

    public function isAdmin(Request $request) {
        $user = getLoggedUser();

        if(!empty($user) && $user->getActive() === "Y") {
            if(in_array($user->getRole(), self::$allowedRoles)) {
                return true;
            }
        }

        redirectWithMessage('/', 'error', 'Você não tem permissão para acessar está area.');
    }
}