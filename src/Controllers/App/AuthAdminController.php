<?php

namespace App\Controllers\App;

use App\Class\User;
use App\Class\UserAccess;
use App\Http\Request;
use App\Utils\SEOManager;
use App\Utils\View;

class AuthAdminController {
    private array $allowedRoles = ["support", "admin", "mod", "test"];
    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    /**
     * @return View "adminView/login.php"
     */
    public function loginView(Request $request, $params) {
        $this->seo->setTitle(PANEL .' | '. TITLE_ENTER);
        $userEmail = "";

        if($this->checkRememberMe() || isAdmin()) {
            return redirect("/app");
        }

        if(isset($_COOKIE['lastLogin'])) {
            $userEmail = $_COOKIE['lastLogin'];
        }

        View::render("adminView/login.php", [
            'seo' => $this->seo,
            'userEmail' => $userEmail
        ]);
    }

    public function login(Request $request, $params) {
        $data = $request->body();

        $user = new User();

        if($user->fetchByEmail($data['email'])) {
            if($user->getActive() === "Y" && in_array($user->getRole(), $this->allowedRoles)) {
                if(password_verify($data["password"], $user->getPassword())) {

                    if(isset($data['rememberMe']) && $data['rememberMe'] == 'on') {
                        $token = bin2hex(random_bytes(16));
                        $user->setRememberToken($token);
                        $user->save();

                        setcookie('rememberMe', $token, time() + (30 * 24 * 60 * 60), "/", "", false, true);
                    }

                    if($user->getRole() !== "support") {
                        $userAccess = new UserAccess([
                            "user_id" => $user->getId(),
                            "ip"      => $request->getIp()
                        ]);
    
                        $userAccess->save();
                    }

                    setUserLogged($user);

                    redirect("/app");
                    return;
                }
            }
        }

        redirectWithMessage(PATH_ADM_LOGIN, 'error', INVALID_CREDENTIALS);
    }

    private function checkRememberMe() {
        if(!getLoggedUser() && isset($_COOKIE['rememberMe'])) {
            $token = $_COOKIE['rememberMe'];

            $user = new User();

            if($user->fetchByRememberToken($token)) {
                $newToken = bin2hex(random_bytes(16));
                setcookie('rememberMe', $newToken, time() + (30 * 24 * 60 * 60), "/", "", false, true);
                $user->setRememberToken($newToken);
                $user->save();

                setUserLogged($user);
                return true;

            } else {
                setcookie('rememberMe', '', time() - 3600, "/");
            }
        }

        return false;
    }
}