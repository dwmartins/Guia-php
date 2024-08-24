<?php

namespace App\Controllers;

use App\Http\Request;

class AuthController {
    public function index(Request $request, $params) {
        try {
            return [
                'view' => 'publicView/user/login.php',
                'data' => [
                    'title' => getSiteInfo()->getWebSiteName() . ' | ' . TITLE_ENTER
                ]
            ];

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_LOGIN, 'error', FATAL_ERROR);
        }
    }

    public function logout(Request $request, $params) {
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

        redirectWithMessage('/', 'success', LOGOUT_MESSAGE);
    }
}