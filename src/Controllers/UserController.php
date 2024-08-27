<?php

namespace App\Controllers;

use App\Http\Request;
use App\Models\UserDAO;

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

    public function update(Request $request, $params) {
        try {
            $body = $request->body();
            $user = $request->getAttribute('userRequest');

            $emailExists = UserDAO::fetchByEmail($body['email']);

            if($emailExists && $emailExists['id'] != $user->getId()) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", EMAIL_IN_USE);
            }

            $user->update($body);
            $user->save();
            
            setUserLogged($user);

            return redirectWithMessage(PATH_USER_PROFILE, "success", USER_UPDATE);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_USER_PROFILE, "error", FATAL_ERROR);
        }
    }

    public function updatePassword(Request $request, $params) {
        try {
            $body = $request->body();
            $user = $request->getAttribute('userRequest');

            if($body['newPassword'] != $body['confirmPassword']) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", PASSWORDS_NOT_MATCH);
            }

            if(!password_verify($body['currentPassword'], $user->getPassword())) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", PASSWORD_INCORRECT);
            }

            $user->setPassword($body['newPassword']);
            $user->save();

            return redirectWithMessage(PATH_USER_PROFILE, "success", PASSWORD_UPDATE);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_USER_PROFILE, "error", FATAL_ERROR);
        }
    }

    public function updateAddress(Request $request, $params) {
        try {
            $body = $request->body();
            $user = $request->getAttribute('userRequest');

            $user->update($body);
            $user->save();

            setUserLogged($user);

            return redirectWithMessage(PATH_USER_PROFILE, "success", ADDRESS_UPDATE);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_USER_PROFILE, "error", FATAL_ERROR);
        }
    }
}
