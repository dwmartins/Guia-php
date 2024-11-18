<?php

namespace App\Controllers;

use App\Class\User;
use App\Class\UserAccess;
use App\Http\Request;
use App\Http\Response;
use App\Models\UserDAO;
use App\Utils\SEOManager;
use App\Utils\View;
use App\Validators\UserValidator;

class AuthController {

    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    /**
     * @return View "publicView/user/login.php"
     */
    public function index(Request $request, $params) {
        $siteInfo = SITE_INFO;
        $seoTitle = !empty($siteInfo->getWebSiteName()) ? TITLE_ENTER . ' | ' . $siteInfo->getWebSiteName() : TITLE_ENTER;
        $this->seo->setTitle($seoTitle);

        $body = $request->body();
        $userEmail = "";

        if($this->checkRememberMe() || isLoggedIn()) {
            return redirect("/");
        }

        if(isset($body['new-account']) && !empty($body['new-account'])) {
            $userEmail = $body['new-account'];
        }

        if(isset($_COOKIE['lastLogin']) && empty($body['new-account'])) {
            $userEmail = $_COOKIE['lastLogin'];
        }

        View::render("publicView/user/login.php", [
            "userEmail" => $userEmail,
            "seo" => $this->seo
        ]);
    }

    /**
     * @return View "publicView/user/register.php"
     */
    public function registerView(Request $request, $params) {
        $siteInfo = SITE_INFO;
        
        $seoTitle = !empty($siteInfo->getWebSiteName()) ? TITLE_REGISTER . ' | ' . $siteInfo->getWebSiteName() : TITLE_REGISTER;
        $this->seo->setTitle($seoTitle);

        View::render("publicView/user/register.php", [
            "seo" => $this->seo
        ]);
    }

    /**
     * @return View "publicView/user/forgotPassword.php"
     */
    public function forgotPasswordView(Request $request, $params) {
        $siteInfo = SITE_INFO;
        $seoTitle = !empty($siteInfo->getWebSiteName()) ? SEO_TITLE_FORGOT_PASSWORD . ' | ' . $siteInfo->getWebSiteName() : SEO_TITLE_FORGOT_PASSWORD;

        $this->seo->setTitle($seoTitle);

        View::render("publicView/user/forgotPassword.php", [
            "seo" => $this->seo
        ]);
    }

    public function register(Request $request, $params) {
        try {
            $body = $request->body();

            if(strlen($body['password']) < 4) {
                return redirectWithMessage(PATH_CREATE_ACCOUNT, "error", PASSWORD_MIN_LENGTH_REQUIREMENT, $body);
            }

            $fieldsValid = UserValidator::update($body);

            if(!$fieldsValid['isValid']) {
                return redirectWithMessage(PATH_CREATE_ACCOUNT, "error", $fieldsValid['message'], $body);
            }

            if(!empty(UserDAO::fetchByEmail($body['email']))) {
                return redirectWithMessage(PATH_CREATE_ACCOUNT, "error", EMAIL_IN_USE, $body);
            }

            $user = new User($body);
            $user->save();

            $queryParams = [
                "new-account" => $user->getEmail()
            ];

            $url = '/entrar?' . http_build_query($queryParams);

            return redirectWithMessage($url, "success", USER_CREATED);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_CREATE_ACCOUNT, "error", FATAL_ERROR);
        }
    }

    public function login(Request $request, $params) {
        try {
            $data = $request->body();
            $user = new User();

            if($user->fetchByEmail($data['email'])) {
                if($user->getActive() === "Y") {
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
                        setcookie('lastLogin', $user->getEmail(), time() + (30 * 24 * 60 * 60), "/");

                        redirect("/");
                        return;
                    }
                }
            }

            redirectWithMessage(PATH_LOGIN, 'error', INVALID_CREDENTIALS, ["email" => $user->getEmail()]);

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

    public function sendPasswordRecoveryLink(Request $request, $params) {
        try {
            $body = $request->body();
            
            return Response::json([
                "message" => RECOVERY_CODE_SEND
            ]);
        } catch (\Exception $e) {
            logError($e->getMessage());
            return Response::json([
                "message" => FATAL_ERROR
            ], 500);
        }
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

                $_SESSION['userLogged'] = $user->toArray();
                return true;

            } else {
                setcookie('rememberMe', '', time() - 3600, "/");
            }
        }

        return false;
    }
}