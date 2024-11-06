<?php

namespace App\Controllers;

use App\Class\User;
use App\Class\UserAccess;
use App\Http\Request;
use App\Models\UserDAO;
use App\Validators\UserValidator;

class AuthController {
    public function index(Request $request, $params) {
        try {
            $body = $request->body();
            $userEmail = "";

            if($this->checkRememberMe() || isLoggedIn()) {
                return redirect("/");
            }

            if(isset($body['new-account']) && !empty($body['new-account'])) {
                $userEmail = $body['new-account'];
            }

            if(isset($_COOKIE['lastLogin'])) {
                $userEmail = $_COOKIE['lastLogin'];
            }

            return [
                'view' => 'publicView/user/login.php',
                'data' => [
                    'title' => 'Entrar | ' . getSiteInfo()->getWebSiteName(),
                    'userEmail' => $userEmail
                ]
            ];

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage("/entrar", 'error', FATAL_ERROR);
        }
    }

    public function registerView(Request $request, $params) {
        return [
            "view" => "publicView/user/register.php",
            "data" => [
                "title" => 'Criar conta | ' . getSiteInfo()->getWebSiteName()
            ]
        ];
    }

    public function register(Request $request, $params) {
        try {
            $body = $request->body();

            if(strlen($body['password']) < 4) {
                return redirectWithMessage("/criar-conta", "error", "A senha deve conter pelo menos 4 caracteres.");
            }

            $fieldsValid = UserValidator::update($body);

            if(!$fieldsValid['isValid']) {
                return redirectWithMessage("/criar-conta", "error", $fieldsValid['message']);
            }

            if(!empty(UserDAO::fetchByEmail($body['email']))) {
                return redirectWithMessage("/criar-conta", "error", "Este e-mail já está em uso.");
            }

            $user = new User($body);
            $user->save();

            $queryParams = [
                "new-account" => $user->getEmail()
            ];

            $url = '/entrar?' . http_build_query($queryParams);

            return redirectWithMessage($url, "success", "Sua conta foi criada com sucesso.");

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage("/criar-conta", "error", FATAL_ERROR);
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

            redirectWithMessage("/entrar", 'error', "Usuário ou senha inválidos.", ["email" => $user->getEmail()]);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage("/entrar", 'error', FATAL_ERROR);
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

        redirectWithMessage('/', 'success', "Você se desconectou com sucesso. Até a próxima!");
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